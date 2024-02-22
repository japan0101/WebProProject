<?php
include './../connectDatabase.php';
$input = json_decode(file_get_contents("php://input"), true);

switch ($input["case"]) {
    case 'tableAdd': {
        // ต้องการ code
            $database->custom("SELECT tableID FROM tables WHERE code='{$input['code']}'");
            echo json_encode($database->getResult());
            break;
        }
    case '': {
        }
    default:{
        echo json_encode(array(
            "result" => 0,
            "message" => "No case selected"
        ));
    }
}
$database->custom("SELECT * FROM ");
