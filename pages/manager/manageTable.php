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
        <div class="flex md:flex-row sm:flex-col flex-col blur-effect rounded-lg p-8 bg-white gap-3">
            <!-- Create Menu -->
            <div class="flex-1">
                <form class="" action="/backend/database/manager.php" method="post" enctype="multipart/form-data">
                    <h2 class="text-2xl  mt-0">สร้างโต๊ะ</h2>
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="number"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="capacity" name="capacity" placeholder="ความจุของโต๊ะ" min='1' max='99' required/>
                        <label for="capacity"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ความจุของโต๊ะ
                        </label>
                    </div>

                    <button onclick="insertTable(this)" type="button" data-te-ripple-init data-te-ripple-color="light"
                            class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                        เพิ่มโต๊ะ
                    </button>

                </form>
            </div>
        </div>

        <div class="flex flex-col gap-6">
            <div class="flex flex-col blur-effect rounded-lg p-8 bg-white relative overflow-hidden"
                 data-te-perfect-scrollbar-init>
                <h2 class="text-2xl mt-0">ตารางโต๊ะต่าง ๆ</h2>
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8" data-te-datatable-init>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm font-light" id="displayTable">
                                <thead>
                                <tr class="border-b font-medium dark:border-neutral-500">
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">เลขโต๊ะ</th>
                                    <th scope="col" class="px-6 py-4">โค้ดโต๊ะ</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">สมาชิก</th>
                                    <th scope="col" class="px-6 py-4">แต้มสะสม</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">ความจุที่นั่ง</th>
                                    <th scope="col" class="px-6 py-4">สถานะ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include '../../backend/connectDatabase.php';
                                $database->custom("SELECT tableID, code, phoneNumber, points, capacity, tables.status FROM tables LEFT JOIN users USING (userID)");
                                foreach ($database->getResult()['payload'] as $item) { ?>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->tableID ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->code ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->phoneNumber ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->points ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->capacity ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->status ?></td>
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

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "insertTable")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "insertTable")) { ?>
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