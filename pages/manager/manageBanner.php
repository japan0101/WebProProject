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
            <div class="flex md:flex-row sm:flex-col flex-col blur-effect rounded-lg p-8 bg-white gap-3">
                <div class="flex-1">
                    <form class="" action="./../../backend/database/manager.php" method="post">
                        <h2 class="text-2xl mt-0">สร้างกล่องสุ่ม</h2>
                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input type="text"
                                   class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                   id="name" name="name" placeholder="ชื่อเมนู" required/>
                            <label for="name"
                                   class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อกล่องสุ่ม
                            </label>
                        </div>

                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <input type="number"
                                   class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                   id="cost" name="cost" placeholder="ราคา" min='0' required/>
                            <label for="cost"
                                   class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ราคา
                            </label>
                        </div>

                        <div class="relative mb-3" data-te-input-wrapper-init>
                            <textarea
                                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="description" name="description" rows="3" placeholder="คำอธิบาย"></textarea>
                            <label for="description"
                                   class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">คำอธิบาย
                                (Optional)</label>
                        </div>

                        <div class="relative mb-3" data-te-date-timepicker-init data-te-input-wrapper-init
                             data-te-inline="true">
                            <input type="text"
                                   class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                   id="expire" name="expire" required/>
                            <label for="expire"
                                   class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">วันหมดอายุ</label>
                        </div>

                        <button name="case" value="create_banner" type="submit" data-te-ripple-init
                                data-te-ripple-color="light"
                                class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                                onclick="">
                            เพิ่มกล่องสุ่ม
                        </button>
                    </form>
                </div>
            </div>
            <div class="flex flex-col blur-effect rounded-lg p-8 bg-white relative" data-te-perfect-scrollbar-init>
                <h2 class="text-2xl mt-0">จัดการกล่องสุ่ม</h2>


                <!-- Create Menu -->


                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8" data-te-datatable-init>
                        <div class="">
                            <table class="min-w-full text-left text-sm font-light overflow-x-auto" id="displayTable">
                                <thead>
                                <tr class="border-b font-medium dark:border-neutral-500">
                                    <th scope="col" class="px-6 py-4">ชื่อกล่อง</th>
                                    <th scope="col" class="px-6 py-4">ราคา</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">คำอธิบาย</th>
                                    <th scope="col" class="px-6 py-4">หมดอายุ</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include '../../backend/connectDatabase.php';
                                $data = array();
                                $database->custom("SELECT * FROM `gacha_banner`");
                                foreach ($database->getResult()['payload'] as $item) {
                                    array_push($data, $item); ?>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->name ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->cost ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->description ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->expire ?></td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <button data-te-toggle="modal" data-te-target="#<?php
                                            echo "gacha_modify{$item->gachaID}" ?>" type="button" data-te-ripple-init
                                                    data-te-ripple-color="light"
                                                    class="inline-block rounded-full bg-primary px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                                แก้ไขกล่องสุ่ม
                                            </button>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <button data-te-toggle="modal" data-te-target="#<?php
                                            echo "gacha_delete{$item->gachaID}" ?>" type="button" data-te-ripple-init
                                                    data-te-ripple-color="light"
                                                    class="inline-block rounded-full bg-danger px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                                                ลบกล่องสุ่ม
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
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
    const select = []
</script>
<?php

$gacha_item = array();
$database->custom("SELECT gacha_item.gachaID, menus.menuName, gacha_item.rarity, gacha_item.discount, menus.menuID FROM `gacha_banner` RIGHT JOIN gacha_item ON gacha_banner.gachaID = gacha_item.gachaID LEFT JOIN menus USING (menuID) ORDER BY  gachaID ASC, rarity DESC");
foreach ($database->getResult()['payload'] as $menu_item) {
    array_push($gacha_item, $menu_item);
}
unset($database);
?>

<?php
foreach ($data as $item) { ?>
    <div data-te-modal-init
         class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
         id="gacha_modify<?php
         echo $item->gachaID ?>" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true"
         role="dialog">
        <div data-te-modal-dialog-ref
             class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalCenterTitle">
                        แก้ไขกล่องสุ่ม
                    </h5>
                    <!--Close button-->
                    <button type="button"
                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!--Modal body-->
                <form class="p-5" action="./../../backend/database/manager.php" method="post"
                      enctype="multipart/form-data">
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="name" name="name" placeholder="ชื่อเมนู" value="<?php
                        echo $item->name ?>" required/>
                        <label for="name"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อกล่องสุ่ม
                        </label>
                    </div>

                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="number"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="cost" name="cost" placeholder="ราคา" min='0' value="<?php
                        echo $item->cost ?>" required/>
                        <label for="cost"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ราคา(แต้ม)
                        </label>
                    </div>

                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <textarea
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="description" name="description" rows="3" placeholder="คำอธิบาย"><?php
                            echo $item->description ?></textarea>
                        <label for="description"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">คำอธิบาย
                            (Optional)</label>
                    </div>

                    <div class="relative mb-3" data-te-date-timepicker-init data-te-input-wrapper-init
                         data-te-inline="true">
                        <input type="text"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="expire" name="expire" required value="<?php
                        echo $item->expire ?>"/>
                        <label for="expire"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">วันหมดอายุ</label>
                    </div>

                    <div class="relative mb-3">
                        <h5 class="text-center">ส่วนลดภายในกล่อง</h5>
                        <table class="min-w-full text-center text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-2">ระดับ</th>
                                <th scope="col" class="px-6 py-2">ชื่อเมนู</th>
                                <th scope="col" class="px-6 py-2">ลด(%)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($gacha_item as $gachaitem) { ?>
                                <?php
                                if ($gachaitem->gachaID == $item->gachaID) { ?>
                                    <tr>
                                        <td><?php
                                            echo $gachaitem->rarity ?></td>
                                        <td><?php
                                            echo $gachaitem->menuName ?></td>
                                        <td><?php
                                            echo $gachaitem->discount * 100 ?> %
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-shrink-0 flex-wrap items-center justify-center rounded-b-md p-4 dark:border-opacity-50">
                        <button type="Button"
                                class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light" onclick="addCoupon(<?php
                        echo $item->gachaID ?>)">
                            เพิ่มส่วนลด
                        </button>
                        <button type="Button"
                                class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light" onclick="removeCoupon(<?php
                        echo $item->gachaID ?>)">
                            นำส่วนลดออก
                        </button>
                    </div>

                    <input type="hidden" name="case" value="modify_banner">
                    <input type="hidden" name="ID" value="<?php
                    echo $item->gachaID ?>">

                    <!--Modal footer-->
                    <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button type="button"
                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            ยกเลิก
                        </button>
                        <button type="submit"
                                class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light">
                            แก้ไขข้อมูล
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!--Vertically centered modal-->
    <div data-te-modal-init
         class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
         id="gacha_delete<?php
         echo $item->gachaID ?>" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true"
         role="dialog">
        <div data-te-modal-dialog-ref
             class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalCenterTitle">
                        ลบกล่อง
                    </h5>
                    <!--Close button-->
                    <button type="button"
                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!--Modal body-->
                <form action="./../../backend/database/manager.php" method="post">
                    <div class="relative p-4">
                        <p>ต้องการลบเมนูทิ้งใช่หรือไม่?</p>
                    </div>

                    <input type="hidden" name="case" value="delete_banner">
                    <input type="hidden" name="ID" value="<?php
                    echo $item->gachaID ?>">

                    <!--Modal footer-->
                    <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button type="button"
                                class="inline-block rounded bg-red-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-red-700 transition duration-150 ease-in-out hover:bg-red-200 focus:bg-red-100 focus:outline-none focus:ring-0 active:bg-red-200"
                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            ยกเลิก
                        </button>
                        <button type="submit"
                                class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light">
                            ยืนยัน
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <form action="./../../backend/database/manager.php" method="post" id="addbanneritem">
        <input type="hidden" name="case" id="case" value="addtobanner">
    </form>
    <form action="./../../backend/database/manager.php" method="post" id="delbanneritem">
        <input type="hidden" name="case" id="case" value="delfrombanner">
    </form>
    <script>
        select.push({
            id: document.getElementById("select_<?php echo $item->gachaID ?>"),
            category: "<?php echo $item->categoryName ?>"
        })
    </script>
    <?php
}
?>

<script>
    const menuList = []
    fetch("./../../backend/database/customer.php?case=allmenus").then(e => e.json()).then(payload => {
        payload.forEach(menuItem => {
            menuList.push(menuItem);
        });
    })
    const itemList = [];
    fetch("./../../backend/database/customer.php?case=getrate").then(e => e.json()).then(payload => {
        payload.forEach(gachaItem => {
            //gachaID, menuName, rarity, discount, menuID
            itemList.push(gachaItem);
        });
    })
</script>

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

    async function addCoupon(bannerID) {
        //ask for menuID, discount, and rarity
        const {
            value: formValues
        } = await Swal.fire({
            title: "Multiple inputs",
            html: `<p class="text-xl my-2">โปรดใส่ข้อมูลดังนี้</p>` +
                ` <label data-te-select-label-ref class="text-l my-2">เมนูที่ลด</label>
                <input type="hidden" name="gachaID" id="gachaID" value="` + bannerID + `">
                <select id="menuID" name="menuID" class="text-center border-2 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
                ` +
                getMenuList()

                +
                `</select>` +
                ` <label data-te-select-label-ref class="text-l my-2">ส่วนลด</label>
                <select id="discount" name="discount" class="text-center border-2 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
                    <option value="0.01">1%</option>
                    <option value="0.05">5%</option>
                    <option value="0.1">10%</option>
                    <option value="0.15">15%</option>
                    <option value="0.2">20%</option>
                    <option value="0.3">30%</option>
                    <option value="0.4">40%</option>
                    <option value="0.5">50%</option>
                </select></form>` +
                ` <label data-te-select-label-ref class="text-l my-2">ระดับความหายาก</label>
                <select id="rarity" name="rarity" class="text-center border-2 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
                    <option value="COMMON">COMMON(70%)</option>
                    <option value="UNCOMMON">UNCOMMON(15%)</option>
                    <option value="RARE">RARE(11%)</option>
                    <option value="EPIC">EPIC(3.4%)</option>
                    <option value="LEGENDARY">LEGENDARY(0.5%)</option>
                    <option value="MYTHIC">MYTHIC(0.01%)</option>
                </select>`,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "สร้างเลย",
            showDenyButton: true,
            denyButtonText: "ยกเลิก",
            focusConfirm: false,
            preConfirm: () => {
                return {
                    gachaID: document.getElementById("gachaID").value,
                    menuID: document.getElementById("menuID").value,
                    discount: document.getElementById("discount").value,
                    rarity: document.getElementById("rarity").value
                };
            }
        });
        if (formValues) {
            const form = document.getElementById('addbanneritem');
            let banner = document.createElement("input")
            banner.name = "gachaID"
            banner.value = formValues['gachaID']
            let menuItem = document.createElement("input")
            menuItem.name = "menuID"
            menuItem.value = formValues['menuID']
            let discount = document.createElement("input")
            discount.name = "discount"
            discount.value = formValues['discount']
            let rarity = document.createElement("input")
            rarity.name = "rarity"
            rarity.value = formValues['rarity']
            form.append(banner)
            form.append(menuItem)
            form.append(discount)
            form.append(rarity)
            form.submit()
        }

    }

    async function removeCoupon(bannerID) {
        //ask for menuID and rarity
        const {value: delItem} = await Swal.fire({
            title: "นำส่วนลดออก",
            html: `
                    <label class="text-l my-2">ส่วนลดที่ต้องการเอาออก</label>
                    <select id="menuID" name="menuID" class="text-center border-2 peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
                ` +
                getGachaItemList(bannerID)

                +
                `</select> `,
            focusConfirm: false,
            preConfirm: () => {
                return [
                    document.getElementById("menuID").value.split(', ')
                ];
            }
        });
        if (delItem) {
            menuID = delItem[0][0];
            rarity = delItem[0][1];
            const form = document.getElementById('delbanneritem');
            let banner = document.createElement("input")
            banner.name = "gachaID"
            banner.value = bannerID
            let rarityInput = document.createElement("input")
            rarityInput.name = "rarity"
            rarityInput.value = rarity
            let menuItem = document.createElement("input")
            menuItem.name = "menuID"
            menuItem.value = menuID
            form.append(banner)
            form.append(rarityInput)
            form.append(menuItem)
            form.submit()
        }
    }

    function getMenuList() {
        options = '';
        menuList.forEach(menuItem => {
            options += '<option value="' + menuItem['menuID'] + ', ' + menuItem['rarity'] + '">' + menuItem['menuName'] + '</option>'
        });
        return options;
    }

    function getGachaItemList(bannerID) {

        options = ''
        itemList.forEach(item => {
            if (item['gachaID'] == bannerID) {
                options += '<option value="' + item['menuID'] + ', ' + item['rarity'] + '">' + item['rarity'] + '-' + item['menuName'] + '</option>'
            }
        });
        return options;
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./../../assets/scripts/sweetalert.js"></script>
<?php
if (isset($_SESSION['result'])) { ?>
    <script>
        <?php $fire = false; ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "modify_banner")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "modify_banner")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "create_banner")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "create_banner")) { ?>
        console.log(<?php echo $_SESSION['result']['message']; ?>);
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "addtobanner")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "addtobanner")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "delete_banner")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "delete_banner")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "delfrombanner")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "delfrombanner")) { ?>
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
include("./../../assets/scripts/tw_element.php") ?>
</body>

</html>
