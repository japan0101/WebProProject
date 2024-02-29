<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link link="stylesheet" href="style.css">
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/script/tailwind.php") ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/loginModal.php") ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/regisModal.php") ?>

</head>

<body>
<!-- nav bar -->
<nav class="relative flex w-full flex-wrap justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:py-4 content-center">
    <div class="flex w-full flex-wrap items-center justify-between px-3">
        <!-- menu -->
        <div class="relative flex items-center">
            <?php
            $isAuth = isset($_SESSION['userID']);
            if ($isAuth) {
                echo '<button class="text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" 
          >
          <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path d="M4 18L20 18" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
              <path d="M4 12L20 12" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
              <path d="M4 6L20 6" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
            </g>
          </svg>';
            } else {
                echo '
          <div
            class="text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
            data-te-dropdown-ref
            data-te-dropdown-alignment="end">
            <button
            type="button"
            class="inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init
            data-te-toggle="modal"
            data-te-target="#regisModal">
            สมัครสมาชิก
          </button>
          <button
            type="button"
            class="inline-block rounded-full border-2 border-neutral-800 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-800 transition duration-150 ease-in-out hover:border-neutral-800 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-800 focus:border-neutral-800 focus:text-neutral-800 focus:outline-none focus:ring-0 active:border-neutral-900 active:text-neutral-900 dark:border-neutral-900 dark:text-neutral-900 dark:hover:border-neutral-900 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10 dark:hover:text-neutral-900 dark:focus:border-neutral-900 dark:focus:text-neutral-900 dark:active:border-neutral-900 dark:active:text-neutral-900"
            data-te-ripple-init
            data-te-toggle="modal"
            data-te-target="#loginModal">
            เข้าสู่ระบบ
          </button>
          </div>';
            }
            ?>

        </div>
        <div class="flex place-self-center">
            <!-- insert logo -->
            <a class="text-xl text-center font-semibold text-neutral-800 dark:text-neutral-200" href="#">Navbar</a>
        </div>
        <div class="relative flex items-center">
            <!--cart button -->
            <button type="button"
                    class="text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                    data-te-toggle="modal" data-te-target="#incart" data-te-ripple-init data-te-ripple-color="light">

                <!-- end of cart button -->
                <div class="relative inline-flex w-fit">
                    <div class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-1/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 rounded-full bg-pink-700 text-white px-1 py-0.5 text-xs">
                        1
                    </div>
                    <div class="flex items-center justify-center rounded-lg text-center dark:text-white shadow-lg dark:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                            <path fill-rule="evenodd"
                                  d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>

        </div>
    </div>
</nav>
<!-- end of nav bar -->
<!-- seach bar -->
<div class="m-3">
    <div class="relative mb-4 flex w-full flex-wrap items-stretch">
        <input type="search"
               class="relative m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
               placeholder="Search" aria-label="Search" aria-describedby="button-addon1"/>

        <!--Search button-->
        <button class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                <path fill-rule="evenodd"
                      d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                      clip-rule="evenodd"/>
            </svg>
        </button>
    </div>
</div>
<!-- menu order -->
<div class="flex-col flex-wrap md:flex-row flex p-auto m-auto">
    <!-- element per menu -->
    <div class="sm:basis-full md:basis-1/4 lg:basis-1/5 p-1 basis-1/5 flex justify-center">
        <div class="block border rounded-lg">
            <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
            <h1 class="text-xl w-fit m-auto">Mamamia</h1>
            <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
            <div class="w-fit m-auto flex flex-col justify-center items-center">
                <input class="m-auto border rounded w-1/2 m-auto" type="number" id="amount" value="0">
                <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white"
                        onclick="addToCart(1,'Mamamia', 'amount')">order!
                </button>
            </div>
        </div>
    </div>
    <!-- element per menu -->
</div>


<!--Vertically centered modal-->
<!--Vertically centered modal-->
<div data-te-modal-init
     class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="incart"
     tabindex="-1" aria-labelledby="incartTitle" aria-hidden="true">
    <div data-te-modal-dialog-ref
         class="pointer-events-none absolute right-7 h-auto w-full translate-x-[100%] opacity-0 transition-all duration-300 ease-in-out max-[576px]:right-auto min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md bg-info-600 p-4 dark:border-b dark:border-neutral-500 dark:bg-transparent">
                <h5 class="text-xl font-medium leading-normal text-white" id="rightTopModalLabel">
                    รายการอาหารที่สั่ง
                </h5>
                <button type="button"
                        class="box-content rounded-none border-none text-white hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                        data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="relative flex flex-col gap-1 p-4" id="cart" data-te-modal-body-ref>
                <!-- in-cart-item -->
            </div>
            <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                <button type="button"
                        class="mr-2 inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"
                        data-te-ripple-init data-te-ripple-color="light">
                    สั่งอาหาร
                </button>
                <button type="button"
                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                        data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                    ปิด
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    let order = {
        menu: []
    }
    if (localStorage.getItem("menu")) {
        menus = JSON.parse(localStorage.getItem("menu"));
        order.menu = JSON.parse(localStorage.getItem("menu"));
        let cart = document.getElementById("cart");
        let item = document.createElement('div');
        item.setAttribute("class", "block border w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700");
        menus.forEach(menuItem => {
            item.innerHTML = '<div class="my-1 block w-full rounded-lg bg-grey flex flex-row justify-center items-center">' +
                '<div class="basis-1/4 w-fit m-auto place-content-center">' +
                '<img class="w-fit m-auto" src="https://media1.tenor.com/m/GT2HEIsGJ0YAAAAd/chad-giga.gif">' +
                '</div>' +
                '<div class="p-2 basis-2/4">' +
                '  <p>' + menuItem.name + '</p>' +
                '</div>' +
                '<div class="basis-1/4  flex place-self-center text-center">' +
                '<button class="p-2 place-self-center basis-1/8 mr-auto w-fit text-xl text-success" onclick="addToCart(' + menuItem.id + ',\'' + menuItem.name + '\' ,\'add_' + menuItem.id + '\')"> + </button>' +
                '  <input hidden value="-1" id="remove_' + menuItem.id + '"><input hidden value="1" id="add_' + menuItem.id + '"><input class="border rounded w-1/2 text-center" type="number" id="amount_' + menuItem.id + '" value="' + menuItem.amount + '" readonly>' +
                '<button class="p-2 place-self-center basis-1/8 mr-auto ml-1 w-fit text-xl text-danger" onclick="addToCart(' + menuItem.id + ',\'' + menuItem.name + '\' ,\'remove_' + menuItem.id + '\')"> - </button>' +
                '</div>' +
                '</div>';
            cart.appendChild(item);
        });
    }

    function addToCart(food_id, name, form_id) {
        amount = Number(document.getElementById(form_id).value);
        same = false;
        if (amount != 0) {
            for (var menu of order.menu) {
                if (food_id == menu.id) {
                    menu.amount += Number(amount);
                    same = true;
                }
            }
            if (!same) {
                order.menu.push({
                    id: food_id,
                    "name": name,
                    amount: amount
                });
            }
            localStorage.setItem("menu", JSON.stringify(order.menu));

            var menus = JSON.parse(localStorage.getItem("menu"));
            let cart = document.getElementById("cart");
            if (!same) {
                let item = document.createElement('div');
                item.setAttribute("class", "block border w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700");
                menus.forEach(menuItem => {
                    if (menuItem.id == food_id) {
                        item.innerHTML = '<div class="my-1 block w-full rounded-lg bg-grey flex flex-row justify-center items-center">' +
                            '<div class="basis-1/4 w-fit m-auto place-content-center">' +
                            '<img class="w-fit m-auto" src="https://media1.tenor.com/m/GT2HEIsGJ0YAAAAd/chad-giga.gif">' +
                            '</div>' +
                            '<div class="p-2 basis-2/4">' +
                            '  <p>' + menuItem.name + '</p>' +
                            '</div>' +
                            '<div class="basis-1/4  flex place-self-center text-center">' +
                            '  <input class="border rounded w-1/2 m-auto" type="number" id="amount_' + food_id + '" value="' + menuItem.amount + '" readonly/>' +
                            '  <button class="place-self-center basis-1/8 m-auto w-fit" onclick("remove("amount' + menuItem.id + '",' + menuItem.id + ')")>' +
                            '</div>' +
                            '</div>';
                        cart.appendChild(item);
                    }
                });
            } else {
                let oldAmount = document.getElementById('amount_' + food_id);
                menus.forEach(menuItem => {
                    if (menuItem.id == food_id) {
                        oldAmount.value = menuItem.amount;
                    }
                });
            }
        }
    }
</script>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/script/tw_element.php") ?>
</body>

</html>