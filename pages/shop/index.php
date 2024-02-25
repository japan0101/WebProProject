<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LeawTaeApp</title>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tailwind.php") ?>

</head>

<body>
    <script>
        // fetch("/backend/database/customer.php?case=banner").then(e => e.json()).then(payload => {
        //     selectorContainer = document.getElementById('bannerSel');
        //     contentContainer = document.getElementById('contentHolder');
        //     payload.forEach(bannerObj => {

        //     });
        // });
    </script>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/component/nav.php") ?>
    <?php if (isset($_SESSION['userID'])) { ?>
        <span class="my-5">
            <div class="rounded-lg border dark:border-neutral-600">
                <div class="p-4">
                    <div class="sm:flex sm:items-start">
                        <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto pl-0" id="bannerSel" role="tablist" data-te-nav-ref="">
                            <!-- Selector -->
                            <li role="presentation" class="flex-grow text-center">
                                <a href="#allMenu" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#allMenu" data-te-nav-active role="tab" aria-controls="allMenu" aria-selected="true">All</a>
                            </li>
                        </ul>
                        <!-- Banner Showcase -->
                        <div class="my-2 grow" id="contentHolder">
                            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="allMenu" role="tab" aria-labelledby="tabs-home-tab03" data-te-tab-active="">
                                <div class="flex flex-wrap justify-center items-center max-w-[110rem]">
                                    <div class="my-3 mx-1 block max-w-[19rem] rounded-lg bg-white text-center shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                        <div class="relative overflow-hidden bg-cover bg-no-repeat" data-te-ripple-init data-te-ripple-color="light">
                                            <img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg" alt="" />
                                            <a href="#!">
                                                <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
                                            </a>
                                        </div>
                                        <div class="p-6">
                                            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                                {คูปอง.ชื่อเมนู}
                                            </h5>
                                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                                คูปองส่วนลด {คูปอง.ส่วนลด * 100} %
                                            </p>
                                            <button type="button" href="#" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                                {คูปอง.ราคา} แต้ม
                                            </button>
                                        </div>
                                    </div>
                                    <div class="my-3 mx-1 block max-w-[19rem] rounded-lg bg-white text-center shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                        <div class="relative overflow-hidden bg-cover bg-no-repeat" data-te-ripple-init data-te-ripple-color="light">
                                            <img class="rounded-t-lg" src="https://tecdn.b-cdn.net/img/new/standard/nature/186.jpg" alt="" />
                                            <a href="#!">
                                                <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></div>
                                            </a>
                                        </div>
                                        <div class="p-6">
                                            <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                                {คูปอง.ชื่อเมนู}
                                            </h5>
                                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                                คูปองส่วนลด {คูปอง.ส่วนลด * 100} %
                                            </p>
                                            <button type="button" href="#" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                                {คูปอง.ราคา} แต้ม
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </span>
    <?php } else { ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/asset/script/sweetalert.js"></script>
        <script>
            Warning.fire({
                icon: "warning",
                title: "คำเตือน",
                text: "คุณยังไม่ได้เข้าสู่ระบบ"
            });
        </script>
    <?php } ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tw_element.php") ?>

</body>

</html>
