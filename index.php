<?php
session_start();
if (isset($_COOKIE['token']) && !isset($_SESSION['userID']))header("Location: /backend/account/read_user.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaewTaeApp</title>
  <?php include("./asset/script/tailwind.php") ?>
</head>

<body class="antialiased">
  <?php include("asset/component/nav.php") ?>


  <!-- Jumbotron -->
  <div data-te-animation-init data-te-animation-start="onLoad" data-te-animation-reset="true" data-te-animation="[fade-in-down_1s_ease-out]" class="relative mb-16 flex items-center justify-center bg-gray-50 py-16 sm:py-24 lg:py-32">
    <div class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-600 dark:from-neutral-700 dark:to-neutral-800" aria-hidden="true"></div>
    <div class="relative px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-4xl text-center text-lg">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl">
          <span class="mb-6 block">ร้านอาหารแล้วแต่แอป</span>
          <span class="block text-3xl">ยินดีต้อนรับ</span>
        </h1>

        <?php if (!isset($_SESSION['userID'])) { ?>
          <p class="mb-6 mt-6 max-w-3xl text-xl text-teal-50">
            สะสมแต้ม แลกส่วนลดด้วยแต้ม ลุ้นรับส่วนลดพิเศษ
          </p>
          <button type="button" class="inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-toggle="modal" data-te-target="#regisModal">
            สมัครสมาชิก
          </button>
          <button type="button" class="inline-block rounded-full border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-toggle="modal" data-te-target="#loginModal">
            เข้าสู่ระบบ
          </button>
        <?php } else { ?>
          <p class="mt-6 max-w-3xl text-xl text-teal-50">
            <span class="block text-3xl"><?php echo $_SESSION['memberName'] ?></span>
            <span class="block text-2xl"><?php echo 'คุณมีแต้มอยู่: ' . $_SESSION['points'] . ' แต้ม' ?></span>
          </p>
        <?php } ?>
      </div>
    </div>
  </div>



</body>

<?php include("./asset/script/tw_element.php") ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/asset/script/sweetalert.js"></script>
<?php if (isset($_SESSION['result'])) { ?>
  <script>
    <?php $fire = false; ?>
    <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "login")) { ?>
      Toast.fire({
        icon: "success",
        title: "<?php echo $_SESSION['result']['message']; ?>",
      });
      <?php $fire = true; ?>

    <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "login")) { ?>
      Toast.fire({
        icon: "error",
        title: "<?php echo $_SESSION['result']['message']; ?>",
      });
    <?php $fire = true;
    } ?>


    <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "register")) { ?>
      Toast.fire({
        icon: "success",
        title: "<?php echo $_SESSION['result']['message']; ?>",
      });
      <?php $fire = true; ?>

    <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "register")) { ?>
      Toast.fire({
        icon: "error",
        title: "<?php echo $_SESSION['result']['message']; ?>",
      });
    <?php $fire = true;
    } ?>

    <?php if ($fire) unset($_SESSION['result']) ?>
  </script>
<?php } ?>

</html>