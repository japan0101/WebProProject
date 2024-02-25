<?php
session_start();
header('Content-Type: application/json');

include './../connectDatabase.php';
include './../randomCode.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST" && in_array($_SESSION['role'], array("STAFF", "MANAGER"))) {
    switch ($_POST["case"]) {
        case 'randomTableCode': {
                // ต้องการ ID

                if (isset($_POST['ID'])) {
                    $database->update("tables", array("code" => randomCode(), "status" => 2), array("tableID" => $_POST['ID']));

                    if ($database->getResult()['result']) $database->customResult(message: "ทำการสุ่มโค้ดเสร็จสิ้น", type: $_POST['case']);
                    else $database->customResult(type: $_POST['case']);
                } else {

                    $database->customResult(result: 0, message: "ไม่ได้ใส่ ID", type: $_POST['case']);
                }

                $redirect .= $_SERVER['HTTP_REFERER'];
                break;
            }

        case 'payBill': {
                if (true) {
                }
                break;
            }
        default: {
                $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
                break;
            }
    }
    $_SESSION['result']['result'] = $database->getResult()['result'];
    $_SESSION['result']['message'] = $database->getResult()['message'];
    $_SESSION['result']['type'] = $database->getResult()['type'];

    unset($database);
    header($redirect);
} else if ($_SERVER['REQUEST_METHOD'] == "GET" && in_array($_SESSION['role'], array("STAFF", "MANAGER"))) {
    switch ($_GET["case"]) {
        case 'table': {
                $database->custom("SELECT * FROM tables");
                echo json_encode($database->getResult()['payload']);
                break;
            }
        case 'user': {
                $database->custom("SELECT * FROM users");
                break;
            }
        default: {
                break;
            }
    }
} else {
    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= "./../../";
}

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
header($redirect);
