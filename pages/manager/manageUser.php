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
    <title>Laew Tae App</title>

    <?php
    include("./../../assets/scripts/tailwind.php") ?>
    
    <link rel="stylesheet" href="./../../assets/stylesheets/navbar.css">
    <link rel="stylesheet" href="./../../assets/stylesheets/global.css">
    <link rel="stylesheet" href="./../../assets/stylesheets/developers.css">

</head>

<body>
<?php
include("./../../assets/component/navManager.php") ?>
<main class="">
    <section class="body_container top-item flex flex-col gap-6">

        <!-- ตาราง Create -->
        <div class="flex flex-col gap-6">

            <form action="/backend/database/manager.php" method="post">

                <div class="flex flex-col blur-effect rounded-lg p-8 bg-white relative overflow-hidden"
                     data-te-perfect-scrollbar-init>
                    <h2 class="text-2xl mt-0">จัดการสมาชิก</h2>
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8" data-te-datatable-init>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm font-light" id="displayUser">
                                    <thead>
                                    <tr class="border-b font-medium dark:border-neutral-500">
                                        <th scope="col" class="px-6 py-4">หมายเลขโทรศัพท์</th>
                                        <th scope="col" class="px-6 py-4">ชื่อสมาชิก</th>
                                        <th scope="col" class="px-6 py-4">อีเมล</th>
                                        <th scope="col" class="px-6 py-4">ตำแหน่ง</th>
                                        <th scope="col" class="px-6 py-4">สถานะ</th>
                                        <th scope="col" class="px-6 py-4">แต้มสะสม</th>
                                        <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                        <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include '../../backend/connectDatabase.php';
                                    $data = array();
                                    $database->custom("SELECT phoneNumber, memberName, email, status, points, role, userID FROM users WHERE NOT userID={$_SESSION['userID']} ORDER BY role");
                                    foreach ($database->getResult()['payload'] as $item) {
                                        array_push($data, $item); ?>
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4"><?php
                                                echo $item->phoneNumber ?></td>
                                            <td class="whitespace-nowrap px-6 py-4"><?php
                                                echo $item->memberName ?></td>
                                            <td class="whitespace-nowrap px-6 py-4"><?php
                                                echo $item->email ?></td>
                                            <td class="whitespace-nowrap px-6 py-4"><?php
                                                echo $item->role ?></td>
                                            <td class="whitespace-nowrap px-6 py-4"><?php
                                                echo $item->status ?></td>
                                            <td class="whitespace-nowrap px-6 py-4"><?php
                                                echo $item->points ?></td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <?php
                                                if ($item->status == "ACTIVE")
                                                    echo "<button type='button' class='inline-block rounded-full bg-warning px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]' onclick='change_status(this, {$item->userID})'>ระงับบัญชี</button>";
                                                else echo "<button type='button' class='inline-block rounded-full bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]' onclick='change_status(this, {$item->userID})'>เปิดใช้งาน</button>"; ?>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <button type='button'
                                                        class='inline-block rounded-full bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]' <?php
                                                echo "onclick='change_passwd(this, {$item->userID})'"; ?>>รีเซ็ตรหัสผ่าน
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    unset($database);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </section>
</main>


<script>
    function inp_case(input, value, name) {
        input.value = value
        input.type = 'hidden'
        input.name = name
    }

    function change_status(element, id) {
        let input = document.createElement("input")
        inp_case(input, 'change_status', 'case')
        element.form.appendChild(input)

        input = document.createElement("input")
        inp_case(input, id, "ID")
        element.form.appendChild(input)

        element.form.submit()
    }

    function change_passwd(element, id) {
        let input = document.createElement("input")
        inp_case(input, 'change_passwd', 'case')
        element.form.appendChild(input)

        input = document.createElement("input")
        inp_case(input, id, "ID")
        element.form.appendChild(input)

        element.form.submit()
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./../../assets/scripts/sweetalert.js"></script>
<?php
if (isset($_SESSION['result'])) { ?>
    <script>
        <?php $fire = false; ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "change_status")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "change_status")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>



        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "change_passwd")) { ?>
        LongToast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "change_passwd")) { ?>
        LongToast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>


        <?php if ($fire)
            unset($_SESSION['result']) ?>
    </script>
    <?php
} ?>

<?php
include("./../../assets/scripts/tw_element.php") ?>
</body>

</html>