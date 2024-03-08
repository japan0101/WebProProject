<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start(); ?>

    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./../../assets/icon/favicon.svg">

    <title>Laew Tae App</title>
    <?php
    include("./../../assets/scripts/tailwind.php") ?>

    <link rel="stylesheet" href="./../../assets/stylesheets/navbar.css">
    <link rel="stylesheet" href="./../../assets/stylesheets/global.css">
</head>

<body>
<?php
include("./../../assets/component/navStaff.php") ?>

<?php

$isAuth = isset($_SESSION['memberName']);
if (!$isAuth) { ?>
    <div class="relative mb-5" data-te-input-wrapper-init>
        <input type="text"
               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
               name="credential" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email"/>
        <label for="loginEmail"
               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">หมายเลขโทรศัพท์</label>
    </div>

    <!--Password input-->
    <div class="relative mb-2" data-te-input-wrapper-init>
        <input type="password"
               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
               name="passwd" id="loginPassword" placeholder="Password"/>
        <label for="loginPassword"
               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">รหัสผ่าน</label>
    </div>

    <!--Checkbox-->
    <div class="mb-6 block min-h-[1.5rem] pl-[1.5rem]">
        <input class='relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[""]
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
        dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]' type="checkbox" value="1" id="token" name="token"
        />
        <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="checkboxDefault">
            จดจำบัญชีนี้ไว้
        </label>
    </div>';
    <?php
}
if ($isAuth && ($_SESSION['role'] == "STAFF" || $_SESSION['role'] == "MANAGER")) { ?>
    <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    <!--Tabs navigation-->
    <br><br>
    <ul class="place-content-center mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0" role="tablist"
        data-te-nav-ref>
        <li role="presentation">
            <a href="#tabs-home"
               class="my-2 block px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:bg-gray-100 data-[te-nav-active]:text-primary data-[te-nav-active]:border-b-2 border-primary dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
               data-te-toggle="pill" data-te-target="#tabs-home" data-te-nav-active role="tab" aria-controls="tabs-home"
               aria-selected="true">ห้องครัว</a>
        </li>
        <li role="presentation">
            <a href="#tabs-profile"
               class="my-2 block border-x-0 border-t-0 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-b-2 border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
               data-te-toggle="pill" data-te-target="#tabs-profile" role="tab" aria-controls="tabs-profile"
               aria-selected="false">พนักงานเสิร์ฟ</a>
        </li>
    </ul>

    <!--Tabs content-->
    <div class="mb-6">

        <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
             id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab" data-te-tab-active>

            <!-- Waiter Content -->
            <div class="block rounded-lg bg-white p-6 dark:bg-neutral-700">
                <p id="kitchen_sum" class="text-5xl my-auto w-fit bold">จำนวนออเดอร์ที่รอ: </p>
            </div>

            <!-- Chef Content -->
            <div id="kitchen_order"
                 class="flex flex-row overflow-x-auto block rounded-lg bg-white p-6 dark:bg-neutral-700 gap-3">
            </div>


        </div>

        <!-- Waiter Content -->
        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
             id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
            <div class="block rounded-lg bg-white p-6 dark:bg-neutral-700">
                <p id="waiter_sum" class="text-5xl my-auto w-fit bold">จำนวนออเดอร์ที่เสร็จ: </p>
            </div>
            <div id="waiter_order"
                 class="flex flex-row overflow-x-auto block rounded-lg bg-white p-6 dark:bg-neutral-700 gap-3">
            </div>
        </div>

    </div>
    <?php
} ?>


<?php
include("./../../assets/scripts/tw_element.php") ?>
<script>
    // Chef Content
    fetch("./../../backend/database/staff.php?case=cooking_order").then(e => e.json()).then(payload => {
        order_list = [];
        order_sum = 0;

        payload.forEach(itemObj => {
            order_sum++;
            let order_div = document.getElementById('kitchen_order');

            let content = document.createElement("form");
            content.action = "./../../backend/database/staff.php"
            content.method = "post"
            content.className = "w-1/4 flex-none border rounded-lg h-full"

            let container = document.createElement('div');

            let top = document.createElement("div");
            top.className = "p-3";
            top.innerHTML = '<p class="text-2xl">โต๊ะที่: ' + itemObj[0].tableID + '</p><p class="text-xl">รายการอาหารที่สั่ง: </p>';

            container.append(top)
            content.append(container);
            order_div.append(content);

            container.append(document.createElement('hr'));

            let list_1_container = document.createElement('div');
            list_1_container.innerHTML = "";
            list_1_container.className = "max-h-96 min-h-96 overflow-y-auto menu-content p-3 my-1";

            let list_2_container = document.createElement('div');
            list_2_container.className = "menu-content overflow-y-auto min-h-96";
            list_2_container.id = "order" + itemObj[0].orderAt;

            list_1_container.append(list_2_container);
            container.append(list_1_container);
            for (menuObj of itemObj) {
                let food_container = document.getElementById('order' + itemObj[0].orderAt);
                let menu_container = document.createElement('div');
                menu_container.className = "snap-start mt-3";
                menu_content = document.createElement("p");
                menu_content.className = "text-medium";
                menu_content.append(document.createTextNode('X' + menuObj.amount + " " + menuObj.menuName));
                menu_container.appendChild(menu_content);

                food_container.append(menu_container);
            }

            let bottom = document.createElement("div")
            bottom.className = "flex flex-row"
            bottom.innerHTML = `
                <input type="hidden" name="tableID" value="${itemObj[0].tableID}">
                <input type="hidden" name="orderAt" value="${itemObj[0].orderAt}">`

            let button_container = document.createElement('div');

            button_container.className = "flex justify-center bg-emerald-600 hover:bg-emerald-700 text-gray-100 p-3 cursor-pointer flex-1";
            button_container.innerHTML = `<svg width="32px" height="32px" viewBox="-2.4 -2.4 28.80 28.80" id="check-mark-square-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line place-self-center" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                </g>
                <g id="SVGRepo_iconCarrier"><polyline id="primary" points="21 5 12 14 8 10" style="fill: none; stroke: white; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                </polyline><path id="primary-2" data-name="primary" d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke: white; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></g></svg>
                <span class="my-auto">เสร็จสิ้น</span>
                `
            button_container.onclick = () => {
                let inp = document.createElement("input")
                inp.type = "hidden";
                inp.name = "case"
                inp.value = "orderComplete"

                bottom.append(inp)
                content.submit()
            }

            let button_container2 = document.createElement('div');
            button_container2.className = "flex justify-center bg-red-600 hover:bg-red-700 text-gray-100 p-3 cursor-pointer flex-1";
            button_container2.innerHTML = `<div class="my-auto"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
</svg></div>

                <span class="my-auto">ยกเลิก</span>
                `
            button_container2.onclick = () => {
                let inp = document.createElement("input")
                inp.type = "hidden";
                inp.name = "case"
                inp.value = "orderCancel"

                bottom.append(inp)
                content.submit()
            }

            bottom.append(button_container)
            bottom.append(button_container2)

            container.append(document.createElement('hr'));
            container.append(bottom);
        })

        document.getElementById('kitchen_sum').innerHTML = "จำนวนออเดอร์ที่รอ: " + order_sum;
    });


    // Waiter Content
    fetch("./../../backend/database/staff.php?case=complete_order").then(e => e.json()).then(payload => {
        order_list = [];
        order_sum = 0;

        payload.forEach(itemObj => {
            order_sum++;
            let order_div = document.getElementById('waiter_order');

            let content = document.createElement("form");
            content.action = "./../../backend/database/staff.php"
            content.method = "post"
            content.className = "w-1/4 flex-none border rounded-lg h-full"

            let container = document.createElement('div');

            let top = document.createElement("div");
            top.className = "p-3";
            top.innerHTML = '<p class="text-2xl">โต๊ะที่: ' + itemObj[0].tableID + '</p><p class="text-xl">รายการอาหารที่สั่ง: </p>';

            container.append(top)
            content.append(container);
            order_div.append(content);

            container.append(document.createElement('hr'));

            let list_1_container = document.createElement('div');
            list_1_container.innerHTML = "";
            list_1_container.className = "max-h-96 min-h-96 overflow-y-auto menu-content p-3 my-1";

            let list_2_container = document.createElement('div');
            list_2_container.className = "menu-content overflow-y-auto min-h-96";
            list_2_container.id = "orderC" + itemObj[0].orderAt;

            list_1_container.append(list_2_container);
            container.append(list_1_container);
            for (menuObj of itemObj) {
                let food_container = document.getElementById('orderC' + itemObj[0].orderAt);
                let menu_container = document.createElement('div');
                menu_container.className = "snap-start mt-3";
                menu_content = document.createElement("p");
                menu_content.className = "text-medium";
                console.log(menuObj.amount)
                menu_content.append(document.createTextNode('X' + menuObj.amount + " " + menuObj.menuName));
                menu_container.appendChild(menu_content);

                food_container.append(menu_container);
            }

            let button_container = document.createElement('div');

            button_container.className = "flex justify-center bg-amber-400 hover:bg-amber-500 text-gray-100 p-3 cursor-pointer";
            button_container.innerHTML = `<svg width="32px" height="32px" viewBox="-2.4 -2.4 28.80 28.80" id="check-mark-square-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line place-self-center" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                </g>
                <g id="SVGRepo_iconCarrier"><polyline id="primary" points="21 5 12 14 8 10" style="fill: none; stroke: white; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                </polyline><path id="primary-2" data-name="primary" d="M21,11v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V4A1,1,0,0,1,4,3H16" style="fill: none; stroke: white; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></g></svg>
                <span class="my-auto">เสร็จสิ้น</span>
                <input type="hidden" name="case" value="orderServed">
                <input type="hidden" name="tableID" value="${itemObj[0].tableID}">
                <input type="hidden" name="orderAt" value="${itemObj[0].orderAt}">`
            button_container.onclick = () => {
                content.submit()
            }
            container.append(document.createElement('hr'));
            container.append(button_container);
        })

        document.getElementById('waiter_sum').innerHTML = "จำนวนออเดอร์ที่เสร็จ: " + order_sum;
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./../../assets/scripts/sweetalert.js"></script>
<?php
if (isset($_SESSION['result'])) { ?>
    <script>
        <?php $fire = false; ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "orderComplete")) { ?>
        Toast2.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "orderComplete")) { ?>
        Toast2.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>


        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "orderServed")) { ?>
        Toast2.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "orderServed")) { ?>
        Toast2.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>


        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "orderCancel")) { ?>
        Toast2.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "orderCancel")) { ?>
        Toast2.fire({
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