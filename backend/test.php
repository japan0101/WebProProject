<?php
$data = array(
    "name" => "John Doe",
    "age" => 30,
    "email" => "john@example.com"
);

// Set response headers
header("Content-Type: application/json");

// Output JSON data
echo json_encode($data);
?>