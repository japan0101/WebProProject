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

    <link rel="stylesheet" href="/assets/stylesheets/global.css">
    <link rel="stylesheet" href="/assets/stylesheets/developers.css">

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tailwind.php") ?>
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/navManager.php") ?>
    <main class="">
        <section class="body_container top-item flex flex-col gap-6">

            <!-- ตาราง Create -->
            <div class="flex flex-col gap-6">
                <div class="flex flex-col blur-effect rounded-lg p-8 bg-white relative overflow-hidden" data-te-perfect-scrollbar-init>
                    <h2 class="text-2xl mt-0">จัดการเมนู</h2>
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8" data-te-datatable-init>
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm font-light" id="displayTable">
                                    <thead>
                                        <tr class="border-b font-medium dark:border-neutral-500">
                                            <th scope="col" class="px-6 py-4">ชื่อเมนู</th>
                                            <th scope="col" class="px-6 py-4">ราคา</th>
                                            <th scope="col" class="px-6 py-4">คำอธิบาย</th>
                                            <th scope="col" class="px-6 py-4">ประเภทเมนู</th>
                                            <th scope="col" class="px-6 py-4">รูป</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../backend/connectDatabase.php';
                                        $database->custom("SELECT menuName, price, description, points, capacity, tables.status FROM tables LEFT JOIN users USING (userID)");
                                        foreach ($database->getResult()['payload'] as $item) { ?>
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-4"><?php echo $item->tableID ?></td>
                                                <td class="whitespace-nowrap px-6 py-4"><?php echo $item->code ?></td>
                                                <td class="whitespace-nowrap px-6 py-4"><?php echo $item->phoneNumber ?></td>
                                                <td class="whitespace-nowrap px-6 py-4"><?php echo $item->points ?></td>
                                                <td class="whitespace-nowrap px-6 py-4"><?php echo $item->capacity ?></td>
                                                <td class="whitespace-nowrap px-6 py-4"><?php echo $item->status ?></td>
                                            </tr>
                                        <?php }
                                        unset($database);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>


    <script>
        function inp_case(input, value, name) {
            input.value = value
            input.type = 'hidden'
            input.name = name
        }

        // สร้าง Input Hidden ตอนกดส่ง Form
        function insertTable(element) {
            let input = document.createElement("input")
            inp_case(input, 'insertTable', 'case')
            element.form.append(input);

            element.form.submit();
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/scripts/sweetalert.js"></script>
    <?php
    if (isset($_SESSION['result'])) { ?>
        <script>
            <?php $fire = false; ?>

            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "create_menu")) { ?>
                Toast.fire({
                    icon: "success",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                });
                <?php $fire = true; ?>

            <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "create_menu")) { ?>
                Toast.fire({
                    icon: "error",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                });
            <?php $fire = true;
            } ?>



            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "create_category")) { ?>
                Toast.fire({
                    icon: "success",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                });
                <?php $fire = true; ?>

            <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "create_category")) { ?>
                Toast.fire({
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
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>
</body>

</html>