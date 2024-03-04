<?php
session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Laew Tae App</title>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tailwind.php") ?>

    <link rel="stylesheet" href="./../../assets/stylesheets/navbar.css">
    <link rel="stylesheet" href="./../../assets/stylesheets/global.css">
</head>

<body>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/navCustomer.php") ?>

<?php
if (isset($_SESSION['memberName'])) { ?>
<span class="my-5">
            <div class="border dark:border-neutral-600 shadow mt-7">
                <div class="m-4">
                    <div class="sm:flex sm:items-start ">

                        <ul class="mr-2 flex list-none flex-col flex-wrap pl-0" role="tablist" data-te-nav-ref>

                            <!-- ข้อมูลส่วนตัว -->
                            <li role="presentation" class="flex-grow text-center">
                                <a href="#tabs-details"
                                   class="my-2 block px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:bg-gray-100 data-[te-nav-active]:text-primary data-[te-nav-active]:border-b-2 border-primary dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
                                   data-te-toggle="pill" data-te-target="#tabs-details" data-te-nav-active="" role="tab"
                                   aria-controls="tabs-details" aria-selected="true">ข้อมูลส่วนตัว</a>
                            </li>

                            <!-- แก้ไขข้อมูลส่วนตัว -->
                            <li role="presentation" class="flex-grow text-center">
                                <a href="#tabs-edit"
                                   class="my-2 block border-x-0 border-t-0 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-b-2 border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                   data-te-toggle="pill" data-te-target="#tabs-edit" role="tab"
                                   aria-controls="tabs-edit" aria-selected="false">แก้ไขข้อมูลส่วนตัว</a>
                            </li>

                            <!-- เปลี่ยนรหัสผ่าน -->
                            <li role="presentation" class="flex-grow text-center">
                                <a href="#tabs-changePass"
                                   class="my-2 block border-x-0 border-t-0 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-b-2 border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                                   data-te-toggle="pill" data-te-target="#tabs-changePass" role="tab"
                                   aria-controls="tabs-changePass" aria-selected="false">เปลี่ยนรหัสผ่าน</a>
                            </li>

                        </ul>
                        <!-- Detail ข้อมูลส่วนตัว -->
                        <div class="my-2 grow p-3">
                            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                 id="tabs-details" role="tabpanel" aria-labelledby="tabs-detail-tab"
                                 data-te-tab-active="">
                                <!-- detail -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!--Email-->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="text"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="email" value="<?php
                                        echo $_SESSION['email'] ?>" aria-label="readonly input example" readonly/>
                                        <label for="email"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">อีเมล
                                        </label>
                                    </div>

                                    <!--Telephone-->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="text"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="phoneNumber" value="<?php
                                        echo $_SESSION['phoneNumber'] ?>" aria-label="readonly input example" readonly/>
                                        <label for="phoneNumber"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">หมายเลขโทรศัพท์
                                        </label>
                                    </div>
                                </div>

                                <!--MemberName-->
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="text"
                                           class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                           id="memberName" value="<?php
                                    echo $_SESSION['memberName'] ?>" aria-label="readonly input example" readonly/>
                                    <label for="memberName"
                                           class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อสมาชิก
                                    </label>
                                </div>

                                <!--Points-->
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="text"
                                           class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                           id="points" value="<?php
                                    echo $_SESSION['points'] ?>" aria-label="readonly input example" readonly/>
                                    <label for="points"
                                           class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">แต้มสะสม
                                    </label>
                                </div>

                                <!-- Delete Account -->
                                <button type="button" data-te-toggle="modal" data-te-target="#deleteAccount"
                                        data-te-ripple-init
                                        class="inline-block rounded bg-danger px-4 py-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                        data-te-ripple-init data-te-ripple-color="light">
                                    ยกเลิกสมาชิก
                                </button>
                                <!-- Modal -->
                                <div data-te-modal-init
                                     class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                     id="deleteAccount" tabindex="-1" aria-labelledby="deleteAccountTitle"
                                     aria-hidden="true">
                                    <div data-te-modal-dialog-ref
                                         class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                        <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                                <!--Modal title-->
                                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                    id="deleteAccountTitle">
                                                    คำเตือน
                                                </h5>
                                                <!--Close button-->
                                                <button type="button"
                                                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                        data-te-modal-dismiss aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!--Modal body-->
                                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                                <h1 class="mb-6 text-5xl font-bold text-center text-danger">
                                                    !!!ระวัง!!!
                                                </h1>
                                                <p class="mb-6 text-xl font-bold text-center text-danger">
                                                    การลบบัญชีจะลบข้อมูลทั้งหมดของคุณ<br>
                                                    ข้อมูลแต้มและส่วนลดในบัญชีจะหายไป
                                                </p>
                                            </div>

                                            <!--Modal footer-->
                                            <div class="flex flex-shrink-0 flex-wrap items-center justify-center rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                                <form action="/backend/account/cancelMem_user.php" method="post">
                                                    <button type="submit"
                                                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                            data-te-modal-dismiss data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                        ยืนยัน
                                                    </button>
                                                    <button type="button"
                                                            class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                            data-te-modal-dismiss data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                        ยกเลิก
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- edit -->
                            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                 id="tabs-edit" role="tabpanel" aria-labelledby="tabs-edit-tab">

                                <!-- detail -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!--Email-->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="text"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="email" value="<?php
                                        echo $_SESSION['email'] ?>" aria-label="readonly input example" readonly/>
                                        <label for="email"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">อีเมล
                                        </label>
                                    </div>

                                    <!--Telephone-->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="text"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="phoneNumber" value="<?php
                                        echo $_SESSION['phoneNumber'] ?>" aria-label="readonly input example" readonly/>
                                        <label for="phoneNumber"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">หมายเลขโทรศัพท์
                                        </label>
                                    </div>
                                </div>

                                <form action="/backend/account/update_user.php" method="post">
                                    <!-- MemberName -->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="text"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="name" name="name" aria-describedby="name" placeholder="ชื่อสมาชิก"
                                               value="<?php
                                               echo $_SESSION['memberName'] ?>" pattern=".{4,}"
                                               title='ต้องมีอักษร 4 ตัวขึ้นไป' required/>
                                        <label for="name"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อสมาชิก
                                        </label>
                                    </div>

                                    <button type="submit"
                                            class="inline-block rounded bg-primary px-4 py-2 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                            data-te-ripple-init data-te-ripple-color="light">
                                        ยืนยันแก้ไขข้อมูล
                                    </button>
                                </form>
                            </div>
                            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                 id="tabs-changePass" role="tabpanel" aria-labelledby="tabs-changePass-tab">
                                <!-- Change Password -->
                                <form action="/backend/account/changePassword_user.php" method="post">
                                    <!-- Old Password -->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="password"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="passwd" name="oldpasswd" aria-describedby="password"
                                               placeholder="รหัสผ่านเดิม" pattern=".{8,}" title='กรุณาใส่รหัสผ่านเดิม'
                                               required/>
                                        <label for="password"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">รหัสผ่านเดิม
                                        </label>
                                    </div>

                                    <!-- New Password -->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="password"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="passwd" name="newpasswd" aria-describedby="password"
                                               placeholder="รหัสผ่านใหม่" pattern=".{8,}"
                                               title='ต้องมีความยาว 8 ตัวอักษรขึ้นไป' required/>
                                        <label for="password"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">รหัสผ่านใหม่
                                        </label>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="password"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="passwd" name="confirmpasswd" aria-describedby="password"
                                               placeholder="ยืนยันรหัสผ่านใหม่" pattern=".{8,}"
                                               title='กรุณาใส่รหัสผ่านอีกครั้ง' required/>
                                        <label for="password"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ยืนยันรหัสผ่านใหม่
                                        </label>
                                    </div>

                                    <button type="submit"
                                            class="inline-block rounded bg-primary px-4 py-2 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                            data-te-ripple-init data-te-ripple-color="light">
                                        ยืนยันเปลี่ยนรหัสผ่าน
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script src="/assets/scripts/sweetalert.js"></script>
                <?php
                } else { ?>
                    <script>
                        Warning.fire({
                            icon: "warning",
                            title: "คำเตือน",
                            text: "คุณยังไม่ได้เข้าสู่ระบบ",
                        }).then(result => {
                            if (result.isConfirmed) {
                                location.href = "./../../index.php"
                            }
                        });
                    </script>
                    <?php
                } ?>
                </div>
            </div>
        </span>

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/assets/scripts/sweetalert.js"></script>

<?php
if (isset($_SESSION['result'])) { ?>
    <script>
        <?php $fire = false; ?>
        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "update_user")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "update_user")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>


        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "chapass_user")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "chapass_user")) { ?>
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

</body>

</html>