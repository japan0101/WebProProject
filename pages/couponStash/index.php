<?php
session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="./../../assets/icon/favicon.svg">

    <title>Laew Tae App</title>

    <?php
    include("./../../assets/scripts/tailwind.php") ?>

    <link rel="stylesheet" href="./../../assets/stylesheets/navbar.css">
    <link rel="stylesheet" href="./../../assets/stylesheets/global.css">
</head>

<body>

    <header>
        <nav id="navbar" class="fixed top-0 left-0 w-full z-50 flex-no-wrap relative flex items-center justify-between bg-[#FBFBFB] py-2 dark:bg-neutral-600 lg:flex-wrap lg:justify-start lg:py-4 z-40 shadow-none">
            <div id="navbar-body" class="blur-effect flex w-full flex-wrap items-center justify-between px-3">
                <!-- Hamburger button for mobile view -->
                <button class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden" type="button" data-te-collapse-init data-te-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- Hamburger icon -->
                    <span class="[&>svg]:w-7">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                            <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <!-- Collapsible navigation container -->
                <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto" id="navbarSupportedContent1" data-te-collapse-item>
                    <!-- Logo -->
                    <a class="mb-4 ml-2 mr-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0" href="./../../">
                        <img src="./assets/icon/favicon.svg" class="h-8" alt="" loading="lazy" />
                    </a>
                    <?php
                    $isAuth = isset($_SESSION['memberName']);
                    if ($isAuth) { ?>
                        <!-- Left navigation links -->
                        <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <!-- Home -->
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400" href="./../../" data-te-nav-link-ref>หน้าหลัก</a>
                            </li>
                            <!-- Redeem Points -->
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="./../../pages/shop/" data-te-nav-link-ref>แลกแต้ม</a>
                            </li>
                            <!-- Banner -->
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="./../../pages/banner/" data-te-nav-link-ref>กล่องสุ่ม</a>
                            </li>
                            <!-- Stash -->
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="./../../pages/couponStash/" data-te-nav-link-ref>คูปองของฉัน</a>
                            </li>
                        </ul>
                </div>

                <!-- Second dropdown container -->
                <div class="relative" data-te-dropdown-ref data-te-dropdown-alignment="end">
                    <!-- Second dropdown trigger -->
                    <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="#" id="dropdownMenuButton2" role="button" data-te-dropdown-toggle-ref aria-expanded="false">
                        <!-- User avatar -->
                        ผู้ใช้
                    </a>
                    <!-- Second dropdown menu -->
                    <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block" aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                        <!-- Second dropdown menu items -->
                        <li>
                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="./../../pages/profile" data-te-dropdown-item-ref>ข้อมูลผู้ใช้</a>
                        </li>
                        <li>
                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="./../../backend/account/logout_user.php" data-te-dropdown-item-ref>ออกจากระบบ</a>
                        </li>
                    </ul>
                </div>
            <?php
                    } else { ?>
            </div>
            <div class="relative" data-te-dropdown-ref data-te-dropdown-alignment="end">
                <button type="button" class="inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-toggle="modal" data-te-target="#regisModal">
                    สมัครสมาชิก
                </button>
                <button type="button" class="inline-block rounded-full border-2 border-neutral-800 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-800 transition duration-150 ease-in-out hover:border-neutral-800 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-800 focus:border-neutral-800 focus:text-neutral-800 focus:outline-none focus:ring-0 active:border-neutral-900 active:text-neutral-900 dark:border-neutral-900 dark:text-neutral-900 dark:hover:border-neutral-900 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10 dark:hover:text-neutral-900 dark:focus:border-neutral-900 dark:focus:text-neutral-900 dark:active:border-neutral-900 dark:active:text-neutral-900" data-te-ripple-init data-te-toggle="modal" data-te-target="#loginModal">
                    เข้าสู่ระบบ
                </button>
            </div>
        <?php
                    } ?>
        </nav>
    </header>
    <!-- Login Modal -->
    <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="loginModal" tabindex="-1" aria-labelledby="loginModalTitle" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="loginModalTitle">
                        เข้าสู่ระบบ
                    </h5>
                    <!--Close button-->
                    <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!--Modal body-->
                <div class="relative p-4">
                    <form action="./../../backend/account/read_user.php" method="post">
                        <!--E-mail input-->
                        <div class="relative mb-5" data-te-input-wrapper-init>
                            <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="credential" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email" title='ต้องเป็นอีเมล หรือ หมายเลขโทรศัพท์' required />
                            <label for="loginEmail" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">อีเมลหรือหมายเลขโทรศัพท์</label>
                        </div>

                        <!--Password input-->
                        <div class="relative mb-2" data-te-input-wrapper-init>
                            <input type="password" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="passwd" id="loginPassword" placeholder="Password" title='ต้องมีความยาว 8 ตัวอักษรขึ้นไป' required />
                            <label for="loginPassword" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">รหัสผ่าน</label>
                        </div>

                        <!--Checkbox-->
                        <div class="mb-6 block min-h-[1.5rem] pl-[1.5rem]">
                            <input class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" type="checkbox" value="1" id="token" name="token" />
                            <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="token">
                                จดจำบัญชีนี้ไว้
                            </label>
                        </div>

                        <!--Submit button-->
                        <button type="submit" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                            เข้าสู่ระบบ
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="regisModal" tabindex="-1" aria-labelledby="regisConfirmPassTitle" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="loginModalTitle">
                        สมัครสมาชิก
                    </h5>
                    <!--Close button-->
                    <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!--Modal body-->
                <div class="relative p-4">
                    <form action="./../../backend/account/create_user.php" method="post">
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Name input-->
                            <div class="relative mb-6" data-te-input-wrapper-init>
                                <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="name" id="regisName" aria-describedby="nameHelp" placeholder="Enter Name" pattern=".{4,}" title='ต้องมีอักษร 4 ตัวขึ้นไป' required />
                                <label for="regisName" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อผู้ใช้</label>
                                </label>
                            </div>

                            <!-- Email input-->
                            <div class="relative mb-6" data-te-input-wrapper-init>
                                <input type="email" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="email" id="regisEmail" aria-describedby="emailHelp" placeholder="Enter email" title='ต้องเป็นอีเมลแอดเดรส' required />
                                <label for="regisEmail" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">อีเมล</label>
                                </label>
                            </div>
                        </div>

                        <!--PhoneNumber input-->
                        <div class="relative mb-5" data-te-input-wrapper-init>
                            <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="phone" id="regisPhone" aria-describedby="Phone Help" placeholder="Enter Phonenumber" pattern="0[0-9]{9}" title='ต้องมีเลข 0 อยู่ข้างหน้า และมี 10 ตัว' required />
                            <label for="regisPhone" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">หมายเลขโทรศัพท์</label>
                        </div>


                        <!--Password input-->
                        <div class="relative mb-5" data-te-input-wrapper-init>
                            <input type="password" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="passwd" id="regisPass" placeholder="Password" pattern=".{8,}" title='ต้องมีความยาว 8 ตัวอักษรขึ้นไป' required />
                            <label for="regisPass" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">รหัสผ่าน</label>
                        </div>

                        <!--Confirm Password input-->
                        <div class="relative mb-5" data-te-input-wrapper-init>
                            <input type="password" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="confirmPasswd" id="regisConfirmPass" placeholder="Confirm Password" pattern=".{8,}" title='กรุณาใส่รหัสผ่านอีกครั้ง' required />
                            <label for="regisConfirmPass" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ยืนยันรหัสผ่าน</label>
                        </div>

                        <!--Submit button-->
                        <button type="submit" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                            สมัครสมาชิก
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./../../assets/scripts/sweetalert.js"></script>
    <?php
    if (isset($_SESSION['result'])) { ?>
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

            <?php if ($fire)
                unset($_SESSION['result']) ?>
        </script>
    <?php
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./../../assets/scripts/sweetalert.js"></script>


    <?php
    if (isset($_SESSION['memberName'])) { ?>
        <span class="my-5">
            <div class="rounded-lg border dark:border-neutral-600 mt-7">
                <div class="p-4">
                    <div class="sm:flex sm:items-start">
                        <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto pl-0" id="bannerSel" role="tablist" data-te-nav-ref="">
                            <!-- Selector -->
                            <li role="presentation" class="flex-grow text-center">
                                <a href="#allCoupon" class="my-2 block px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:bg-gray-100 data-[te-nav-active]:text-primary data-[te-nav-active]:border-b-2 border-primary dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700" data-te-toggle="pill" data-te-target="#allCoupon" data-te-nav-active role="tab" aria-controls="allCoupon" aria-selected="true">All</a>
                            </li>
                        </ul>
                        <!-- Coupon Container -->
                        <div class="my-2 grow" id="contentHolder">
                            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="allCoupon" role="tab" aria-labelledby="allCoupon" data-te-tab-active="">
                                <div class="flex flex-wrap justify-center items-center max-w-[110rem]" id="allCouponContainer">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </span>

    <?php
    } else { ?>

        <script>
            Warning.fire({
                icon: "warning",
                title: "คำเตือน",
                text: "คุณยังไม่ได้เข้าสู่ระบบ"
            });
        </script>
    <?php
    } ?>
    <script>
        fetch("./../../backend/database/customer.php?case=mycoupon").then(e => e.json()).then(payload => {
            selectorContainer = document.getElementById('bannerSel');
            contentContainer = document.getElementById('contentHolder');
            allContainer = document.getElementById('allCouponContainer');
            // console.log(payload);
            category = []
            payload.forEach(couponObj => {
                if (!category.includes(couponObj['name'])) {
                    //Rendering tabs for each new category
                    category.push(couponObj['name']);
                    selList = document.createElement('li');
                    selList.setAttribute('role', 'presentation');
                    selList.className = 'flex-grow text-center'

                    selector = document.createElement('a');
                    selector.className = "my-2 block border-x-0 border-b-2 border-t-0 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                    selector.setAttribute('href', 'tab-' + couponObj['categoryID']);
                    selector.setAttribute('data-te-toggle', 'pill');
                    selector.setAttribute('data-te-target', '#' + 'tab-' + couponObj['categoryID']);
                    selector.setAttribute('role', 'tab');
                    selector.setAttribute('aria-controls', 'tab-' + couponObj['categoryID']);
                    selector.setAttribute('aria-selected', 'false');
                    selector.innerHTML = couponObj['name'];
                    selList.appendChild(selector);
                    selectorContainer.appendChild(selList);

                    contentBody = document.createElement('div');
                    contentBody.className = "hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block";
                    contentBody.id = 'tab-' + couponObj['categoryID'];
                    contentBody.setAttribute('role', 'tabpanel');
                    contentBody.setAttribute('aria-labelledby', 'tab-' + couponObj['categoryID']);

                    couponHolder = document.createElement('div');
                    couponHolder.className = "flex flex-wrap justify-center items-center max-w-[110rem]"
                    couponHolder.id = 'tab-' + couponObj['categoryID'] + '-holder';
                    contentBody.appendChild(couponHolder);
                    contentContainer.appendChild(contentBody);
                }
                //Redering coupon card
                currentHolder = document.getElementById('tab-' + couponObj['categoryID'] + '-holder');

                card = document.createElement('div');
                card.className = "my-3 mx-1 block max-w-[19rem] rounded-lg bg-white text-center shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"


                imageSection = document.createElement('div')
                imageSection.className = "relative overflow-hidden bg-cover bg-no-repeat"
                imageSection.setAttribute('data-te-ripple-init', '');
                imageSection.setAttribute('data-te-ripple-color', 'light');

                imagePart = document.createElement('img');
                imagePart.className = "rounded-t-lg"
                imagePart.setAttribute('src', './../../assets/images/menus/' + couponObj['image'])
                imagePart.setAttribute('alt', 'picture_of_' + couponObj['menuName'])

                imageFunction = document.createElement('a');
                imageFunction.setAttribute('href', '#!');
                imageFunctionIn = document.createElement('div');
                imageFunctionIn.className = "absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100";

                info = document.createElement('div');
                info.className = 'p-6'

                title = document.createElement('h5');
                title.className = "mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50"
                title.innerHTML = couponObj['menuName']

                des = document.createElement('p');
                des.className = "mb-4 text-base text-neutral-600 dark:text-neutral-200"
                des.innerHTML = "คูปองส่วนลด " + couponObj['discount'] * 100 + " %"

                button = document.createElement("button");
                button.setAttribute('type', 'button');
                button.className = "inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                button.setAttribute('data-te-ripple-init', '');
                button.setAttribute('data-te-ripple-color', 'light');
                button.setAttribute('onclick', 'showCode(\'' + couponObj['expire'] + '\', \'' + couponObj['code'] + '\')');
                button.innerHTML = "แสดงรหัสคูปอง"

                imageSection.appendChild(imagePart);
                imageSection.appendChild(imageFunction);
                imageFunction.appendChild(imageFunctionIn);
                card.appendChild(imageSection);
                info.appendChild(title);
                info.appendChild(des);
                info.appendChild(button);
                card.appendChild(info);
                allContainer.appendChild(card.cloneNode(true));
                currentHolder.appendChild(card);
            });
        });

        function showCode(expire, code) {
            Code.fire({
                title: "<div class='font-bold text-xl text-center'>รหัสส่วนลดของคุณ<div>",
                html: "<div class='border border-sky-500 text-center'>" + code + "</div>"
            });
        }
    </script>
    <?php
    include("./../../assets/scripts/tw_element.php") ?>

</body>

</html>