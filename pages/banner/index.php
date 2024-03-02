<?php
session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LeawTaeApp</title>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tailwind.php") ?>

</head>

<body>

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/nav.php") ?>
<?php
if (isset($_SESSION['userID'])) { ?>
    <span class="my-5">
      <div class="rounded-lg border dark:border-neutral-600 mt-7">
        <div class="p-4">
          <div class="sm:flex sm:items-start">
            <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto pl-0 sm:overflow-y-suto max-h-64" id="bannerSel"
                role="tablist" data-te-nav-ref>
              <!-- Selector -->
              <li role="presentation" class="flex-grow text-center">
                <a href="#tabs-home03"
                   class="my-2 block px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:bg-gray-100 data-[te-nav-active]:text-primary data-[te-nav-active]:border-b-2 border-primary dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
                   data-te-toggle="pill" data-te-target="#tabs-home03" data-te-nav-active role="tab"
                   aria-controls="tabs-home03" aria-selected="true">Home</a>
              </li>
            </ul>
              <!-- Banner Showcase -->
            <div class="my-2 grow" id="contentHolder">
              <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                   id="tabs-home03" role="tab" aria-labelledby="tabs-home-tab03" data-te-tab-active="">
                <div class="flex justify-center items-center text-2xl font-bold">
                  Banner Name
                </div>
                <div class="flex justify-center items-center">
                  <img src="">
                </div>
                <div class="text-xl flex justify-center items-center">
                  Banner Description
                </div>
                  <!-- buttons -->
                <div class="flex justify-center items-center">
                  <button type="button"
                          class="inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                          data-te-ripple-init data-te-toggle="modal" data-te-target="#regisModal">
                    สุ่มบัตรลด
                  </button>
                  <button type="button"
                          class="inline-block rounded-full border-2 border-dark-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-dark-50 transition duration-150 ease-in-out hover:border-dark-100 hover:bg-dark-500 hover:bg-opacity-10 hover:text-dark-100 focus:border-dark-100 focus:text-dark-100 focus:outline-none focus:ring-0 active:border-dark-200 active:text-dark-200 dark:hover:bg-dark-100 dark:hover:bg-opacity-10"
                          data-te-ripple-init data-te-toggle="modal" data-te-target="#loginModal">
                    ดูความหน้าจะเป็น
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </span>
    <script>
        fetch("/backend/database/customer.php?case=banner").then(e => e.json()).then(payload => {
            selectorContainer = document.getElementById('bannerSel');
            contentContainer = document.getElementById('contentHolder');
            payload.forEach(bannerObj => {
                selList = document.createElement('li');
                selList.setAttribute('role', 'presentation');
                selList.className = 'flex-grow text-center'

                selector = document.createElement('a');
                selector.className = "my-2 block border-x-0 border-b-2 border-t-0  px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                selector.setAttribute('href', bannerObj['name'].concat('-tab'));
                selector.setAttribute('data-te-toggle', 'pill');
                selector.setAttribute('data-te-target', '#' + 'tab-' + bannerObj['gachaID']);
                selector.setAttribute('role', 'tab');
                selector.setAttribute('aria-controls', 'tab-' + bannerObj['gachaID']);
                selector.setAttribute('aria-selected', 'true');
                selector.innerHTML = bannerObj['name']
                selList.appendChild(selector);
                selectorContainer.appendChild(selList);

                contentBody = document.createElement('div');
                contentBody.className = "hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block";
                contentBody.id = 'tab-' + bannerObj['gachaID'];
                contentBody.setAttribute('role', 'tabpanel');
                contentBody.setAttribute('aria-labelledby', 'tab-' + bannerObj['gachaID']);

                titleNode = document.createElement('div');
                titleNode.className = "flex justify-center items-center text-2xl font-bold";
                titleNode.innerHTML = bannerObj['name'];
                contentBody.appendChild(titleNode);

                imageNode = document.createElement('div');
                imageNode.className = "flex justify-center items-center"
                image = '';
                imageNode.innerHTML = `<img src="${image}">`
                contentBody.appendChild(imageNode);

                desNode = document.createElement('div')
                desNode.className = 'text-xl flex justify-center items-center text-center';
                desNode.innerHTML = bannerObj['description'] + '<br>ใช้แต้ม: ' + bannerObj['cost']
                contentBody.appendChild(desNode)

                buttonsNode = document.createElement('div');
                buttonsNode.className = "flex justify-center items-center"
                randButton = document.createElement('button');
                randButton.setAttribute('type', 'button');
                randButton.className = "inline-block rounded-full bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                randButton.setAttribute("data-te-ripple-init", "");
                randButton.innerHTML = "สุ่มบัตรลด"
                probButton = document.createElement('button');
                probButton.setAttribute('type', 'button');
                probButton.className = "inline-block rounded-full border-2 border-dark-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-dark-50 transition duration-150 ease-in-out hover:border-dark-100 hover:bg-dark-500 hover:bg-opacity-10 hover:text-dark-100 focus:border-dark-100 focus:text-dark-100 focus:outline-none focus:ring-0 active:border-dark-200 active:text-dark-200 dark:hover:bg-dark-100 dark:hover:bg-opacity-10"
                probButton.setAttribute("data-te-ripple-init", "");
                probButton.innerHTML = "ดูความหน้าจะเป็น";
                buttonsNode.appendChild(randButton);
                buttonsNode.appendChild(probButton);
                contentBody.appendChild(buttonsNode);

                contentContainer.appendChild(contentBody);
            });
        });
    </script>
<?php
} else { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/scripts/sweetalert.js"></script>
    <script>
        Warning.fire({
            icon: "warning",
            title: "คำเตือน",
            text: "คุณยังไม่ได้เข้าสู่ระบบ"
        });
    </script>
    <?php
} ?>

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>

</body>

</html>
