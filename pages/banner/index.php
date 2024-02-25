<?php session_start()?>
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
  <?php if(isset($_SESSION['userID'])) {?>
  <span class="my-5">
    <div class="rounded-lg border dark:border-neutral-600">
      <div class="p-4">
        <div class="sm:flex sm:items-start">
          <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto pl-0 sm:overflow-y-suto max-h-64" role="tablist" data-te-nav-ref="">
            <!-- Selector -->
            <li role="presentation" class="flex-grow text-center">
              <a href="#tabs-home03" 
              class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
              data-te-toggle="pill"
              data-te-target="#tabs-home03"
              data-te-nav-active=""
              role="tab"
              aria-controls="tabs-home03"
              aria-selected="true"
              >Home</a>
            </li>
            <li role="presentation" class="flex-grow text-center">
              <a href="#tabs-profile03" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-profile03" role="tab" aria-controls="tabs-profile03" aria-selected="false"
              >Profile</a>
            </li>
            <li role="presentation" class="flex-grow text-center">
              <a href="#tabs-messages03" class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-messages03" role="tab" aria-controls="tabs-messages03" aria-selected="false"
              >Messages</a>
            </li>
          </ul>
          <!-- Banner Showcase -->
          <div class="my-2 grow">
            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-home03" role="tabpanel" aria-labelledby="tabs-home-tab03" data-te-tab-active="">
              <div class="flex justify-center items-center">
                <h2 class="text-2xl font-bold">Banner Name</h2>
              </div>
              <div class="flex justify-center items-center">
                <p class="text-xl">Banner Description</p>
              </div>
              <!-- rate table -->
              <div class="flex flex-col justify-center items-center">
                <p>Rates</p>
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-1/2 text-center text-sm font-light">
                        <thead
                          class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                          <tr>
                            <th scope="col" class=" px-6 py-4">#</th>
                            <th scope="col" class=" px-6 py-4">First</th>
                            <th scope="col" class=" px-6 py-4">Last</th>
                            <th scope="col" class=" px-6 py-4">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                            <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                            <td class="whitespace-nowrap  px-6 py-4">Otto</td>
                            <td class="whitespace-nowrap  px-6 py-4">@mdo</td>
                          </tr>
                          <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                            <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                            <td class="whitespace-nowrap  px-6 py-4">Thornton</td>
                            <td class="whitespace-nowrap  px-6 py-4">@fat</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-profile03" role="tabpanel" aria-labelledby="tabs-profile-tab03">
              Tab 2 content
            </div>
            <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-messages03" role="tabpanel" aria-labelledby="tabs-profile-tab03">
              Tab 3 content
            </div>
          </div>
        </div>

      </div>
    </div>
  </span>
  <?php } else{?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script src="/asset/script/sweetalert.js"></script>
                    <script>
                        Warning.fire({
                            icon: "warning",
                            title: "คำเตือน",
                            text: "คุณยังไม่ได้เข้าสู่ระบบ"
                        });
                    </script>
                <?php }?>
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
