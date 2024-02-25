<?php
session_start();

include './../connectDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $database->update("users", array("status" => 2), "userID={$_SESSION['userID']}");
}

unset($database);

header("Location: ./logout_user.php");