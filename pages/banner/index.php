<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LeawTaeApp</title>

  <?php include($_SERVER['DOCUMENT_ROOT']. "/asset/script/tailwind.php") ?>
  </script>

  <script src="main.js"></script>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']. "/asset/component/nav.php")?>

<?php include($_SERVER['DOCUMENT_ROOT']. "/asset/script/tw_element.php") ?>
</body>
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
