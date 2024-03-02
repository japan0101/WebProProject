<?php session_start();
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
    <link rel="stylesheet" href="/assets/stylesheets/global.css">
    <link rel="stylesheet" href="/assets/stylesheets/developers.css">

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/WebProProject/assets/scripts/tailwind.php") ?>
</head>

<body style="background-color: red">

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/navManager.php") ?>



    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/scripts/sweetalert.js"></script>

</body>

</html>