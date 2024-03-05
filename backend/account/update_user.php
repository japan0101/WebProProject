<?php

session_start();

include './../connectDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // ต้องการ name

    if (isset($_POST['name'])) {

        $database->update("users", array("memberName" => $_POST['name']), "userID={$_SESSION['userID']}");
        $_SESSION['memberName'] = $_POST['name'];

        $database->customResult(message: "แก้ไขข้อมูลเสร็จสิ้น");
    }
}
$database->customResult(type: "update_user");

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
header("Location: " . $_SERVER['HTTP_REFERER']);