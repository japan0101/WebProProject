<?php

session_start();

include './../connectDatabase.php';

$isCookie = isset($_COOKIE['token']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // ต้องการ oldpasswd, newpasswd, confirmpasswd

    if (isset($_POST['oldpasswd']) && isset($_POST['newpasswd']) && isset($_POST['confirmpasswd'])) {

        if ($_POST['newpasswd'] == $_POST['confirmpasswd'] && password_verify($_POST['oldpasswd'], $_SESSION['passwd'])) {

            $hashedPassword = password_hash($_POST['newpasswd'], PASSWORD_BCRYPT);

            $_SESSION['passwd'] = $hashedPassword;
            if ($isCookie)
                setcookie("token", $hashedPassword, time() + (24 * 60 * 60), '/');

            $database->update("users", array("passwd" => $hashedPassword), "userID={$_SESSION['userID']}");
            $database->customResult(message: "เปลี่ยนรหัสผ่านเสร็จสิ้น");
        } else {

            if ($_POST['newpasswd'] != $_POST['confirmpasswd'])
                $database->customResult(0, "รหัสผ่านใหม่ กับยืนยันรหัสผ่านใหม่ไม่เหมือนกัน");
            else $database->customResult(0, "ใส่รหัสผ่านเก่า ไม่ถูกต้อง");
        }
    } else {

        $database->customResult(0, "ใส่ข้อมูลไม่ครบถ้วน");
    }
}
$database->customResult(type: "chapass_user");

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
header("Location: " . $_SERVER['HTTP_REFERER']);