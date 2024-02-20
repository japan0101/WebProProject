<?php
$hostname = "localhost";
$username = "bess1123";
$password = "123456789";
$database = "test";

$conn = mysqli_connect($hostname, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
} else echo "success";
