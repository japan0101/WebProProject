<?php
session_start();

include './../connectDatabase.php';

$input = json_decode(file_get_contents("php://input", true));

$verifyPassword = password_verify($input['passwd'], "");

if (isset($_GET)){
    echo "1";   
}
$database->custom("SELECT userID, phoneNumber, memberName, email, role FROM ")
?>