<?php
session_start();
header('Content-Type: application/json');

include './../connectDatabase.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($_POST["case"]) {

        case 'tableCheck': {
                // ต้องการ code

                $database->custom("SELECT tableID, userID FROM tables WHERE code='{$_POST['code']}' LIMIT 1");
                if ($database->getResult()['result']) {

                    $id = $database->getResult()['payload'][0]->tableID;
                    $uesrID = $database->getResult()['payload'][0]->userID;
                    $database->update("tables", array("userID" => $_SESSION['userID']), "code='{$_POST['code']}'");
                    if ($database->getResult()['result']) $database->customResult(message: "คุณอยู่ที่โต๊ะ $id, userID=" . is_null($uesrID));

                    $redirect .= $_SERVER['HTTP_REFERER'];
                } else {

                    $database->customResult(message: "ใส่โค้ดไม่ถูกต้อง");
                    $redirect .= $_SERVER['HTTP_REFERER'];
                }
                break;
            }
        case '': {
            }
        default: {
                $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
                break;
            }
    }

    $redirect .= $_SERVER['HTTP_REFERER'];
    $database->customResult(type: $_POST['case']);
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {

} else {
    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= './../../';
}

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
header($redirect);
