<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LeawTaeApp</title>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tailwind.php") ?>
    </script>

    <script src="main.js"></script>
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/component/nav.php") ?>
<?php if(isset($_SESSION['userID'])) {?>
    <span class="my-5">
        <div class="rounded-lg border dark:border-neutral-600">
            <div class="p-4">
                <div class="sm:flex sm:items-start">
                    <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto sm:flex-wrap pl-0" role="tablist" data-te-nav-ref="">
                        <!-- Selector -->
                        <li role="presentation" class="flex-grow text-center">
                            <a href="#tabs-details" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-details" data-te-nav-active="" role="tab" aria-controls="tabs-details" aria-selected="true">ข้อมูล</a>
                        </li>
                        <li role="presentation" class="flex-grow text-center">
                            <a href="#tabs-edit" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-edit" role="tab" aria-controls="tabs-edit" aria-selected="false">แก้ไขข้อมูล</a>
                        </li>
                        <li role="presentation" class="flex-grow text-center">
                            <a href="#tabs-changePass" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-changePass" role="tab" aria-controls="tabs-changePass" aria-selected="false">เปลี่ยนรหัสผ่าน</a>
                        </li>
                        <li role="presentation" class="flex-grow text-center">
                            <a href="#tabs-delete" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-delete" role="tab" aria-controls="tabs-delete" aria-selected="false">ลบสมาชิก</a>
                        </li>
                    </ul>
                    <!-- Banner Showcase -->
                    <div class="my-2 grow">
                        <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-details" role="tabpanel" aria-labelledby="tabs-detail-tab" data-te-tab-active="">
                            <!-- detail -->
                            <div class="grid grid-cols-2 gap-4">
                                <!--MemberName-->
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                                    id="memberNameDisplay" aria-describedby="Name" placeholder="ชื่อสมาชิก" value="<?php echo $_SESSION['memberName'] ?>" readonly />
                                    <label for="Name" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >ชื่อสมาชิก
                                    </label>
                                </div>

                                <!--Telephone-->
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                                    id="phoneDisplay" aria-describedby="phoneNumber" placeholder="Last name" value="<?php echo $_SESSION['phoneNumber'] ?>" readonly />
                                    <label for="phoneNumber" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >หมายเลขโทรศัพท์
                                    </label>
                                </div>
                            </div>
                            <!--Email-->
                            <div class="relative mb-6" data-te-input-wrapper-init>
                                <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                                id="emailDisplay" aria-describedby="email" placeholder="ชื่อสมาชิก" value="<?php echo $_SESSION['email'] ?>" readonly />
                                <label for="email" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                >อีเมล
                                </label>
                            </div>
                            <!--Points-->
                            <div class="relative mb-6" data-te-input-wrapper-init>
                                <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                                id="pointDisplay" aria-describedby="points" placeholder="ชื่อสมาชิก" value="<?php echo $_SESSION['points'] ?>" readonly />
                                <label for="points" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                >แต้ม
                                </label>
                            </div>
                        </div>

                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-edit" role="tabpanel" aria-labelledby="tabs-edit-tab">
                        <!-- edit -->
                            <form>
                            <div class="grid grid-cols-2 gap-4">
                                    <!--MemberName-->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                                        id="memberName" name="memberName" aria-describedby="Name" placeholder="ชื่อสมาชิก" value="<?php echo $_SESSION['memberName'] ?>" />
                                        <label for="Name" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                        >ชื่อสมาชิก
                                        </label>
                                    </div>

                                    <!--Telephone-->
                                    <div class="relative mb-6" data-te-input-wrapper-init>
                                        <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                                        id="phone" name="phoneNumber" aria-describedby="phoneNumber" placeholder="Last name" value="<?php echo $_SESSION['phoneNumber'] ?>" />
                                        <label for="phoneNumber" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                        >หมายเลขโทรศัพท์
                                        </label>
                                    </div>
                                </div>
                                <!--Email-->
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                                    id="email" name="email" aria-describedby="email" placeholder="ชื่อสมาชิก" value="<?php echo $_SESSION['email'] ?>" />
                                    <label for="email" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >อีเมล
                                    </label>
                                </div>
                                <!--Password-->
                                <div class="relative mb-6" data-te-input-wrapper-init>
                                    <input type="password" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                                    id="passwd" name="passwd" aria-describedby="password" placeholder="ชื่อสมาชิก" />
                                    <label for="password" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >รหัสผ่าน
                                    </label>
                                </div>
                                <button type="submit" class="inline-block rounded bg-primary px-2 pb-2 pt-2 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                    ยืนยัน
                                </button>
                            </form>
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-changePass" role="tabpanel" aria-labelledby="tabs-changePass-tab">
                            Change Password
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-delete" role="tabpanel" aria-labelledby="tabs-delete-tab">
                            Delete Account
                        </div>
                    </div>
                </div>
                <?php } else{?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script src="/asset/script/sweetalert.js"></script>
                    <script>
                        Warning.fire({
                            icon: "warning",
                            title: "คำเตือน",
                            text: "คุณยังไม่ได้เข้าสู่ระบบ"
                        });
                    </script>
                <?php }?>
            </div>
        </div>
    </span>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tw_element.php") ?>
    <script>
        // Initialization for ES Users
        import {
            Animate,
            Input,
            Ripple,
            Collapse,
            Dropdown,
            Tab,
            initTE,
        } from "tw-elements";

        initTE({
            Animate,
            Input,
            Ripple,
            Collapse,
            Dropdown,
            Tab,
        });
    </script>
</body>

</html>
