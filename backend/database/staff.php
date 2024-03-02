<?php
session_start();
header('Content-Type: application/json');

include './../connectDatabase.php';
include './../randomCode.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST" && in_array($_SESSION['role'], array("STAFF", "MANAGER"))) {
    switch ($_POST["case"]) {
        case 'randomTableCode':
        {
            // ต้องการ ID

            while (true) {
                $code = randomCode();
                $database->custom("SELECT code FROM tables WHERE code='{$code}'");
                if ($database->getResult()['result'] == 0)
                    break;
            }

            $database->update("tables", array("code" => $code, "status" => 2), "tableID={$_POST['ID']}");
            if ($database->getResult()['result'])
                $database->customResult(message: "ทำการสุ่มโค้ดเสร็จสิ้น");
            break;
        }

        case 'orderComplete':
        {
            // tableID, menuID, menuName, amount

            $database->update("orders", array("status" => 2), "tableID={$_POST['tableID']} AND menuID={$_POST['menuID']} AND status='INCOMPLETE'");
            if ($database->getResult()['result'])
                $database->customResult("Order โต๊ะ {$_POST['tableID']} เมนู: {$_POST['menuName']} จำนวน: {$_POST['amount']} เสร็จสิ้น");

            break;
        }

        case 'payBill':
        {
            // tableID, paymentMethod, total, couponCode(Optional)

            $database->custom("SELECT userID FROM tables WHERE tableID={$_POST['tableID']}");
            $userID = $database->getResult()['payload'][0]->userID;
            // $database->custom("SELECT sum(cal_price) as total FROM (SELECT menuID, amount, menuName, price*amount as cal_price FROM orders LEFT JOIN menus USING (menuID) WHERE tableID={$_POST['tableID']} AND billID is null AND NOT status='CANCELLED') as orderMenu");
            // $total = $database->getResult()['payload'][0]->total;

            $insert = array("paymentMethod" => $_POST['paymentMethod'], 'total' => $_POST['total']);
            if (!is_null($userID))
                $insert['userID'] = $userID;
            if (isset($_POST['couponCode']))
                $insert['couponCode'] = $_POST['couponCode'];
            $database->insert("bills", $insert);

            if ($database->getResult()['result']) {
                $database->custom("SELECT billID FROM bills ORDER BY billID DESC LIMIT 1");
                $billID = $database->getResult()['payload'][0]->billID;
                $database->update("orders", array("billID" => $billID), "tableID={$_POST['tableID']} AND billID is null");

                // **ยังไม่ได้คำนวณคะแนน**


                // เปลี่ยนค่าสถานะ table ให้เป็นเหมือนเดิม
                $database->update("tables", array('code' => null, 'userID' => null, 'status' => 1), "tableID={$_POST['tableID']}");
            }
            break;
        }
        default:
        {
            $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
            break;
        }
    }
    $redirect .= $_SERVER['HTTP_REFERER'];
    $database->customResult(type: $_POST['case']);
} else if ($_SERVER['REQUEST_METHOD'] == "GET" && in_array($_SESSION['role'], array("STAFF", "MANAGER"))) {
    switch ($_GET["case"]) {
        case 'table':
        {
            $database->custom("SELECT tableID, code, phoneNumber, capacity, tables.status FROM tables LEFT JOIN users USING (userID)");
            echo json_encode($database->getResult()['payload']);
            break;
        }
        case 'user':
        {
            $database->custom("SELECT * FROM users");
            break;
        }
        case 'orders':
        {
            $database->custom("SELECT tableID, menuID, amount, status FROM orders WHERE NOT status='COMPLETE'");
            echo json_encode($database->getResult()['payload']);
            break;
        }
        case 'table_order':
        {
            // ID
            $database->custom("SELECT menuID, amount, menuName, price*amount as cal_price FROM orders LEFT JOIN menus USING (menuID) WHERE tableID={$_POST['ID']} AND billID is null AND NOT status='CANCELLED'");
            // couponCode จะมีการทำที่หน้าบ้าน
            echo json_encode($database->getResult()['payload']);
            break;
        }
        case 'cooking_order':
        {
            $order = [];
            $database->custom("SELECT orderAt FROM orders WHERE status = 1 GROUP BY orderAt;");
            foreach($database->getResult()['payload'] as $time){
                $database->custom("SELECT tableID, menuName, amount, orderAt FROM orders join menus on menus.menuID = orders.menuID WHERE orderAt = '{$time->orderAt}';");
                array_push($order, $database->getResult()['payload']);
            }
            echo json_encode($order);
            break;
        }
        case '':
        {

        }
        default:
        {
            break;
        }
    }
    return;
} else {
    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= "./../../";
}

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
// header($redirect);
