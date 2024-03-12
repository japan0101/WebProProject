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
                    // tableID, orderAt

                    $database->update("orders", array("status" => 2), "tableID={$_POST['tableID']} AND orderAt='{$_POST['orderAt']}' AND status='INCOMPLETE'");
                    if ($database->getResult()['result'])
                        $database->customResult(message: "Order โต๊ะ {$_POST['tableID']} เสร็จสิ้น");

                    break;
                }

            case 'orderCancel':
                {
                    // tableID, orderAt

                    $database->update("orders", array("status" => 3), "tableID={$_POST['tableID']} AND orderAt='{$_POST['orderAt']}' AND status='INCOMPLETE'");
                    if ($database->getResult()['result'])
                        $database->customResult(message: "Order โต๊ะ {$_POST['tableID']} ถูกยกเลิก");

                    break;
                }

            case 'orderServed':
                {
                    // tableID, orderAt

                    $database->update("orders", array("status" => 4), "tableID={$_POST['tableID']} AND orderAt='{$_POST['orderAt']}' AND status='COMPLETE'");
                    if ($database->getResult()['result'])
                        $database->customResult(message: "เสริฟโต๊ะ {$_POST['tableID']} เสร็จสิ้น");

                    break;
                }

            case 'payBill':
                {
                    // tableID, paymentMethod, total, code(Optional), userID

                    $database->custom("SELECT userID FROM tables WHERE tableID={$_POST['tableID']}");
                    $userID = $database->getResult()['payload'][0]->userID;

            $insert = array("paymentMethod" => $_POST['paymentMethod'], 'total' => $_POST['total']);
            if (!is_null($userID))
                $insert['userID'] = $userID;
            if (isset($_POST['code'])) {
                $insert['codeDiscount'] = json_decode($_POST['code'])->code;
                // ลบโค้ดส่วนลดออกจาก Member
                $database->delete("user_discount", where: "userID={$userID}, AND code='".json_decode($_POST['code'])->code."'");
            }
            $database->insert("bills", $insert);

                    if ($database->getResult()['result']) {
                        $database->custom("SELECT billID FROM bills ORDER BY billID DESC LIMIT 1");
                        $billID = $database->getResult()['payload'][0]->billID;

                        if ($database->getResult()['result'])
                            $database->update("orders", array("billID" => $billID), "tableID={$_POST['tableID']} AND billID is null");
                        else break;

                        // คำนวณคะแนน
                        $plus_point = floor($_POST['total'] * 0.1);
                        if ($database->getResult()['result'])
                            $database->custom("UPDATE users SET points = points + {$plus_point} WHERE userID={$userID}");
                        else break;

                        // เปลี่ยนค่าสถานะ table ให้เป็นเหมือนเดิม
                        if ($database->getResult()['result'])
                            $database->update("tables", array('code' => null, 'userID' => null, 'status' => 1), "tableID={$_POST['tableID']}");
                        else break;
                        $database->customResult(message: "จ่ายบิลสำเร็จ Point+{$plus_point}");
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
                    foreach ($database->getResult()['payload'] as $time) {
                        $database->custom("SELECT tableID, menuName, amount, orderAt FROM orders join menus on menus.menuID = orders.menuID WHERE orderAt = '{$time->orderAt}';");
                        $order[] = $database->getResult()['payload'];
                    }
                    echo json_encode($order);
                    break;
                }
            case 'complete_order':
                {
                    $order = [];
                    $database->custom("SELECT orderAt FROM orders WHERE status = 2 GROUP BY orderAt;");
                    foreach ($database->getResult()['payload'] as $time) {
                        $database->custom("SELECT tableID, menuName, amount, orderAt FROM orders join menus on menus.menuID = orders.menuID WHERE orderAt = '{$time->orderAt}';");
                        $order[] = $database->getResult()['payload'];
                    }
                    echo json_encode($order);
                    break;
                }
            case 'couponUser' :
                {
                    // ID

                    date_default_timezone_set("Asia/Bangkok");
                    $date = date_create();
                    $today = date_format($date, "Y-m-d H:i:s");

                    $database->custom("SELECT menuID, discount, code FROM user_discount WHERE expire >= '$today'");
                    echo json_encode($database->getResult()['payload']);
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
    header($redirect);
