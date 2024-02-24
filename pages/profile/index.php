<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaewTaeApp</title>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tailwind.php") ?>
</head>

<body>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/component/nav.php") ?>
  

  
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/component/loginModal.php") ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/component/regisModal.php") ?>


</body>

<?php include("./asset/script/tw_element.php") ?>



<script>
  // Initialization for ES Users
  import {
    Animate,
    Input,
    Ripple,
    Collapse,
    Dropdown,
    initTE,
  } from "tw-elements";

  initTE({
    Animate,
    Input,
    Ripple,
    Collapse,
    Dropdown,
  });
</script>

</html>
