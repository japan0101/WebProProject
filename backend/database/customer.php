<?php
session_start();

include './../connectDatabase.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($input["case"]) {
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
}

$database->custom("SELECT * FROM ");
