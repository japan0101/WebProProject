<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

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
        }else{
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
        <a class="text-xl font-semibold text-neutral-800 dark:text-neutral-200" href="#">Navbar</a>
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
  <div class="flex-col md:flex-row md:flex-row flex place-content-center">
    <div class="flex-1 block border rounded-lg sm:w-full md:w-1/4 lg:w-1/6 lg:w-1/6 w-full mx-1">
      <div class="">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <div class="flex-1 block border rounded-lg sm:w-full md:w-1/4 lg:w-1/6 lg:w-1/6 w-full mx-1">
      <div class="">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <div class="flex-1 block border rounded-lg sm:w-full md:w-1/4 lg:w-1/6 lg:w-1/6 w-full mx-1">
      <div class="">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <div class="flex-1 block border rounded-lg sm:w-full md:w-1/4 lg:w-1/6 lg:w-1/6 w-full mx-1">
      <div class="">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <div class="flex-1 block border rounded-lg sm:w-full md:w-1/4 lg:w-1/6 lg:w-1/6 w-full mx-1">
      <div class="">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
    <div class="flex-1 block border rounded-lg sm:w-full md:w-1/4 lg:w-1/6 lg:w-1/6 w-full mx-1">
      <div class="">
        <img class="rounded-lg w-fit m-auto" src="https://i.imgflip.com/20vcet.jpg">
        <h1 class="text-xl w-fit m-auto">Mamamia</h1>
        <h1 class="text-sm w-fit m-auto">Test bobo gagola</h1>
        <div class="w-fit m-auto ">
          <button class="my-1 px-3 py-1 rounded-lg bg-primary text-white">order!</button>
        </div>
      </div>
    </div>
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
        <div class="relative flex flex-auto p-4" data-te-modal-body-ref>
          <!-- in-cart-item -->
          <div class="block w-full rounded-lg bg-white text-left shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <!-- menu item -->
            <div class="p-6 flex flex-row">
              <div class="w-1/2 sm:w-full mx-1">
                <img class="w-fit  rounded-lg m-auto" src="https://i.imgflip.com/20vcet.jpg">
              </div>
              <p class="text-base text-neutral-600 dark:text-neutral-200 mx-1">
                This is some text within a card body.
              </p>
              <div class="flex flex-col w-fit mx-auto">
                <button class="mx-auto">
                  <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 45.402 45.402" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <g>
                        <path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141 c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27 c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435 c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z"></path>
                      </g>
                    </g>
                  </svg>
                </button>
                <div class="text-center mx-auto">
                  <input class="text-center w-1/6 sm:1/6" value="1">
                </div>
                <button class="mx-auto">
                  <svg width="16px" height="16px" viewBox="0 -12 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <title>minus</title>
                      <desc>Created with Sketch Beta.</desc>
                      <defs> </defs>
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-414.000000, -1049.000000)" fill="#000000">
                          <path d="M442,1049 L418,1049 C415.791,1049 414,1050.79 414,1053 C414,1055.21 415.791,1057 418,1057 L442,1057 C444.209,1057 446,1055.21 446,1053 C446,1050.79 444.209,1049 442,1049" id="minus" sketch:type="MSShapeGroup"> </path>
                        </g>
                      </g>
                    </g>
                  </svg>
                </button>
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