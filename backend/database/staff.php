<?php
include './../connectDatabase.php';
include './../randomCode.php';

$input = json_decode(file_get_contents("php://input"), true);

switch ($input["case"]) {
    case 'randomTableCode': {
        // ต้องการ ID
            $database->update("tables", array("code"=>randomCode()), array("tableID" => $input['ID']));
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
