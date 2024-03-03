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

    $isAuth = isset($_SESSION['memberName']);
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
                <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <p id="kitchen_sum" class="text-5xl my-auto w-fit bold">จำนวนออเดอร์: </p>
                </div>
                <div id="kitchen_order" class="flex flex-row overflow-x-auto block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                </div>
            </div>
            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <p id="order_sum" class="text-5xl my-auto w-fit bold">จำนวนออเดอร์: </p>
                </div>
                <div id="waiter_order" class="flex flex-row overflow-x-auto block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    <!-- Order element -->
                    <?php
                    $order_id = 0;
                    for ($i = 0; $i < 5; $i++) {
                    ?>
                        <div class="w-1/4 border bg-gray m-1 px-1 flex-none">
                            <p class="text-2xl">จากโต๊ะที่: <?php
                                                            $order_table ?></p>
                            <p class="text-2xl">รายการอาหารที่สั่ง: </p>
                            <hr>
                            <div class="max-h-96 overflow-y-auto menu-content px-3">
                                <div class="menu-content overflow-y-auto">
                                    <?php
                                    for ($j = 0; $j < 5; $j++) {
                                    ?>
                                        <div class="snap-start mt-3">
                                            <p class="text-xl">Menu item 1</p>
                                        </div>
                                    <?php
                                    } ?>
                                    <!-- Add more menu items here -->
                                </div>
                                <!-- More menu items -->
                            </div>
                            <hr>
                            <div class="flex justify-center p-1">
                                <button class="inline-block rounded bg-success px-10 pb-1 pt-1 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]" name="<?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo $order_id; ?>">
                                    <svg fill="#000000" width="32px" height="32px" viewBox="-2.4 -2.4 28.80 28.80" id="check-mark-square-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line place-self-center" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <polyline id="primary" points="21 5 12 14 8 10" style="fill: none; stroke: #FFFFFF; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                                            <path id="primary-2" data-name="primary" d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke: #FFFFFF; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                                        </g>
                                    </svg>
                                    <p class="text-center">Done</p>
                                </button>
                            </div>
                        </div>
                    <?php
                    } ?>

                </div>
            </div>
        </div>
    <?php
    } ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>
    <script>
        fetch("/backend/database/staff.php?case=cooking_order").then(e => e.json()).then(payload => {
            order_list = [];
            order_sum = 0;
            payload.forEach(itemObj => {
                order_sum++;
                console.log(itemObj);
                let order_div = document.getElementById('kitchen_order');
                let container = document.createElement('div');
                container.className = "w-1/4 border bg-gray m-1 px-1 flex-none";
                container.innerHTML = '<p class="text-2xl">จากโต๊ะที่: ' + itemObj[0].tableID + '</p><p class="text-2xl">รายการอาหารที่สั่ง: </p><hr>';
                order_div.append(container);
                
                let list_1_container = document.createElement('div');
                list_1_container.innerHTML = "";
                list_1_container.className = "max-h-96 min-h-96 overflow-y-auto menu-content px-3";
                
                let list_2_container = document.createElement('div');
                list_2_container.className = "menu-content overflow-y-auto min-h-96";
                list_2_container.id = "order" + itemObj[0].orderAt;

                list_1_container.append(list_2_container);
                container.append(list_1_container);
                for(menuObj of itemObj){
                    let food_container = document.getElementById('order'+itemObj[0].orderAt);
                    let menu_container = document.createElement('div');
                    menu_container.className = "snap-start mt-3";
                    menu_content = document.createElement("p");
                    menu_content.className = "text-xl";
                    menu_content.append(document.createTextNode('X'+menuObj.amount+" "+menuObj.menuName));
                    console.log(menu_container);
                    menu_container.appendChild(menu_content);
                    
                    food_container.append(menu_container);
                }
                let button_container = document.createElement('div');
                button_container.className = "flex justify-center p-1";
                button_container.innerHTML = '<button class="inline-block rounded bg-success px-10 pb-1 pt-1 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]" name="group" value="'+itemObj[0].orderAt+'">' +
                                    '<svg fill="#000000" width="32px" height="32px" viewBox="-2.4 -2.4 28.80 28.80" id="check-mark-square-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line place-self-center" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">'+
                                        '<g id="SVGRepo_bgCarrier" stroke-width="0"></g>'+
                                        '<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>'+
                                        '<g id="SVGRepo_iconCarrier">'+
                                            '<polyline id="primary" points="21 5 12 14 8 10" style="fill: none; stroke: #FFFFFF; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>'+
                                            '<path id="primary-2" data-name="primary" d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke: #FFFFFF; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>'+
                                        '</g>'+
                                    '</svg>'+
                                    '<p class="text-center">Done</p>'+
                                '</button>'
                container.append(document.createElement('hr'));
                container.append(button_container);
            })
            document.getElementById('kitchen_sum').innerHTML = "จำนวนออเดอร์: " + order_sum;
        });
    </script>
</body>

</html>