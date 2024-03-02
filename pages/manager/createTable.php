<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != "MANAGER")
        header("Location: ./../../");
} else header("Location: ./../../");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaewTaeApp (Manager)</title>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tailwind.php") ?>
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/navManager.php") ?>

    

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>
</body>

</html>