<?php
session_start();
session_unset();
session_destroy();

setcookie("token", "", time() - 3600, "/", "", 0, 0);
$_COOKIE['token'] = "";

header("Location: ./../../");
?>