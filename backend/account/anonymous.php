<?php
session_start();
$_SESSION['userID'] = "null";
header("Location: " . $_SERVER['HTTP_REFERER']);
?>