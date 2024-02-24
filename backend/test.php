<?php
include 'connectDatabase.php';

$data['result']['message'] = 'a';
echo $data['result']['message'];
// id
// $database->custom("SELECT * FROM instructor WHERE ID={$input['id']}");
// $res = $database->getResult();
// echo json_encode($res);

// unset($database);

?>