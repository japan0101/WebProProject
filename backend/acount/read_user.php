<?php
session_start();

include './../connectDatabase.php';


if (isset($_GET)){
    echo "1";   
}
$database->custom("SELECT userID, phoneNumber, memberName, email, role FROM ")
?>