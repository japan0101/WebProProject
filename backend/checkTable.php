<?php
global $database;
session_start();

include './connectDatabase.php';

$database->custom("SELECT tableID FROM tables WHERE code='{$_SESSION['tablecode']}'");
if ($database->getResult()['result']) {
    setcookie("tableID", $database->getResult()['payload'][0]->tableID, time() + 60 * 60 * 6, '/pages/order');
    setcookie("tablecode", $_SESSION['tablecode'], time() + 60 * 60 * 6, '/pages/order');

    setcookie("tableID", $database->getResult()['payload'][0]->tableID, time() + 60 * 60 * 6, '/backend/database/customer.php');
    setcookie("tablecode", $_SESSION['tablecode'], time() + 60 * 60 * 6, '/backend/database/customer.php');

} else {
    setcookie("tableID", $database->getResult()['payload'][0]->tableID, time() - 60 * 60 * 4, '/pages/order');
    setcookie("tablecode", $_SESSION['tablecode'], time() - 60 * 60 * 4, '/pages/order');

    setcookie("tableID", $database->getResult()['payload'][0]->tableID, time() - 60 * 60 * 6, '/backend/database/customer.php');
    setcookie("tablecode", $_SESSION['tablecode'], time() - 60 * 60 * 4, '/backend/database/customer.php');
    unset($_SESSION['tablecode']);
}

unset($database);

header("Location: " . $_SERVER['HTTP_REFERER']);
