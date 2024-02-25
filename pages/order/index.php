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
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tailwind.php") ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/component/loginModal.php") ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/component/regisModal.php") ?>
  <script>
    import {
      Modal,
      Ripple,
      initTE,
    } from "tw-elements";

    initTE({
      Modal,
      Ripple
    });
  </script>
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
        <button type="button" class="text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" data-te-toggle="modal" data-te-target="#incart" data-te-ripple-init data-te-ripple-color="light">

          <!-- end of cart button -->
          <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2 1C1.44772 1 1 1.44772 1 2C1 2.55228 1.44772 3 2 3H3.21922L6.78345 17.2569C5.73276 17.7236 5 18.7762 5 20C5 21.6569 6.34315 23 8 23C9.65685 23 11 21.6569 11 20C11 19.6494 10.9398 19.3128 10.8293 19H15.1707C15.0602 19.3128 15 19.6494 15 20C15 21.6569 16.3431 23 18 23C19.6569 23 21 21.6569 21 20C21 18.3431 19.6569 17 18 17H8.78078L8.28078 15H18C20.0642 15 21.3019 13.6959 21.9887 12.2559C22.6599 10.8487 22.8935 9.16692 22.975 7.94368C23.0884 6.24014 21.6803 5 20.1211 5H5.78078L5.15951 2.51493C4.93692 1.62459 4.13696 1 3.21922 1H2ZM18 13H7.78078L6.28078 7H20.1211C20.6742 7 21.0063 7.40675 20.9794 7.81078C20.9034 8.9522 20.6906 10.3318 20.1836 11.3949C19.6922 12.4251 19.0201 13 18 13ZM18 20.9938C17.4511 20.9938 17.0062 20.5489 17.0062 20C17.0062 19.4511 17.4511 19.0062 18 19.0062C18.5489 19.0062 18.9938 19.4511 18.9938 20C18.9938 20.5489 18.5489 20.9938 18 20.9938ZM7.00617 20C7.00617 20.5489 7.45112 20.9938 8 20.9938C8.54888 20.9938 8.99383 20.5489 8.99383 20C8.99383 19.4511 8.54888 19.0062 8 19.0062C7.45112 19.0062 7.00617 19.4511 7.00617 20Z" fill="#0F0F0F">
              </path>
            </g>
          </svg>
      </div>
    </div>
  </nav>
  <!-- end of nav bar -->
  <!-- seach bar -->
  <div class="m-3">
    <div class="relative mb-4 flex w-full flex-wrap items-stretch">
      <input type="search" class="relative m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

      <!--Search button-->
      <button class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg" type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
          <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
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
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <!-- element per menu -->
        <!-- element per menu -->
        <div class="sm:basis-full md:basis-1/4 lg:basis-1/5 p-1 basis-1/5 flex justify-center">
      <div class="block border rounded-lg">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <!-- element per menu -->  
        <!-- element per menu -->
        <div class="sm:basis-full md:basis-1/4 lg:basis-1/5 p-1 basis-1/5 flex justify-center">
      <div class="block border rounded-lg">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <!-- element per menu -->  
        <!-- element per menu -->
        <div class="sm:basis-full md:basis-1/4 lg:basis-1/5 p-1 basis-1/5 flex justify-center">
      <div class="block border rounded-lg">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <!-- element per menu -->  
        <!-- element per menu -->
        <div class="sm:basis-full md:basis-1/4 lg:basis-1/5 p-1 basis-1/5 flex justify-center">
      <div class="block border rounded-lg">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <!-- element per menu -->  
        <!-- element per menu -->
        <div class="sm:basis-full md:basis-1/4 lg:basis-1/5 p-1 basis-1/5 flex justify-center">
      <div class="block border rounded-lg">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <!-- element per menu -->  
        <!-- element per menu -->
        <div class="sm:basis-full md:basis-1/4 lg:basis-1/5 p-1 basis-1/5 flex justify-center">
      <div class="block border rounded-lg">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <!-- element per menu -->
  </div>
      

  <!--Vertically centered modal-->
  <!--Vertically centered modal-->
  <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="incart" tabindex="-1" aria-labelledby="incartTitle" aria-hidden="true">
    <div data-te-modal-dialog-ref class="pointer-events-none absolute right-7 h-auto w-full translate-x-[100%] opacity-0 transition-all duration-300 ease-in-out max-[576px]:right-auto min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
      <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md bg-info-600 p-4 dark:border-b dark:border-neutral-500 dark:bg-transparent">
          <h5 class="text-xl font-medium leading-normal text-white" id="rightTopModalLabel">
            รายการอาหารที่สั่ง
          </h5>
          <button type="button" class="box-content rounded-none border-none text-white hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="relative flex flex-col gap-1 p-4" data-te-modal-body-ref>
          <!-- in-cart-item -->
          <div class="block border w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <!-- menu item -->
            <div class="my-1 block w-full rounded-lg bg-grey flex flex-row justify-center items-center">
                <div class="basis-1/4 w-fit m-auto place-content-center">
                    <img class="w-fit m-auto" src="https://media1.tenor.com/m/GT2HEIsGJ0YAAAAd/chad-giga.gif">
                </div>
                <div class="p-2 basis-2/4">
                    <p>How much is the food name?!</p>
                </div>
                <div class="basis-1/4  flex place-self-center text-center">
                    <input class="border rounded w-1/2 m-auto" type="number" id="amount">
                </div>
            </div>
          </div>
          <!-- in-cart-item -->
          <div class="block border w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <!-- menu item -->
            <div class="my-1 block w-full rounded-lg bg-grey flex flex-row justify-center items-center">
                <div class="basis-1/4 w-fit m-auto place-content-center">
                    <img class="w-fit m-auto" src="data:image/jpeg;base64,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">
                </div>
                <div class="p-2 basis-2/4">
                    <p>How much is the food name?!</p>
                </div>
                <div class="basis-1/4  flex place-self-center text-center">
                    <input class="border rounded w-1/2 m-auto" type="number" id="amount">
                </div>
            </div>
          </div>
          <!-- in-cart-item -->
          <div class="block border w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <!-- menu item -->
            <div class="my-1 block w-full rounded-lg bg-grey flex flex-row justify-center items-center">
                <div class="basis-1/4 w-fit m-auto place-content-center">
                    <img class="w-fit m-auto" src="https://i.ytimg.com/vi/VOK4NtCkNGg/maxresdefault.jpg">
                </div>
                <div class="p-2 basis-2/4">
                    <p>How much is the food name?!</p>
                </div>
                <div class="basis-1/4  flex place-self-center text-center">
                    <input class="border rounded w-1/2 m-auto" type="number" id="amount">
                </div>
            </div>
          </div>
          <!-- in-cart-item -->
          <div class="block border w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <!-- menu item -->
            <div class="my-1 block w-full rounded-lg bg-grey flex flex-row justify-center items-center">
                <div class="basis-1/4 w-fit m-auto place-content-center">
                    <img class="w-fit m-auto" src="https://media1.tenor.com/m/GT2HEIsGJ0YAAAAd/chad-giga.gif">
                </div>
                <div class="p-2 basis-2/4">
                    <p>How much is the food name?!</p>
                </div>
                <div class="basis-1/4  flex place-self-center text-center">
                    <input class="border rounded w-1/2 m-auto" type="number" id="amount">
                </div>
            </div>
          </div>
          <!-- in-cart-item -->
          <div class="block border w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <!-- menu item -->
            <div class="my-1 block w-full rounded-lg bg-grey flex flex-row justify-center items-center">
                <div class="basis-1/4 w-fit m-auto place-content-center">
                    <img class="w-fit m-auto" src="https://media1.tenor.com/m/GT2HEIsGJ0YAAAAd/chad-giga.gif">
                </div>
                <div class="p-2 basis-2/4">
                    <p>How much is the food name?!</p>
                </div>
                <div class="basis-1/4  flex place-self-center text-center">
                    <input class="border rounded w-1/2 m-auto" type="number" id="amount">
                </div>
            </div>
          </div>
        </div>
        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
          <button type="button" class="mr-2 inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]" data-te-ripple-init data-te-ripple-color="light">
            สั่งอาหาร
          </button>
          <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
            ปิด
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tw_element.php") ?>
</body>

</html>