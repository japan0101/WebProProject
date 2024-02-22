<?php
session_start();

include './../connectDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // ต้องการ phone, name, email, password
    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $database->insert("users", array("phoneNumber" => $_POST['phone'], "memberName" => $_POST['name'], "email" => $_POST['email'], "passwd" => $hashedPassword));
    if ($database->getResult()['result']){
        header("Location: index.php?result=1");
    }
}else{
    echo "Error: Wrong Method";
    sleep(1);
    header("Location: index.php");
}
