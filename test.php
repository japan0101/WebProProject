<?php
session_start();
echo json_encode($_SESSION);
echo json_encode($_COOKIE);
echo $_SESSION['result']['message']
;