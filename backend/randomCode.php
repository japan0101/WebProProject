<?php
function randomCode(){
    $random = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU";
    $data = "";
    for($i=0;$i<3;$i++)$data += $random[rand(0, strlen($random))];
    $data += "-";
    for($i=0;$i<3;$i++)$data += $random[rand(0, strlen($random))];
    return $data;
}
?>