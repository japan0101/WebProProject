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

        case 'orderComplete':{
            // tableID, menuID, menuName, amount

            $database->update("orders", array("status" => 2), "tableID={$_POST['tableID']} AND menuID={$_POST['menuID']}");
            if ($database->getResult()['result']) $database->customResult("Order โต๊ะ {$_POST['tableID']} เมนู: {$_POST['menuName']} จำนวน: {$_POST['amount']} เสร็จสิ้น");

            break;
        }

        case 'payBill':
        {
            // tableID
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
            $database->custom("SELECT tableID, code, phoneNumber, capacity, tables.status FROM tables LEFT JOIN users USING (userID);");
            echo json_encode($database->getResult()['payload']);
            break;
        }
        case 'user':
        {
            $database->custom("SELECT * FROM users");
            break;
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
