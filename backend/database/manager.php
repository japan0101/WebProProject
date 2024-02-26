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

                $database->insert("tables", array("capacity" => $_POST['capacity']));
                if ($database->getResult()['result']) $database->customResult(message: "ทำการสร้าง โต๊ะ เสร็จสิ้น");

                break;
            }
        case 'change_status': {
                // ต้องการ ID

                $database->custom("SELECT status FROM users WHERE userID={$_POST['ID']}");

                if ($database->getResult()['payload'][0]->status == "ACTIVE") {

                    $database->update("users", array("status" => 2), "userID={$_POST['ID']}");
                    if ($database->getResult()['result']) $database->customResult(message: "ระงับบัญชีผู้ใช้เรียบร้อย");
                } else {

                    $database->update("users", array("status" => 1), "userID={$_POST['ID']}");
                    if ($database->getResult()['result']) $database->customResult(message: "เปิดใช้งานบัญชีผู้ใช้เรียบร้อย");
                }
                usleep(0.5 * 1000000);
                break;
            }
        case 'change_passwd': {
                // ต้องการ ID, passwd (ยังไม่ได้ทำ อาจให้ Manager INPUT รหัสผ่านที่ต้องการให้เปลี่ยนเลย)

                $password = "12345678";
                $hashedPassword = password_hash("12345678", PASSWORD_BCRYPT);
                $database->update("users", array("passwd" => $hashedPassword), "userID={$_POST['ID']}");
                if($database->getResult()['result'])$database->customResult(message:"เปลี่ยนรหัสผ่านเสร็จสิ้น รหัสผ่าน: ".$password);

                break;
            }
        default: {
                $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
            }
    }

    $redirect .= $_SERVER['HTTP_REFERER'];
    $database->customResult(type: $_POST['case']);
} else if ($_SERVER['REQUEST_METHOD'] == "GET" && $_SESSION['role'] == "MANAGER") {
    switch ($_GET['case']) {
        case 'alluser': {
                $database->custom("SELECT phoneNumber, memberName, email, status, points, role, userID FROM users WHERE NOT userID={$_SESSION['userID']} ORDER BY role");
                echo json_encode($database->getResult()['payload']);
                break;
            }
        default: {
                $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
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
