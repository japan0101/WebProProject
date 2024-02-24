<?php
function randomCode(){
    $random = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU";
    $data = "";
    for($i=0;$i<4;$i++)$data .= $random[rand(0, strlen($random))];
    return $data;
}
?>