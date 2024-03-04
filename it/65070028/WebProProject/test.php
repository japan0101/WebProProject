<?php
session_start();
echo json_encode($_SESSION);
echo json_encode($_COOKIE);
echo $_SESSION['result']['message'];
echo password_hash('12345678', PASSWORD_BCRYPT);