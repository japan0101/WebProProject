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

    <span class="my-5">
        <div class="rounded-lg border dark:border-neutral-600">
            <div class="p-4">
                <div class="sm:flex sm:items-start">
                    <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto sm:flex-wrap pl-0" role="tablist" data-te-nav-ref="">
                        <!-- Selector -->
                        <li role="presentation" class="flex-grow text-center">
                            <a href="#tabs-details" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-details" data-te-nav-active="" role="tab" aria-controls="tabs-details" aria-selected="true"
                            >ข้อมูล</a>
                        </li>
                        <li role="presentation" class="flex-grow text-center">
                            <a href="#tabs-edit" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-edit" role="tab" aria-controls="tabs-edit" aria-selected="false"
                            >แก้ไขข้อมูล</a>
                        </li>
                        <li role="presentation" class="flex-grow text-center">
                            <a href="#tabs-changePass" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-changePass" role="tab" aria-controls="tabs-changePass" aria-selected="false"
                            >เปลี่ยนรหัสผ่าน</a>
                        </li>
                        <li role="presentation" class="flex-grow text-center">
                            <a href="#tabs-delete" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-delete" role="tab" aria-controls="tabs-delete" aria-selected="false"
                            >ลบสมาชิก</a>
                        </li>
                    </ul>
                    <!-- Banner Showcase -->
                    <div class="my-2">
                        <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-details" role="tabpanel" aria-labelledby="tabs-detail-tab" data-te-tab-active="">
                            Show detail
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-edit" role="tabpanel" aria-labelledby="tabs-edit-tab">
                            Change detail
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-changePass" role="tabpanel" aria-labelledby="tabs-changePass-tab">
                            Change Password
                        </div>
                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-delete" role="tabpanel" aria-labelledby="tabs-delete-tab">
                            Delete Account
                        </div>
                    </div>
                </div>

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
