<?php
session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laew Tae App</title>
    <link rel="icon" type="image/x-icon" href="./../../assets/icon/favicon.svg">

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
                        <img src="./../../#navbarSupportedContent1assets/icon/favicon.svg" class="h-8" alt="" loading="lazy" />
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


    <?php
    if (isset($_SESSION['memberName'])) { ?>
        <span class="my-5">
            <div class="rounded-lg border dark:border-neutral-600 mt-7">
                <div class="p-4">
                    <div class="sm:flex sm:items-start">
                        <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto pl-0 sm:overflow-y-suto max-h-64" id="bannerSel" role="tablist" data-te-nav-ref>
                            <!-- Selector -->
                            <li role="presentation" class="flex-grow text-center">
                                <a href="#tabs-home03" class="my-2 block border-x-0 data-[te-nav-active]:border-b-2 border-t-0  px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-home03" data-te-nav-active role="tab" aria-controls="tabs-home03" aria-selected="true">แต้มของคุณ</a>
                            </li>

                        </ul>
                        <!-- Banner Showcase -->
                        <div class="my-2 grow" id="contentHolder">

                            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-home03" role="tab" aria-labelledby="tabs-home-tab03" data-te-tab-active="">
                                <div class="flex justify-center items-center text-2xl font-bold">
                                    คุณมีแต้มอยู่
                                </div>
                                <div class="text-xl flex justify-center items-center">
                                    <input type="text" class="text-center my-3 peer block min-h-[auto] w-1/4 rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="phoneNumber" value="<?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                echo $_SESSION['points'] ?>">

                                </div>
                                <div class="text-xl flex justify-center items-center">แต้ม</div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </span>
        <button type="button" class="hidden inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#gachaId" data-te-ripple-init data-te-ripple-color="light">
            Top Left
        </button>

        <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="gachaId" tabindex="-1" aria-labelledby="gachaIdLabel" aria-hidden="true">
            <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">

                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="gachaIdLabel">
                            ตารางความหน้าจะเป็นของ {gacha.gachaName}
                        </h5>

                        <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>

                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-x-hidden">
                                        <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500 max-h-72 overscroll-contain overflow-y-auto">
                                            <thead class="border-b font-medium dark:border-neutral-500">
                                                <tr>
                                                    <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                                        #
                                                    </th>
                                                    <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                                        ระดับ
                                                    </th>
                                                    <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                                        ชื่อเมนู
                                                    </th>
                                                    <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                                        ส่วนลด
                                                    </th>
                                                    <th scope="col" class="px-6 py-4">
                                                        เปอร์เซ็นต์
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_body_gachaId">

                                                <tr class="border-b dark:border-neutral-500">
                                                    <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                        {gacha.gachaID}
                                                    </td>
                                                    <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                        {gacha.rarity}
                                                    </td>
                                                    <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                        {gacha.menuName}
                                                    </td>
                                                    <td class="whitespace-nowrap border-r px-6 py-4">
                                                        {gacha.rarity}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {%%%}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <form action="./../../backend/database/customer.php" method="post" id="getCoupon">
            <input type="hidden" name="case" value="generateCoupon">
        </form>
        <script>
            fetch("./../../backend/database/customer.php?case=banner").then(e => e.json()).then(payload => {
                selectorContainer = document.getElementById('bannerSel');
                contentContainer = document.getElementById('contentHolder');
                payload.forEach(bannerObj => {
                    selList = document.createElement('li');
                    selList.setAttribute('role', 'presentation');
                    selList.className = 'flex-grow text-center'

                    selector = document.createElement('a');
                    selector.className = "my-2 block border-x-0 data-[te-nav-active]:border-b-2 border-t-0  px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                    selector.setAttribute('href', bannerObj['name'].concat('-tab'));
                    selector.setAttribute('data-te-toggle', 'pill');
                    selector.setAttribute('data-te-target', '#' + 'tab-' + bannerObj['gachaID']);
                    selector.setAttribute('role', 'tab');
                    selector.setAttribute('aria-controls', 'tab-' + bannerObj['gachaID']);
                    selector.setAttribute('aria-selected', 'true');
                    selector.innerHTML = bannerObj['name']
                    selList.appendChild(selector);
                    selectorContainer.appendChild(selList);

                    contentBody = document.createElement('div');
                    contentBody.className = "hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block";
                    contentBody.id = 'tab-' + bannerObj['gachaID'];
                    contentBody.setAttribute('role', 'tabpanel');
                    contentBody.setAttribute('aria-labelledby', 'tab-' + bannerObj['gachaID']);

                    titleNode = document.createElement('div');
                    titleNode.className = "flex justify-center items-center text-2xl font-bold";
                    titleNode.innerHTML = bannerObj['name'];
                    contentBody.appendChild(titleNode);

                    imageNode = document.createElement('div');
                    imageNode.className = "flex justify-center items-center"
                    image = '';
                    imageNode.innerHTML = `<img src="${image}">`
                    contentBody.appendChild(imageNode);

                    desNode = document.createElement('div')
                    desNode.className = 'text-xl flex justify-center items-center text-center';
                    desNode.innerHTML = bannerObj['description'] + '<br>ใช้แต้ม: ' + bannerObj['cost']
                    contentBody.appendChild(desNode)

                    buttonsNode = document.createElement('div');
                    buttonsNode.className = "flex justify-center items-center"

                    randButton = document.createElement('button');
                    randButton.setAttribute('type', 'button');
                    randButton.className = "inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    randButton.setAttribute("data-te-ripple-init", "");
                    randButton.setAttribute('onclick', 'randomCoupon(' + bannerObj['gachaID'] + ', ' + bannerObj['cost'] + ')')
                    randButton.innerHTML = "สุ่มบัตรลด"

                    probButton = document.createElement('button');
                    probButton.setAttribute('type', 'button');
                    probButton.className = "inline-block rounded-full border-2 border-dark-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-dark-50 transition duration-150 ease-in-out hover:border-dark-100 hover:bg-dark-500 hover:bg-opacity-10 hover:text-dark-100 focus:border-dark-100 focus:text-dark-100 focus:outline-none focus:ring-0 active:border-dark-200 active:text-dark-200 dark:hover:bg-dark-100 dark:hover:bg-opacity-10"
                    probButton.setAttribute("data-te-ripple-init", "");
                    probButton.setAttribute("data-te-toggle", "modal");
                    probButton.setAttribute("data-te-target", "#prob_" + bannerObj['gachaID']);
                    probButton.innerHTML = "ดูความน่าจะเป็น";

                    buttonsNode.appendChild(randButton);
                    buttonsNode.appendChild(probButton);
                    contentBody.appendChild(buttonsNode);

                    contentContainer.appendChild(contentBody);
                    // --------------------------------------------------------------------------------------------
                    modalContainer1 = document.createElement('div');
                    modalContainer1.setAttribute('data-te-modal-init', '');
                    modalContainer1.className = "fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                    modalContainer1.id = "prob_" + bannerObj['gachaID'];
                    modalContainer1.setAttribute('tabindex', '-1');
                    modalContainer1.setAttribute('aria-labelledby', "prob_" + bannerObj['gachaID'] + "Lable");
                    modalContainer1.setAttribute('aria-hidden', 'true');

                    modalContainer2 = document.createElement('div');
                    modalContainer2.setAttribute('data-te-modal-dialog-ref', '');
                    modalContainer2.className = "pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]";

                    modalContainer3 = document.createElement('div');
                    modalContainer3.className = "min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600";

                    modalTitleCon = document.createElement('div');
                    modalTitleCon.className = "flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50";

                    modalTitle = document.createElement('h5');
                    modalTitle.className = "text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200";
                    modalTitle.id = "prob_" + bannerObj['gachaID'] + "Lable";
                    modalTitle.innerHTML = "ตารางความน่าจะเป็นของ " + bannerObj['name'];

                    exitModalBtn = document.createElement("button");
                    exitModalBtn.setAttribute('type', 'button');
                    exitModalBtn.className = "box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none";
                    exitModalBtn.setAttribute('data-te-modal-dismiss', '');
                    exitModalBtn.setAttribute('aria-label', 'Close');
                    exitModalBtn.innerHTML = `              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>`

                    modalBodyCon1 = document.createElement('div');
                    modalBodyCon1.className = "relative flex-auto p-4"
                    modalBodyCon1.setAttribute("data-te-modal-body-ref", '');

                    modalBodyCon2 = document.createElement('div');
                    modalBodyCon2.className = "flex flex-col";

                    modalBodyCon3 = document.createElement('div');
                    modalBodyCon3.className = "overflow-x-auto sm:-mx-6 lg:-mx-8";

                    modalBodyCon4 = document.createElement('div');
                    modalBodyCon4.className = "inline-block min-w-full py-2 sm:px-6 lg:px-8";

                    modalBodyCon5 = document.createElement('div');
                    modalBodyCon5.className = "overflow-x-hidden"

                    rates = document.createElement('div')
                    rates.className = "text-center"
                    rates.innerHTML = "โอกาศที่จะได้คูปองส่วนลด<br>ระดับ Common คือ 70%<br>ระดับ Uncommon คือ 15%<br>ระดับ Rare คือ 11%<br>ระดับ Epic คือ 3.4%<br>ระดับ Legendary คือ 0.5%<br>ระดับ Mythic คือ 0.01%<br>"


                    table = document.createElement("table");
                    table.className = "min-w-full border text-center text-sm font-light dark:border-neutral-500 max-h-72 overscroll-contain overflow-y-auto"

                    tableHead = document.createElement("thead");
                    tableHead.className = "border-b font-medium dark:border-neutral-500";

                    headRow = document.createElement("tr");

                    headId = document.createElement("th");
                    headId.setAttribute('scope', 'col');
                    headId.className = "border-r px-6 py-4 dark:border-neutral-500";
                    headId.innerHTML = "#"

                    headRa = document.createElement("th");
                    headRa.setAttribute('scope', 'col');
                    headRa.className = "border-r px-6 py-4 dark:border-neutral-500";
                    headRa.innerHTML = "ระดับ"

                    headMe = document.createElement("th");
                    headMe.setAttribute('scope', 'col');
                    headMe.className = "border-r px-6 py-4 dark:border-neutral-500";
                    headMe.innerHTML = "ชื่อเมนู"

                    headDi = document.createElement("th");
                    headDi.setAttribute('scope', 'col');
                    headDi.className = "px-6 py-4";
                    headDi.innerHTML = "ส่วนลด"

                    tableBody = document.createElement('tbody');
                    tableBody.id = "table_body_" + bannerObj['gachaID']

                    modalContainer1.appendChild(modalContainer2);
                    modalContainer2.appendChild(modalContainer3);
                    modalContainer3.appendChild(modalTitleCon);
                    modalTitleCon.appendChild(modalTitle);
                    modalTitleCon.appendChild(exitModalBtn);
                    modalContainer3.appendChild(modalBodyCon1);
                    modalBodyCon1.appendChild(modalBodyCon2);
                    modalBodyCon2.appendChild(modalBodyCon3);
                    modalBodyCon3.appendChild(modalBodyCon4);
                    modalBodyCon4.appendChild(modalBodyCon5);
                    modalBodyCon5.appendChild(rates);
                    modalBodyCon5.appendChild(table);
                    table.appendChild(tableHead);
                    tableHead.appendChild(headRow);
                    headRow.appendChild(headId);
                    headRow.appendChild(headRa);
                    headRow.appendChild(headMe);
                    headRow.appendChild(headDi);
                    table.appendChild(tableBody);
                    document.body.appendChild(modalContainer1)
                });
                fetch("./../../backend/database/customer.php?case=getrate").then(e => e.json()).then(payload => {
                    payload.forEach(itemObj => {
                        table = document.getElementById("table_body_" + itemObj['gachaID']);

                        row = document.createElement('tr');
                        row.className = "border-b dark:border-neutral-500"

                        idData = document.createElement('td');
                        idData.className = "whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500"
                        idData.innerHTML = itemObj['gachaID']

                        rareData = document.createElement('td');
                        rareData.className = "whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500"
                        rareData.innerHTML = itemObj['rarity']

                        nameData = document.createElement('td');
                        nameData.className = "whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500"
                        nameData.innerHTML = itemObj['menuName']

                        discountData = document.createElement('td');
                        discountData.className = "whitespace-nowrap px-6 py-4"
                        discountData.innerHTML = itemObj['discount'] * 100 + "%"

                        row.appendChild(idData);
                        row.appendChild(rareData);
                        row.appendChild(nameData);
                        row.appendChild(discountData);
                        table.appendChild(row);
                    });
                });
            });

            function randomRarity() {
                number = Math.random();
                if (number < 1 && number > 0.3) {
                    return 'COMMON'
                } else if (number > 0.15) {
                    return 'UNCOMMON';
                } else if (number > 0.04) {
                    return 'RARE';
                } else if (number > 0.006) {
                    return 'EPIC';
                } else if (number > 0.001) {
                    return 'LEGENDARY';
                } else {
                    return 'MYTHIC';
                }
            }

            function randomCoupon(banner_id, cost) {
                if (<?php echo $_SESSION['points'] ?> >=
                    cost
                ) {
                    rarity = randomRarity();
                    Swal.fire({
                        title: "คุณต้องการสุ่มจริงหรือ",
                        text: "แลกแต้ม " + cost + " แต้มเพื่อสุ่มหรือไม่ *คูปองจะมีอายุใช้งาน1ปี*",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "ยืนยัน",
                        showDenyButton: true,
                        denyButtonText: "ยกเลิก",
                        allowOutsideClick: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "คุณได้รับ",
                                text: "คูปองระดับ " + rarity,
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "เปิดดู",
                                allowOutsideClick: false
                            }).then((result) => {
                                Swal.fire({
                                    title: "คุณได้รับ",
                                    text: "คูปองระดับ " + rarity,
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "เปิดดู",
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        fetch("./../../backend/database/customer.php?case=getgachaitem&banner_id=" + banner_id + "&rarity='" + rarity + "'").then(e => e.json()).then(payload => {
                                            recieved = payload[Math.floor(Math.random() * payload.length)];
                                            Swal.fire({
                                                title: "คูปองของคุณ",
                                                text: "ใช้ลดราคา " + recieved['menuName'] + " " + recieved['discount'] * 100 + " %",
                                                icon: "info",
                                                confirmButtonColor: "#3085d6",
                                                confirmButtonText: "รับคูปอง",
                                                allowOutsideClick: false
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    const form = document.getElementById('getCoupon');
                                                    let disc = document.createElement("input")
                                                    disc.name = "discount"
                                                    disc.value = recieved['discount']
                                                    disc.className = "hidden"
                                                    let menu = document.createElement("input")
                                                    menu.name = "menuID"
                                                    menu.value = recieved['menuID']
                                                    menu.className = "hidden"
                                                    let costInput = document.createElement("input")
                                                    costInput.name = "cost"
                                                    costInput.value = cost
                                                    costInput.className = "hidden"
                                                    form.append(disc)
                                                    form.append(menu)
                                                    form.append(costInput)
                                                    form.submit()
                                                }
                                            })
                                        });
                                    }
                                });
                            })
                        }
                    })
                }
            }
        </script>
        <?php
        if (isset($_SESSION['result'])) { ?>
            <script>
                <?php $fire = false; ?>
                <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "generateCoupon")) { ?>
                    Toast.fire({
                        icon: "success",
                        title: "<?php echo $_SESSION['result']['message']; ?>",
                    });
                    <?php $fire = true; ?>

                <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "generateCoupon")) { ?>
                    Toast.fire({
                        icon: "error",
                        title: "<?php echo $_SESSION['result']['message']; ?>",
                    })
                <?php $fire = true;
                } ?>

                <?php if ($fire)
                    unset($_SESSION['result']); ?>
            </script>
        <?php
        } ?>
    <?php
    } else { ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="./../../assets/scripts/sweetalert.js"></script>
        <script>
            Warning.fire({
                icon: "warning",
                title: "คำเตือน",
                text: "คุณยังไม่ได้เข้าสู่ระบบ"
            });
        </script>


    <?php
    } ?>
    <?php
    include("./../../assets/scripts/tw_element.php") ?>

</body>

</html>