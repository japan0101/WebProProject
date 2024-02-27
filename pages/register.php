<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laew Tae App</title>

    <link rel="stylesheet" href="/assets/stylesheets/account.css">
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/script/tailwind.php") ?>
</head>

<body class="m-auto lg:w-3/4 md:3/4 sm:h-4/5 grey-background">
<section class="h-full h-screen flex flex-col self-center">
    <div class="account-container">
        <!-- Left column container with background-->
        <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
            <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                <img src="/assets/images/account/draw2.webp"
                     class="w-full" alt="Sample image"/>
            </div>

            <!-- Right column container -->
            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">

                <form action="./../backend/account/create_user.php" method="post" id="formSignup">

                    <div class="flex flex-col">
                        <div class="flex flex-row gap-3">
                            <!-- Username input -->
                            <div class="relative mb-6 flex-1" id="userInput" data-te-input-wrapper-init>
                                <input type="text" pattern=".{4,}" name="name"
                                       class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                       id="name" placeholder="ชื่อผู้ใช้" title='ต้องมีอักษร 4 ตัวขึ้นไป' required/>
                                <label for="name"
                                       class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อผู้ใช้
                                </label>
                            </div>

                            <!-- Email input -->
                            <div class="relative mb-6 flex-1" id="emailInput" data-te-input-wrapper-init>
                                <input type="email" name="email"
                                       class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                       id="email" placeholder="อีเมล" title='ต้องเป็นอีเมลแอดเดรส'/>
                                <label for="email"
                                       class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">อีเมล
                                </label>
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="relative mb-6" id="passwdInput" data-te-input-wrapper-init>
                            <input type="password" name="passwd"
                                   class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                   id="password" placeholder="รหัสผ่าน" pattern=".{8,}"
                                   title='ต้องมีความยาว 8 ตัวอักษรขึ้นไป' required/>
                            <label for="password"
                                   class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">รหัสผ่าน
                            </label>
                        </div>

                        <!-- Phone input -->
                        <div class="relative mb-6" id="phoneInput" data-te-input-wrapper-init>
                            <input type="text" name="phone" pattern="0[0-9]{9}"
                                   class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                   id="phone" placeholder="หมายเลขโทรศัพท์"
                                   title='ต้องมีเลข 0 อยู่ข้างหน้า และมี 10 ตัว' required/>
                            <label for="phone"
                                   class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">หมายเลขโทรศัพท์
                            </label>
                        </div>

                        <!-- Register button -->
                        <div class="flex flex-row justify-between text-center lg:text-left">

                            <!-- Login link -->
                            <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
                                มีบัญชีใช่ไหม ?
                                <a href="login.php"
                                   class="text-sky-600 transition duration-150 ease-in-out hover:text-sky-700 focus:text-sky-600 active:text-sky-700">เข้าสู่ระบบ</a>
                            </p>
                            <button id="signup"
                                    class="inline-block px-7 pb-2.5 pt-3 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-ripple-init data-te-ripple-color="light">
                                สมัครสมาชิก
                            </button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/script/tw_element.php") ?>

</body>

</html>