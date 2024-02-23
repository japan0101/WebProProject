<?php
session_start();

include './../connectDatabase.php';

$verifyPassword = password_verify($input['passwd'], "");

if (isset($_GET)){
    echo "1";   
}
$database->custom("SELECT userID, phoneNumber, memberName, email, role FROM ")
?>