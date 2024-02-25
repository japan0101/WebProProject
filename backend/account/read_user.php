<?php
session_start();

include './../connectDatabase.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // ต้องการ credential, passwd, token (OPTIONAL)

    $database->custom("SELECT userID, phoneNumber, memberName, email, points, role, passwd FROM users WHERE phoneNumber='{$_POST['credential']}' OR email='{$_POST['credential']}' AND status='ACTIVE'");

    if ($database->getResult()['result']) {

        if (password_verify($_POST['passwd'], $database->getResult()['payload'][0]->passwd)) {

            $_SESSION['userID'] = $database->getResult()['payload'][0]->userID;
            $_SESSION['phoneNumber'] = $database->getResult()['payload'][0]->phoneNumber;
            $_SESSION['memberName'] = $database->getResult()['payload'][0]->memberName;
            $_SESSION['email'] = $database->getResult()['payload'][0]->email;
            $_SESSION['points'] = $database->getResult()['payload'][0]->points;
            $_SESSION['role'] = $database->getResult()['payload'][0]->role;

            if (isset($_POST['token'])){
                echo is_null($_POST['token']);
            }

            $database->customResult(message:"เข้าสู่ระบบเสร็จสิ้น", type: "login");
            if($_SESSION['role'] == 'STAFF'){
                $redirect .= "./../../pages/staff";
            }else{
                $redirect .= $_SERVER['HTTP_REFERER'];
            }
        } else {

            $database->customResult(0, "อีเมล, หมายเลขโทรศัพท์หรือรหัสผ่านผิดพลาด", 'login');
            $redirect .= $_SERVER['HTTP_REFERER'];
        }
    } else {

        $database->customResult(0, "อีเมล, หมายเลขโทรศัพท์หรือรหัสผ่านผิดพลาด", "login");
        $redirect .= $_SERVER['HTTP_REFERER'];
    }
} else {

    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= "./../../";
}

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
// header($redirect);
