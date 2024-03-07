<?php
session_start();
if (isset($_COOKIE['token']) && !isset($_SESSION['memberName']))
    header("Location: ./backend/account/read_user.php");
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "STAFF")
        header("Location: ./pages/staff");
    if ($_SESSION['role'] == "MANAGER")
        header("Location: ./pages/manager");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="./assets/icon/favicon.svg">

    <title>Laew Tae App</title>

    <?php
    include("./assets/scripts/tailwind.php") ?>

    <link rel="stylesheet" href="./assets/stylesheets/developers.css">
    <link rel="stylesheet" href="./assets/stylesheets/navbar.css">
    <link rel="stylesheet" href="./assets/stylesheets/global.css">
</head>

<body class="antialiased">

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
                    <a class="mb-4 ml-2 mr-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0" href="./">
                        <img src="./assets/icon/favicon.svg" class="h-8" alt="" loading="lazy" />
                    </a>
                    <?php
                    $isAuth = isset($_SESSION['memberName']);
                    if ($isAuth) { ?>
                        <!-- Left navigation links -->
                        <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <!-- Home -->
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400" href="./" data-te-nav-link-ref>หน้าหลัก</a>
                            </li>
                            <!-- Redeem Points -->
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="./pages/shop/" data-te-nav-link-ref>แลกแต้ม</a>
                            </li>
                            <!-- Banner -->
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="./pages/banner/" data-te-nav-link-ref>กล่องสุ่ม</a>
                            </li>
                            <!-- Stash -->
                            <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                                <a class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" href="./pages/couponStash/" data-te-nav-link-ref>คูปองของฉัน</a>
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
                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="./pages/profile" data-te-dropdown-item-ref>ข้อมูลผู้ใช้</a>
                        </li>
                        <li>
                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30" href="./backend/account/logout_user.php" data-te-dropdown-item-ref>ออกจากระบบ</a>
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
                    <form action="./backend/account/read_user.php" method="post">
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
                    <form action="./backend/account/create_user.php" method="post">
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
    <script src="./assets/scripts/sweetalert.js"></script>
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


    <!-- Jumbotron -->
    <main>
        <div data-te-animation-init data-te-animation-start="onLoad" data-te-animation-reset="true" data-te-animation="[fade-in-down_1s_ease-out]" class="relative mb-16 flex items-center justify-center bg-gray-50 py-16 sm:py-24 lg:py-32">
            <div class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-600 dark:from-neutral-700 dark:to-neutral-800" aria-hidden="true"></div>
            <div class="relative px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-4xl text-center text-lg">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl">
                        <span class="mb-6 block text-6xl">ร้านอาหารแล้วแต่แอป</span>
                        <span class="block text-3xl">ยินดีต้อนรับ</span>
                    </h1>

                    <?php
                    if (!isset($_SESSION['memberName'])) { ?>
                        <p class="mb-6 mt-6 max-w-3xl text-xl text-teal-50">
                            สะสมแต้ม แลกส่วนลดด้วยแต้ม ลุ้นรับส่วนลดพิเศษ
                        </p>
                        <button type="button" class="inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-toggle="modal" data-te-target="#regisModal">
                            สมัครสมาชิก
                        </button>
                        <button type="button" class="inline-block rounded-full border-2 border-neutral-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10" data-te-ripple-init data-te-toggle="modal" data-te-target="#loginModal">
                            เข้าสู่ระบบ
                        </button>
                    <?php
                    } else { ?>
                        <p class="mt-6 max-w-3xl text-xl text-teal-50">
                            <span class="block text-3xl"><?php
                                                            echo $_SESSION['memberName'] ?></span>
                            <span class="block text-2xl"><?php
                                                            echo 'คุณมีแต้มอยู่: ' . $_SESSION['points'] . ' แต้ม' ?></span>
                        </p>
                    <?php
                    } ?>
                </div>
            </div>
        </div>

        <section class="body_container">
            <section id="developers">
                <h1 class="headline text-center">Functional</h1>
                <div id="mark" class="dev-box mt-6 flex flex-row-re container_rounded bg-white justify-center">
                    <div class="flex flex-col" style="width: 100%">
                        <h1 class="mt-3">แลกแต้ม</h1>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                            nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                            perferendis quasi repellat!
                        </p>
                    </div>
                </div>
                <div id="best" class="dev-box mt-6 flex flex-row container_rounded bg-white justify-center">
                    <div class="flex flex-col" style="width: 100%">
                        <h1 class="mt-3">กล่องสุ่ม</h1>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                            nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                            perferendis quasi repellat!
                        </p>
                    </div>
                </div>
                <div id="japan" class="dev-box mt-6 flex flex-row container_rounded bg-white justify-center">
                    <div class="flex flex-col" style="width: 100%">
                        <h1 class="mt-3">คูปองของฉัน</h1>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                            nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                            perferendis quasi repellat!
                        </p>
                    </div>
                </div>
            </section>
        </section>


        <section class="body_container">
            <section id="developers">
                <h1 class="headline text-center">Developers</h1>
                <div id="mark" class="dev-box mt-6 flex flex-row-re container_rounded bg-white justify-center">
                    <div class="flex flex-col" style="width: 100%">
                        <h3 class="blue-text">65070005 - Mr.Kanokpol Poykham</h3>
                        <h1 class="mt-3">Mark</h1>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                            nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                            perferendis quasi repellat!
                        </p>
                        <div class="flex flex-row gap-3 justify-between mt-5">
                            <div id="mark-facebook" class="flex flex-col social-media-small-box facebook text-white">
                                <img src="./assets/icon/facebook.svg" alt="Facebook">
                                <h5 class="text-white">Facebook</h5>
                            </div>
                            <div id="mark-dis" class="flex flex-col social-media-small-box discord">
                                <img src="./assets/icon/discord.svg" alt="Discord">
                                <h5 class="text-white">Discord</h5>
                            </div>
                            <div id="mark-git" class="flex flex-col social-media-small-box github">
                                <img src="./assets/icon/github.svg" alt="Github">
                                <h5 class="">GitHub</h5>
                            </div>
                            <div id="mark-none" class="flex flex-col social-media-small-box">
                                <img alt="" src="./assets/icon/microsoft-edge.webp">
                                <h5>Something else...</h5>
                            </div>
                        </div>
                    </div>
                    <div class="object-contain flex flex-col self-center" style="width: 90%;">
                        <img alt="" src="./assets/images/developers/mark.webp" width="">
                    </div>
                </div>
                <div id="best" class="dev-box mt-6 flex flex-row container_rounded bg-white justify-center">
                    <div class="flex flex-col" style="width: 100%">
                        <h3 class="blue-text">65070028 - Mr.Kanisorn Somsriagsornsang</h3>
                        <h1 class="mt-3">Best</h1>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                            nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                            perferendis quasi repellat!
                        </p>
                        <div class="flex flex-row gap-3 justify-between mt-5">
                            <div id="best-facebook" class="flex flex-col social-media-small-box facebook text-white">
                                <img src="./assets/icon/facebook.svg" alt="Facebook">
                                <h5 class="text-white">Facebook</h5>
                            </div>
                            <div id="best-dis" class="flex flex-col social-media-small-box discord">
                                <img src="./assets/icon/discord.svg" alt="Discord">
                                <h5 class="text-white">Discord</h5>
                            </div>
                            <div id="best-git" class="flex flex-col social-media-small-box github">
                                <img src="./assets/icon/github.svg" alt="Github">
                                <h5 class="">GitHub</h5>
                            </div>
                            <div id="best-none" class="flex flex-col social-media-small-box">
                                <img alt="" src="./assets/icon/microsoft-edge.webp">
                                <h5>Something else...</h5>
                            </div>
                        </div>
                    </div>
                    <div class="object-contain flex flex-col self-center" style="width: 90%;">
                        <img alt="" src="./assets/images/developers/best.webp" width="">
                    </div>
                </div>
                <div id="japan" class="dev-box mt-6 flex flex-row container_rounded bg-white justify-center">
                    <div class="flex flex-col" style="width: 100%">
                        <h3 class="blue-text">65070064 - Mr.Napat Wetchapun</h3>
                        <h1 class="mt-3">Japan</h1>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                            nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                            perferendis quasi repellat!
                        </p>
                        <div class="flex flex-row gap-3 justify-between mt-5">
                            <div id="japan-facebook" class="flex flex-col social-media-small-box facebook text-white">
                                <img src="./assets/icon/facebook.svg" alt="Facebook">
                                <h5 class="text-white">Facebook</h5>
                            </div>
                            <div id="japan-dis" class="flex flex-col social-media-small-box discord">
                                <img src="./assets/icon/discord.svg" alt="Discord">
                                <h5 class="text-white">Discord</h5>
                            </div>
                            <div id="japan-git" class="flex flex-col social-media-small-box github">
                                <img src="./assets/icon/github.svg" alt="Github">
                                <h5 class="">GitHub</h5>
                            </div>
                            <div id="japan-none" class="flex flex-col social-media-small-box">
                                <img alt="" src="./assets/icon/microsoft-edge.webp">
                                <h5>Something else...</h5>
                            </div>
                        </div>
                    </div>
                    <div class="object-contain flex flex-col self-center" style="width: 90%;">
                        <img alt="" src="./assets/images/developers/Japan.webp" width="">
                    </div>
                </div>
                <div id="tae" class="dev-box mt-6 flex flex-row container_rounded bg-white justify-center">
                    <div class="flex flex-col" style="width: 100%">
                        <h3 class="blue-text">65070089 - Mr.Tanakrit Supprasit</h3>
                        <h1 class="mt-3">Tae</h1>
                        <p class="">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut, ea illo laboriosam nam natus
                            nemo nobis, nulla qui ratione sint tempore voluptatem? Aspernatur consectetur laborum magni
                            perferendis quasi repellat!
                        </p>
                        <div class="flex flex-row gap-3 justify-between mt-5">
                            <div id="tae-facebook" class="flex flex-col social-media-small-box facebook text-white">
                                <img src="./assets/icon/facebook.svg" alt="Facebook">
                                <h5 class="text-white">Facebook</h5>
                            </div>
                            <div id="tae-dis" class="flex flex-col social-media-small-box discord">
                                <img src="./assets/icon/discord.svg" alt="Discord">
                                <h5 class="text-white">Discord</h5>
                            </div>
                            <div id="tae-git" class="flex flex-col social-media-small-box github">
                                <img src="./assets/icon/github.svg" alt="Github">
                                <h5 class="">GitHub</h5>
                            </div>
                            <div id="tae-none" class="flex flex-col social-media-small-box">
                                <img alt="" src="./assets/icon/microsoft-edge.webp">
                                <h5>Something else...</h5>
                            </div>
                        </div>
                    </div>
                    <div class="object-contain flex flex-col self-center" style="width: 90%;">
                        <img alt="" src="./assets/images/developers/tae_prepro.webp" width="">
                    </div>
                </div>
                <script src="./assets/scripts/developer.js"></script>
            </section>
        </section>

    </main>

</body>

<?php
include("./assets/scripts/tw_element.php") ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./assets/scripts/sweetalert.js"></script>
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

</html>