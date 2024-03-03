<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != "STAFF" && $_SESSION['role'] != "MANAGER")
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
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tailwind.php") ?>
</head>

<body>
<?php

$isAuth = isset($_SESSION['memberName']);
if (!$isAuth) { ?>
    <section class="h-screen">
        <div class="h-full">
            <!-- Left column container with background-->
            <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                    <img src="/assets/images/account/draw2.webp" class="w-full" alt="Sample image"/>
                </div>

                <!-- Right column container -->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">

                    <form method="post" action="/backend/account/read_user.php">

                        <!-- Email input -->
                        <div class="relative mb-6 flex-1" id="credentialInput" data-te-input-wrapper-init>
                            <input type="text" name="credential"
                                   class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                   id="credential" placeholder="อีเมลหรือหมายเลขโทรศัพท์"
                                   title='ต้องเป็นอีเมล หรือ หมายเลขโทรศัพท์' required/>
                            <label for="credential"
                                   class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">อีเมลหรือหมายเลขโทรศัพท์
                            </label>
                        </div>

                        <!-- Password input -->
                        <div class="relative mb-6" id="passwdInput" data-te-input-wrapper-init>
                            <input type="password" name="passwd" pattern=".{8,}"
                                   class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                   id="password" placeholder="รหัสผ่าน" required
                                   title='ต้องมีความยาว 8 ตัวอักษรขึ้นไป'/>
                            <label for="password"
                                   class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">รหัสผ่าน
                            </label>
                        </div>

                        <div class="mb-6 flex items-center justify-between">
                            <!-- Remember me checkbox -->
                            <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                <input class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                       type="checkbox" value="1" id="remember" name="remember"/>
                                <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="remember">
                                    จดจำบัญชีนี้ไว้
                                </label>
                            </div>
                        </div>

                        <!-- Login button -->
                        <div class="text-center lg:text-left">
                            <button type="submit"
                                    class="inline-block rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-ripple-init data-te-ripple-color="light">
                                เข้าสู่ระบบ
                            </button>

                            <!-- Register link -->
                            <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
                                ไม่มีบัญชี?
                                <a href="/pages/register.php"
                                   class="text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700">สมัครสมาชิก</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/scripts/sweetalert.js"></script>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>

    <?php
} ?>

<?php
if ($isAuth && ($_SESSION['role'] == "STAFF" || $_SESSION['role'] == "MANAGER")) { ?>
<!--Tabs navigation-->
<ul class="place-content-center mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0" role="tablist" data-te-nav-ref>
    <li role="presentation">
        <a href="#tabs-table"
           class="my-2 block px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:bg-gray-100 data-[te-nav-active]:text-primary data-[te-nav-active]:border-b-2 border-primary dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
           data-te-toggle="pill" data-te-target="#tabs-table" data-te-nav-active role="tab" aria-controls="tabs-table"
           aria-selected="true">โต๊ะ</a>
    </li>
    <li role="presentation">
        <a href="#tabs-queue"
           class="my-2 block border-x-0 border-t-0 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-b-2 border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
           data-te-toggle="pill" data-te-target="#tabs-queue" role="tab" aria-controls="tabs-queue"
           aria-selected="false">คิวการรอ</a>
    </li>
</ul>

<!--Tabs content-->
<div class="mb-6">

    <div class="bg-white rounded-lg shadow p-3 w-fit m-auto place-content-center hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
         id="tabs-table" role="tabpanel" aria-labelledby="tabs-table-tab" data-te-tab-active>
        <form action="./../../backend/database/staff.php" method="post">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8" data-te-datatable-init>
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead>
                                <tr class="border-b font-medium dark:border-neutral-500">
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">เลขโต๊ะ</th>
                                    <th scope="col" class="px-6 py-4">โค้ดโต๊ะ</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">สมาชิก</th>
                                    <th scope="col" class="px-6 py-4">แต้มสะสม</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">ความจุที่นั่ง</th>
                                    <th scope="col" class="px-6 py-4">สถานะ</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $data = array();
                                include '../../backend/connectDatabase.php';
                                $database->custom("SELECT tableID, code, phoneNumber, points, capacity, tables.status FROM tables LEFT JOIN users USING (userID)");
                                foreach ($database->getResult()['payload'] as $item) {
                                    array_push($data, $item); ?>
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
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            if ($item->status == "UNAVAILABLE")
                                                echo "<button type='button' data-te-toggle='modal' data-te-target='#bill{$item->tableID}' data-te-ripple-init data-te-ripple-color='light' class='inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] disabled:opacity-70'>จ่ายบิล</button>";
                                            else echo "<button type='button' data-te-ripple-init data-te-ripple-color='light' class='inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] disabled:opacity-70' disabled>จ่ายบิล</button>" ?>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <?php
                                            if ($item->status == "AVAILABLE")
                                                echo "<button type='button' onclick='randomCode(this, {$item->tableID})' data-te-ripple-init data-te-ripple-color='light' class='inline-block rounded bg-primary text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200 disabled:opacity-70'>สุ่มโค้ด</button>";
                                            else echo "<button type='button' data-te-ripple-init data-te-ripple-color='light' class='inline-block rounded bg-primary text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200 disabled:opacity-70' disabled>สุ่มโค้ด</button>";
                                            ?>
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
        </form>
    </div>

    <?php
    foreach ($data as $item) { ?>
        <!--Vertically centered modal-->
        <div data-te-modal-init
             class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
             id="bill<?php
             echo $item->tableID; ?>" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true"
             role="dialog">
            <div data-te-modal-dialog-ref
                 class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="exampleModalCenterTitle">
                            บิลโต๊ะ <?php
                            echo $item->tableID ?>
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
                    <div class="relative p-4">
                        <p class="font-bold">รายการอาหารที่สั่ง</p>
                        <div class="flex flex-col m-auto opacity-75">

                            <?php
                            $database->custom("SELECT * FROM orders")
                            ?>
                            <div class="flex flex-row flex-1">
                                <div class="flex-1">อาหาร</div>
                                <div class="flex-1">X4</div>
                                <div class="flex-1 text-right">400 บาท</div>
                            </div>

                        </div>
                    </div>

                    <!--Modal footer-->
                    <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button type="button"
                                class="inline-block rounded bg-success-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-success-700 transition duration-150 ease-in-out hover:bg-success-accent-100 focus:bg-success-accent-100 focus:outline-none focus:ring-0 active:bg-success-accent-200"
                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            ยกเลิก
                        </button>
                        <button type="button"
                                class="ml-1 inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light">
                            ยืนยัน
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } ?>

    <div class="bg-white rounded-lg shadow account-container p-5 w-fit m-auto hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
         id="tabs-queue" role="tabpanel" aria-labelledby="tabs-queue-tab">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="justify-center m-auto">

                            <form action="">
                                <div class="flex md:flex-row sm:flex-col flex-col md:gap-3">
                                    <div class="flex-1 relative mb-3 mt-1" data-te-input-wrapper-init>
                                        <input type="number"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="que" name="que" placeholder="จำนวนลูกค้า" min='0' max='99' required/>
                                        <label for="que"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">จำนวนลูกค้า
                                        </label>
                                    </div>

                                    <div class="place-content-center mt-1">
                                        <button data-te-ripple-init data-te-ripple-color="light"
                                                class="px-3 py-1.5 rounded-lg bg-primary text-white" type="submit"
                                                onclick="addque()">
                                            เพิ่มคิว
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">หมายเลขคิว</th>
                                <th scope="col" class="px-6 py-4">จำนวนลูกค้า</th>
                            </tr>
                            </thead>
                            <tbody id="that_table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    } ?>
    <script>
        function inp_case(input, value, name) {
            input.value = value
            input.type = 'hidden'
            input.name = name
        }

        function bill(element, id) {
            let input = document.createElement("input")
            inp_case(input, 'payBill', 'case')
            element.form.appendChild(input);

            // การส่งให้ผ่านต้องเป็น Staff
            input = document.createElement("input")
            inp_case(input, id, "ID")
            element.form.appendChild(input)

            element.form.submit();
        }

        function randomCode(element, id) {
            let input = document.createElement("input")
            inp_case(input, 'randomTableCode', 'case')
            element.form.append(input);

            // การส่งให้ผ่านต้องเป็น Staff
            input = document.createElement("input")
            inp_case(input, id, "ID")
            element.form.appendChild(input)

            element.form.submit();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/scripts/sweetalert.js"></script>
    <?php
    if (isset($_SESSION['result'])) { ?>
        <script>
            <?php $fire = false; ?>

            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "randomTableCode")) { ?>
            Toast.fire({
                icon: "success",
                title: "<?php echo $_SESSION['result']['message']; ?>",
            });
            <?php $fire = true; ?>

            <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "randomTableCode")) { ?>
            Toast.fire({
                icon: "error",
                title: "<?php echo $_SESSION['result']['message']; ?>",
            });
            <?php $fire = true;
            } ?>


            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "payBill")) { ?>
            Toast.fire({
                icon: "success",
                title: "<?php echo $_SESSION['result']['message']; ?>",
            });
            <?php $fire = true; ?>

            <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "payBill")) { ?>
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
    <script>
        var current_queue;

        if (localStorage.getItem('queue_table') == null) {
            var queue_table = {
                current_queue: 1,
                queue: []
            };
            current_queue = 1;
            localStorage.setItem('queue_table', JSON.stringify(queue_table));
        } else {
            var queue_table = JSON.parse(localStorage.getItem('queue_table'));
            current_queue = queue_table.current_queue;
        }
        queue_table.queue.forEach(function (queueItem) {
            let tbody = document.getElementById('that_table');
            let col3 = document.createElement('td');
            let col2 = document.createElement('td');
            let col1 = document.createElement('td');
            col3.innerHTML = '<form><button data-te-ripple-init data-te-ripple-color="light" class="px-3 py-2 rounded-lg bg-primary text-white" onclick="delque(' + queueItem.queue_number + ')">เรียกคิวแล้ว</button></form>'
            col1.innerHTML = '<p scope="col" class="px-6 py-4">' + queueItem.queue_number + '</p>';
            col2.innerHTML = '<p scope="col" class="px-6 py-4">' + queueItem.customer_amount + '</p>';
            let row = document.createElement('tr');
            row.append(col1);
            row.append(col2);
            row.append(col3);
            tbody.append(row);
        });

        function delque(number) {
            var indexToRemove = queue_table.queue.findIndex(function (item) {
                return item.queue_number === number;
            });
            if (indexToRemove !== -1) {
                queue_table.queue.splice(indexToRemove, 1);
            }
            localStorage.setItem('queue_table', JSON.stringify(queue_table));
        }

        function addque() {
            let customer_amount = document.getElementById('que').value;
            if (customer_amount != '' && customer_amount != null) {
                queue_table.queue.push({
                    "queue_number": current_queue,
                    "customer_amount": customer_amount
                });
                queue_table.current_queue++;
                current_queue++; // Increment current_queue
                localStorage.setItem('queue_table', JSON.stringify(queue_table));
            }
        }
    </script>

</body>

</html>