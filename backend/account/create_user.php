<?php
global $database;
session_start();

include './../connectDatabase.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // ต้องการ phone, name, email, passwd, confirmPasswd, 

    $valid = false;
    if (isset($_POST['passwd']) && isset($_POST['confirmPasswd'])) {

        if ($_POST['passwd'] == $_POST['confirmPasswd']) {

            $hashedPassword = password_hash($_POST['passwd'], PASSWORD_BCRYPT);
            $database->custom("SELECT email FROM users WHERE email='{$_POST['email']}' AND status='ACTIVE'");

            if ($database->getResult()['result'] == 0) {

                $database->custom("SELECT phoneNumber FROM users WHERE phoneNumber='{$_POST['phone']}' AND status='ACTIVE'");
                if ($database->getResult()['result'] == 0) {

                    $database->insert("users", array("phoneNumber" => $_POST['phone'], "memberName" => $_POST['name'], "email" => $_POST['email'], "passwd" => $hashedPassword));

                    $database->customResult(message: "สมัครสมาชิกเสร็จสิ้น");
                } else {

                    $database->customResult(0, "มีคนใช้หมายเลขโทรศัพท์นี้แล้ว");
                }
            } else {

                $database->customResult(0, "มีคนใช้อีเมลนี้แล้ว");
            }
        } else {

            $database->customResult(0, "รหัสผ่านไม่ตรงกัน");
        }
    } else {

        // ไม่ได้ใส่ password
        // $database->customResult(0, "รหัสผ่านไม่ตรงกัน", "register");
    }
    $database->customResult(type: "register");
    $redirect .= $_SERVER['HTTP_REFERER'];
} else {

    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= "./../../";
}

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
header($redirect);
