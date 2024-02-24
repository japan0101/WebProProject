<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

  <?php include("./../../asset/script/tailwind.php")?>
</head>

<body>
  <!-- nav bar -->
  <nav class="relative flex w-full flex-wrap justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:py-4 content-center">
    <div class="flex w-full flex-wrap items-center justify-between px-3">
      <!-- menu -->
      <div class="relative flex items-center">
        <button class="text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" onclick="openmenu()">
          <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path d="M4 18L20 18" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
              <path d="M4 12L20 12" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
              <path d="M4 6L20 6" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
            </g>
          </svg>
      </div>
      <div class="flex place-self-center">
        <!-- insert logo -->
        <a class="text-xl font-semibold text-neutral-800 dark:text-neutral-200" href="#">Navbar</a>
      </div>
      <div class="relative flex items-center">
        <!--cart button -->
        <button class="text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" onclick="opencart()">
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
  <div class="relative flex flex-col">
    <div class="block rounded-lg bg-grey drop-shadow border justify-center w-full mb-3">
      <div class="flex flex-row mb-3">
        <img class="mx-2 my-2 rounded-t-sm w-1/4 h-1/12" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0MR9TseS5RMXA3byameEjERjSGWbg2gtbRg&usqp=CAU" />
        <div>
          <h1 class="text-lg font-bold">Meatballs</h1>
          <p class="text-sm">minced meat shaped in ball like with gravy sauce.</p>
        </div>
        <button class="w-full bg-teal-900 text-white rounded-lg">Order</button>
      </div>
    </div>

    <div class="block rounded-lg bg-grey drop-shadow border justify-center w-full mb-3">
      <div class="flex flex-row mb-3 ">
        <img class="mx-2 my-2 rounded-t-sm w-1/4 h-1/12" src="data:image/jpeg;base64,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" />
        <div>
          <h1 class="text-lg font-bold ">Mamamia</h1>
          <p class="text-sm">don't look at the full size please thank you.</p>
        </div>
        <button class="w-full bg-teal-900 text-white rounded-lg">Order</button>
      </div>
    </div>
  </div>

  <?php include("./../../asset/script/tw_element.php")?>
</body>

</html>