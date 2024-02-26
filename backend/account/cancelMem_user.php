<?php
session_start();

include './../connectDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SESSION['role'] == "MANAGER") {

    // ต้องการ userID
    
    if (isset($_POST['userID']))$database->update("users", array("status" => 2), "userID={$_POST['userID']}");
    else $database->update("users", array("status" => 2), "userID={$_SESSION['userID']}");
}

unset($database);

header("Location: ./logout_user.php");