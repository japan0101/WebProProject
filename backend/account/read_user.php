<?php
session_start();

include './../connectDatabase.php';

$redirect = "Location: ";

$isCookie = isset($_COOKIE['token']);

if ($_SERVER['REQUEST_METHOD'] == "POST" || $isCookie) {
    // ต้องการ credential, passwd, token (OPTIONAL)
    
    if (!isset($_COOKIE['token']))$database->custom("SELECT userID, phoneNumber, memberName, email, points, role, passwd, status FROM users WHERE (phoneNumber='{$_POST['credential']}' OR email='{$_POST['credential']}') AND status='ACTIVE'");
    else $database->custom("SELECT userID, phoneNumber, memberName, email, points, role FROM users WHERE passwd='{$_COOKIE['token']}' AND status='ACTIVE'");

    if ($database->getResult()['result']) {

        if (password_verify($_POST['passwd'], $database->getResult()['payload'][0]->passwd) || $isCookie) {

            $hashedPassword = password_hash($_POST['passwd'], PASSWORD_BCRYPT);

            $_SESSION['userID'] = $database->getResult()['payload'][0]->userID;
            $_SESSION['phoneNumber'] = $database->getResult()['payload'][0]->phoneNumber;
            $_SESSION['memberName'] = $database->getResult()['payload'][0]->memberName;
            $_SESSION['email'] = $database->getResult()['payload'][0]->email;
            $_SESSION['points'] = $database->getResult()['payload'][0]->points;
            $_SESSION['role'] = $database->getResult()['payload'][0]->role;
            $_SESSION['passwd'] = $hashedPassword;

            if (isset($_POST['token']) || $isCookie)setcookie("token", $hashedPassword, time() + (24 * 60 * 60), '/');

            $database->update("users", array("passwd" => $hashedPassword), "userID={$_SESSION['userID']}");

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
header($redirect);
