<?php
session_start();

include './../connectDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // ต้องการ phone, name, email, password
    $hashedPassword = password_hash($_POST['passwd'], PASSWORD_BCRYPT);
    $database->insert("users", array("phoneNumber" => $_POST['phone'], "memberName" => $_POST['name'], "email" => $_POST['email'], "passwd" => $hashedPassword));
} else {
    $_SESSION['result'] = 0;
    $_SESSION['message'] = "Error: Wrong Method";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
$_SESSION['result'] = $database->getResult()['result'];
$_SESSION['message'] = $database->getResult()['message'];

unset($database);

header("Location: " . $_SERVER['HTTP_REFERER']);
