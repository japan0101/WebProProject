<?php
session_start();
header('Content-Type: application/json');

include './../connectDatabase.php';
include './../randomCode.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['role'] == "MANAGER") {
    switch ($_POST["case"]) {
        case 'insertTable': {
                // ต้องการ capacity

                if (isset($_POST['capacity'])) {
                    $database->insert("tables", array("capacity" => $_POST['capacity']));
                    if ($database->getResult()['result']) $database->customResult(message: "ทำการสร้าง โต๊ะ เสร็จสิ้น", type: $_POST['case']);
                    else $database->customResult(type: $_POST['case']);
                } else {

                    $database->customResult(result: 0, message: "ไม่ได้ใส่ ความจุ", type: $_POST['case']);
                }
                $redirect .= $_SERVER['HTTP_REFERER'];
                break;
            }
        default: {
                $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
                break;
            }
    }
} else if ($_SERVER['REQUEST_METHOD'] == "GET" && $_SESSION['role'] == "MANAGER"){

} else {
    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= "./../../";
}

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
header($redirect);
