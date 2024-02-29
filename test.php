<?php
session_start();
echo json_encode($_SESSION);
echo json_encode($_COOKIE);
echo " " . json_encode($_COOKIE['token']);
echo password_hash("12345678", PASSWORD_BCRYPT);
$insert = array("e" => "ea");
echo json_encode($insert);
$insert['a'] = "asd";
echo json_encode($insert);