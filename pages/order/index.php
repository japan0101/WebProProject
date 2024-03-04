<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laew Tae App</title>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tailwind.php") ?>

    <link rel="stylesheet" href="./../../assets/stylesheets/navbar.css">
    <link rel="stylesheet" href="./../../assets/stylesheets/global.css">

</head>

<body>
    <?php
    if (isset($_COOKIE['tableID'])) { ?>
        <!-- nav bar -->
        <nav class="relative flex w-full flex-wrap justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:py-4 content-center">
            <div class="flex w-full flex-wrap items-center justify-between px-3">
                <!-- menu -->
                <div class="relative flex items-center ml-3">
                    <?php
                    $isAuth = isset($_SESSION['memberName']);
                    if ($isAuth) {
                        echo "{$_SESSION['memberName']}";
                    } else {
                        echo "Guest";
                    }
                    ?>
                </div>
                <div class="flex place-self-center">
                    <!-- insert logo -->
                    <a class="text-xl text-center font-semibold text-neutral-800 dark:text-neutral-200" href="#">Table
                        #<?php
                            echo $_COOKIE['tableID'] ?></a>
                </div>
                <div class="relative flex items-center">
                    <!--cart button -->
                    <button type="button" class="text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" data-te-toggle="modal" data-te-target="#incart">

                        <!-- end of cart button -->
                        <div class="relative inline-flex w-fit">
                            <div class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 mr-5 skew-y-0 scale-x-100 scale-y-100 whitespace-nowrap rounded-full bg-indigo-700 px-2 py-1 text-center align-baseline text-xs font-bold leading-none text-white font-mono" id="cart_menu">
                                0
                            </div>
                            <div class="flex items-center justify-center rounded-lg bg-pink-500 text-center text-white shadow-lg dark:text-gray-200 mr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                                    <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                </div>
            </div>
        </nav>

        <!-- end of nav bar -->

        <link rel="stylesheet" href="./../../assets/stylesheets/navbar.css">
        <link rel="stylesheet" href="./../../assets/stylesheets/global.css">

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

                                    <!-- rendered here -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </span>
        <script>
            fetch("./../../backend/database/customer.php?case=allmenus").then(e => e.json()).then(payload => {
                selectorContainer = document.getElementById('bannerSel');
                contentContainer = document.getElementById('contentHolder');
                allContainer = document.getElementById('allCouponContainer');
                category = []
                payload.forEach(menuObj => {
                    if (!category.includes(menuObj['categoryName'])) {
                        //Rendering tabs for each new category
                        category.push(menuObj['categoryName']);
                        selList = document.createElement('li');
                        selList.setAttribute('role', 'presentation');
                        selList.className = 'flex-grow text-center'

                        selector = document.createElement('a');
                        selector.className = "my-2 block border-x-0 border-t-0 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-b-2 border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        selector.setAttribute('href', 'tab-' + menuObj['categoryID']);
                        selector.setAttribute('data-te-toggle', 'pill');
                        selector.setAttribute('data-te-target', '#' + 'tab-' + menuObj['categoryID']);
                        selector.setAttribute('role', 'tab');
                        selector.setAttribute('aria-controls', 'tab-' + menuObj['categoryID']);
                        selector.setAttribute('aria-selected', 'false');
                        selector.innerHTML = menuObj['categoryName'];
                        selList.appendChild(selector);
                        selectorContainer.appendChild(selList);

                        contentBody = document.createElement('div');
                        contentBody.className = "hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block";
                        contentBody.id = 'tab-' + menuObj['categoryID'];
                        contentBody.setAttribute('role', 'tabpanel');
                        contentBody.setAttribute('aria-labelledby', 'tab-' + menuObj['categoryID']);

                        menuHolder = document.createElement('div');
                        menuHolder.className = "flex flex-wrap justify-center items-center max-w-[110rem]"
                        menuHolder.id = 'tab-' + menuObj['categoryID'] + '-holder';
                        contentBody.appendChild(menuHolder);
                        contentContainer.appendChild(contentBody);
                    }
                    //Redering menu card
                    currentHolder = document.getElementById('tab-' + menuObj['categoryID'] + '-holder');

                    card = document.createElement('div');
                    card.className = "my-3 mx-1 block max-w-[12rem] rounded-lg bg-white text-center shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700";

                    imageSection = document.createElement('div')
                    imageSection.className = "relative overflow-hidden bg-cover bg-no-repeat"
                    imageSection.setAttribute('data-te-ripple-init', '');
                    imageSection.setAttribute('data-te-ripple-color', 'light');

                    imageFunction = document.createElement('a');
                    imageFunction.setAttribute('href', '#!');
                    imageFunctionIn = document.createElement('div');
                    imageFunctionIn.className = "absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100";

                    imagePart = document.createElement('img');
                    imagePart.className = "rounded-t-lg"
                    imagePart.setAttribute('src', '/assets/images/menus/' + menuObj['image'])
                    imagePart.setAttribute('alt', 'picture_of_' + menuObj['menuID'])

                    infoPart = document.createElement('div');
                    infoPart.className = "p-6"

                    title = document.createElement('h5');
                    title.className = "mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50"
                    title.innerHTML = menuObj['menuName']

                    price = document.createElement('p');
                    price.className = "mb-4 text-base text-neutral-600 dark:text-neutral-200"
                    price.innerHTML = menuObj['price'] + " บาท"

                    addBtn = document.createElement('button');
                    addBtn.className = "p-2 place-self-center basis-1/8 mr-auto w-fit text-xl text-success"
                    addBtn.innerHTML = "+";

                    amountOrd = document.createElement('input');
                    amountOrd.className = "m-auto border rounded w-1/2 m-auto text-center"
                    amountOrd.setAttribute('value', 0);
                    amountOrd.setAttribute('min', 0);
                    amountOrd.setAttribute('readonly', "");

                    remBtn = document.createElement('button');
                    remBtn.className = "p-2 place-self-center basis-1/8 mr-auto w-fit text-xl text-danger"
                    remBtn.innerHTML = "-";

                    ordBtn = document.createElement('button');
                    ordBtn.setAttribute('type', 'button');
                    ordBtn.className = "inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    ordBtn.setAttribute('data-te-ripple-init', '');
                    ordBtn.setAttribute('data-te-ripple-color', 'light');
                    ordBtn.innerHTML = "สั่งอาหาร"

                    imageSection.appendChild(imagePart);
                    imageSection.appendChild(imageFunction);
                    imageFunction.appendChild(imageFunctionIn);
                    card.appendChild(imageSection);
                    infoPart.appendChild(title);
                    infoPart.appendChild(price);
                    infoPart.appendChild(addBtn);
                    infoPart.appendChild(amountOrd);
                    infoPart.appendChild(remBtn);
                    infoPart.appendChild(ordBtn);
                    card.appendChild(infoPart);
                    currentHolder.appendChild(card);
                    addBtn.setAttribute('onclick', "addAmount(menu_all_amount_" + menuObj['menuID'] + ")");
                    amountOrd.setAttribute('id', 'menu_all_amount_' + menuObj['menuID']);
                    remBtn.setAttribute('onclick', "removeAmount(menu_all_amount_" + menuObj['menuID'] + ")");
                    ordBtn.setAttribute('onclick', 'orderFood(\'' + menuObj['menuName'] + '\', menu_all_amount_' + menuObj['menuID'] + '.value, ' + menuObj['price'] + ', ' + menuObj['menuID'] + ')');
                    allContainer.appendChild(card.cloneNode(true));
                    addBtn.setAttribute('onclick', "addAmount(menu_amount_" + menuObj['menuID'] + ")");
                    amountOrd.setAttribute('id', 'menu_amount_' + menuObj['menuID']);
                    remBtn.setAttribute('onclick', "removeAmount(menu_amount_" + menuObj['menuID'] + ")");
                    ordBtn.setAttribute('onclick', 'orderFood(\'' + menuObj['menuName'] + '\', menu_amount_' + menuObj['menuID'] + '.value, ' + menuObj['price'] + ', ' + menuObj['menuID'] + ')');
                });
            });
        </script>

        <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="incart" tabindex="-1" aria-labelledby="incartLabel" aria-hidden="true">
            <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="incartLabel">
                            รายการอาหาร
                        </h5>
                        <!--Close button-->
                        <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4 max-h-72 overscroll-contain overflow-y-auto" data-te-modal-body-ref>
                        <ul class="" id="order_show">

                        </ul>
                        <div class="self-center">ราคาทั้งหมด: <input class="m-auto border rounded w-1/5 text-center" id="total_price" value="0" min="0" readonly=""> บาท
                        </div>
                    </div>

                    <!--Modal footer-->
                    <form action="/backend/database/customer.php" method="post">
                        <div class="justify-center flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                            <button type="button" onclick="orderMenus(this)" class="mx-auto inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                สั่งเลย
                            </button>
                            <button type="button" class="mx-auto inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                ปิด
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const cart_m = document.getElementById("cart_menu");

            localStorage.removeItem("orderList")

            order_container = document.getElementById('order_show');
            menu_order = JSON.parse(localStorage.getItem("orderList"));
            if (menu_order == null) menu_order = [];
            buildOrder(menu_order);


            function inp_case(input, value, name) {
                input.value = value
                input.type = 'hidden'
                input.name = name
            }

            function orderFood(menuName, amount, price, menuId) {
                menu_order = JSON.parse(localStorage.getItem("orderList"));
                if (menu_order == null) menu_order = [];
                item = {
                    "menuId": menuId,
                    "menuName": menuName,
                    "amount": Number(amount),
                    "price": price
                }
                if (amount > 0) {
                    if (containsObject(item, menu_order)) {
                        console.log(menu_order);
                        menu_order.forEach(menu => {
                            if (menu.menuId == item.menuId) {
                                menu.amount += Number(item.amount);
                                if (menu.amount > 99) menu.amount = 99
                            }
                        });
                        localStorage.setItem("orderList", JSON.stringify(menu_order));
                    } else {
                        menu_order.push(item);
                        console.log(menu_order);
                        localStorage.setItem("orderList", JSON.stringify(menu_order));
                    }
                    buildOrder(menu_order);
                }
            }

            function containsObject(obj, list) {
                var i;
                for (i = 0; i < list.length; i++) {
                    if (list[i].menuId === obj.menuId) {
                        return true;
                    }
                }

                return false;
            }

            function addAmount(input) {
                if (Number(input.value) < 99) input.value = Number(input.value) + 1;
            }

            function removeAmount(input) {
                if (Number(input.value) > 0) input.value = Number(input.value) - 1;
            }

            function addOrderAmount(menuId, input) {
                if (Number(input.value) < 99) {
                    menu_order = JSON.parse(localStorage.getItem("orderList"));
                    menu_order.forEach(menu => {
                        if (menu.menuId == menuId) {
                            menu.amount += 1;
                        }
                    });
                    localStorage.setItem("orderList", JSON.stringify(menu_order));
                    buildOrder(menu_order);
                } else {
                    input.value = 99
                }
            }

            function removeOrderAmount(menuId, input) {
                if (Number(input.value) > 0) {
                    menu_order = JSON.parse(localStorage.getItem("orderList"));
                    menu_order.forEach(menu => {
                        if (menu.menuId == menuId) {
                            menu.amount -= 1;
                            if (menu.amount < 1) {
                                menu_order.splice(menu_order.indexOf(menu), 1);
                            }
                        }
                    });
                    localStorage.setItem("orderList", JSON.stringify(menu_order));
                    buildOrder(menu_order);
                }
            }

            function buildOrder(list) {
                cart_m.innerHTML = list.length
                order_container.innerHTML = ""
                totalPrice = 0
                list.forEach(element => {
                    card = document.createElement('li');
                    card.className = "my-1 w-full rounded-lg bg-primary-100 p-4 text-primary-600 inline-flex"

                    namepart = document.createElement('div');
                    namepart.className = "self-center";
                    namepart.innerHTML = element.menuName;

                    amountContainer = document.createElement("div");
                    amountContainer.className = "slef-center";

                    amountAdd = document.createElement("button");
                    amountAdd.className = "p-2 basis-1/8 mx-auto w-fit text-xl text-success";
                    amountAdd.setAttribute('onclick', 'addOrderAmount(' + element.menuId + ', order_amount_' + element.menuId + ')');
                    amountAdd.innerHTML = "+"

                    amountNum = document.createElement("input");
                    amountNum.className = "m-auto border rounded w-1/5 text-center";
                    amountNum.id = "order_amount_" + element.menuId;
                    amountNum.setAttribute('value', element.amount);
                    amountNum.setAttribute('min', 0);
                    amountNum.setAttribute('readonly', '');

                    amountRemove = document.createElement("button");
                    amountRemove.className = "p-2 basis-1/8 mx-auto w-fit text-xl text-danger";
                    amountRemove.setAttribute('onclick', 'removeOrderAmount(' + element.menuId + ', order_amount_' + element.menuId + ')');
                    amountRemove.innerHTML = "-";

                    price = document.createElement('div');
                    price.className = "self-center";
                    price.innerHTML = (element.price * element.amount) + ' บาท';
                    totalPrice += element.price * element.amount;

                    card.appendChild(namepart);
                    card.appendChild(amountContainer);
                    amountContainer.appendChild(amountAdd);
                    amountContainer.appendChild(amountNum),
                        amountContainer.appendChild(amountRemove);
                    card.appendChild(price);
                    order_container.appendChild(card);
                });
                document.getElementById('total_price').value = totalPrice;
            }

            function orderMenus(element) {
                let case_ = document.createElement("input")
                inp_case(case_, "orderFood", 'case')

                let menu_list = document.createElement("input")
                inp_case(menu_list, localStorage.getItem("orderList"), 'menu')

                element.form.append(case_)
                element.form.append(menu_list)
                element.form.submit()
            }
        </script>

    <?php
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/scripts/sweetalert.js"></script>

    <?php
    if (!isset($_COOKIE['tableID'])) { 
        if (isset($_SESSION['tablecode'])) header("Location: ./../../backend/checkTable.php")?>

        <?php
        if (!isset($_SESSION['userID'])) { ?>
            <!-- Login Modal -->
            <div data-te-modal-init data-te-backdrop="false" class="fixed left-0 top-0 z-[1055] block h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="loginModal" tabindex="-1" aria-labelledby="loginModalTitle" aria-hidden="true">
                <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
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
                            <form action="/backend/account/read_user.php" method="post">
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

                                <div class="inline-flex items-center justify-center w-full">
                                    <hr class="w-64 h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                                    <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">or</span>
                                </div>

                            </form>

                            <form action="/backend/account/anonymous.php" method="post">
                                <!-- Login as Guest button-->
                                <button type="submit" class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                    เข้าสู่ระบบแบบ Guest
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="undefined transition-all duration-300 ease-in-out fixed top-0 left-0 z-[1040] bg-black w-screen h-screen opacity-50" data-te-backdrop-show=""></div>
        <?php
        } else { ?>

            <div class="flex flex-col h-screen w-screen content-center">
                <div class="m-auto">
                    <div class="inline-block h-96 w-96 animate-[spinner-grow_0.75s_linear_infinite] rounded-full bg-current align-[-0.125em] opacity-0 motion-reduce:animate-[spinner-grow_1.5s_linear_infinite]" role="status">
                        <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                    </div>
                </div>
            </div>
            <form action="/backend/database/customer.php" method="post" id="form1">
                <input type="hidden" name="case" value="tableCheck">
            </form>

            <script async>
                const form1 = document.getElementById("form1");

                async function inputCode() {
                    const {
                        value: code
                    } = await Swal.fire({
                        title: 'กรุณากรอกโค้ดโต๊ะ',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: true,
                        text: 'โค้ดที่ได้จากพนักงาน',
                        icon: 'question',
                        input: 'text',
                        confirmButtonText: 'ตกลง'
                    });
                    if (code || code == "") {
                        let inp = document.createElement("input")
                        inp.name = "code"
                        inp.hidden = true
                        inp.value = code
                        form1.append(inp)
                        form1.submit()
                    }
                }

                inputCode()
            </script>

        <?php
        } ?>

    <?php
    } ?>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>

    <script>
        function wait(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function sleep(sec) {
            for (let i = 0; i < sec; i++) {
                // console.log(`Waiting ${i} seconds...`);
                await wait(i * 1000);
            }
            location.reload()
        }
    </script>

    <?php
    if (isset($_SESSION['result'])) { ?>
        <script>
            <?php $fire = false; ?>
            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "tableCheck")) { ?>
                Toast.fire({
                    icon: "success",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                });
                <?php $fire = true; ?>

            <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "tableCheck")) { ?>
                Toast.fire({
                    icon: "error",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                })
                sleep(2);
            <?php $fire = true;
            } ?>

            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "orderFood")) { ?>
                Toast.fire({
                    icon: "success",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                });
                <?php $fire = true; ?>

            <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "orderFood")) { ?>
                Toast.fire({
                    icon: "error",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                });
                sleep(2)
            <?php $fire = true;
            } ?>

            <?php if ($fire)
                unset($_SESSION['result']); ?>
        </script>
    <?php
    } ?>

</body>

</html>