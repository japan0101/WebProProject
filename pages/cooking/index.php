<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start(); ?>

    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tailwind.php") ?>

</head>

<body>
    <?php

    $isAuth = isset($_SESSION['userID']);
    if (!$isAuth) { ?>
        echo '
        <div class="relative mb-5" data-te-input-wrapper-init>
            <input type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="credential" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email" />
            <label for="loginEmail" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">หมายเลขโทรศัพท์</label>
        </div>

        <!--Password input-->
        <div class="relative mb-2" data-te-input-wrapper-init>
            <input type="password" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" name="passwd" id="loginPassword" placeholder="Password" />
            <label for="loginPassword" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">รหัสผ่าน</label>
        </div>

        <!--Checkbox-->
        <div class="mb-6 block min-h-[1.5rem] pl-[1.5rem]">
            <input class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[""]
        checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute
        checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem]
        checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0
        checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent
        checked:after:content-[""] hover:cursor-pointer hover:before:opacity-[0.04]
        hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s]
        focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)]
        focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1]
        focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem]
        focus:after:content-[""] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]
        checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px
        checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem]
        checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem]
        checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid
        checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600
        dark:checked:border-primary dark:checked:bg-primary
        dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)]
        dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" type="checkbox" value="1" id="token" name="token" />
            <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault">
                จดจำบัญชีนี้ไว้
            </label>
        </div>';
    <?php
    }
    if ($isAuth && ($_SESSION['role'] == "STAFF" || $_SESSION['role'] == "MANAGER")) { ?>
        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
        <!--Tabs navigation-->
        <ul class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0" role="tablist" data-te-nav-ref>
            <li role="presentation">
                <a href="#tabs-home" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-home" data-te-nav-active role="tab" aria-controls="tabs-home" aria-selected="true">ห้องครัว</a>
            </li>
            <li role="presentation">
                <a href="#tabs-profile" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-profile" role="tab" aria-controls="tabs-profile" aria-selected="false">พนักงานเสิร์ฟ</a>
            </li>
        </ul>

        <!--Tabs content-->
        <div class="mb-6">
            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab" data-te-tab-active>
                <p class="text-5xl mb-2 bold">จำนวนออเดอร์</p>
                <div class="flex flex-row overflow-x-auto">
                    <!-- Order element -->
                    <?php
                    $order_id = 0;
                    // Loop through list of orders
                    ?>
                    <div class="w-1/4 border bg-gray m-1 px-1 flex-none">
                        <p class="text-2xl">จากโต๊ะที่: <?php $order_table ?></p>
                        <p class="text-2xl">รายการอาหารที่สั่ง: </p>
                        <hr>
                        <div class="max-h-96 overflow-y-auto menu-content px-3">
                            <div class="menu-content overflow-y-auto">
                                <?php // Loop through each menu item in this order 
                                ?> 
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 1</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 2</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 3</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 4</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 5</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 6</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 7</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 8</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 9</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 10</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 11</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 12</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 13</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 14</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 15</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 16</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 17</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 18</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 19</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 20</p>
                                </div>
                                <!-- Add more menu items here -->
                            </div>
                            <!-- More menu items -->
                        </div>
                        <hr>
                        <div class="flex justify-center p-1">
                            <button class="text-xl flex bg-green-400 rounded-md" name="<?php echo $order_id; ?>">
                                <svg fill="#000000" width="32px" height="32px" viewBox="-2.4 -2.4 28.80 28.80" id="check-mark-square-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line place-self-center" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <polyline id="primary" points="21 5 12 14 8 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                                        <path id="primary-2" data-name="primary" d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                    </g>
                                </svg>
                                <p class="text-center">Done</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
            <div class="flex flex-row overflow-x-auto">
                    <!-- Order element -->
                    <?php
                    $order_id = 0;
                    // Loop through list of orders
                    ?>
                    <div class="w-1/4 border bg-gray m-1 px-1 flex-none">
                        <p class="text-2xl">จากโต๊ะที่: <?php $order_table ?></p>
                        <p class="text-2xl">รายการอาหารที่สั่ง: </p>
                        <hr>
                        <div class="max-h-96 overflow-y-auto menu-content px-3">
                            <div class="menu-content overflow-y-auto">
                                <?php // Loop through each menu item in this order 
                                ?> 
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 1</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 2</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 3</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 4</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 5</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 6</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 7</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 8</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 9</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 10</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 11</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 12</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 13</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 14</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 15</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 16</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 17</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 18</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 19</p>
                                </div>
                                <div class="snap-start mt-3">
                                    <p class="text-xl">Menu item 20</p>
                                </div>
                                <!-- Add more menu items here -->
                            </div>
                            <!-- More menu items -->
                        </div>
                        <hr>
                        <div class="flex justify-center p-1">
                            <button class="text-xl flex bg-green-400 rounded-md" name="<?php echo $order_id; ?>">
                                <svg fill="#000000" width="32px" height="32px" viewBox="-2.4 -2.4 28.80 28.80" id="check-mark-square-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line place-self-center" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <polyline id="primary" points="21 5 12 14 8 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                                        <path id="primary-2" data-name="primary" d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                    </g>
                                </svg>
                                <p class="text-center">Done</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>
    <script>
        import {
            Tab,
            initTE,
        } from "tw-elements";

        initTE({
            Tab
        });
    </script>
</body>

</html>