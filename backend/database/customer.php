<?php
session_start();
header('Content-Type: application/json');

include './../connectDatabase.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($_POST["case"]) {

        case 'tableCheck': {
                // ต้องการ code
                $database->custom("SELECT tableID FROM tables WHERE code='{$_POST['code']}'");
                echo json_encode($database->getResult());
                break;
            }
        case '': {
            }
        default: {
                echo json_encode(array(
                    "result" => 0,
                    "message" => "No case selected"
                ));
            }
    }
} else {
    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= $_SERVER['HTTP_REFERER'];
}