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
include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/navCustomer.php") ?>
<?php
if (isset($_SESSION['memberName'])) { ?>
    <span class="my-5">
      <div class="rounded-lg border dark:border-neutral-600 mt-7">
        <div class="p-4">
          <div class="sm:flex sm:items-start">
            <ul class="mr-4 flex list-none sm:flex-col overflow-x-auto pl-0 sm:overflow-y-suto max-h-64" id="bannerSel"
                role="tablist" data-te-nav-ref>
              <!-- Selector -->
              <li role="presentation" class="flex-grow text-center">
                <a href="#tabs-home03" class="my-2 block border-x-0 data-[te-nav-active]:border-b-2 border-t-0  px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400" data-te-toggle="pill" data-te-target="#tabs-home03" data-te-nav-active role="tab" aria-controls="tabs-home03" aria-selected="true">แต้มของคุณ</a>
              </li>

            </ul>
              <!-- Banner Showcase -->
            <div class="my-2 grow" id="contentHolder">

              <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                   id="tabs-home03" role="tab" aria-labelledby="tabs-home-tab03" data-te-tab-active="">
                <div class="flex justify-center items-center text-2xl font-bold">
                  คุณมีแต้มอยู่
                </div>
                <div class="text-xl flex justify-center items-center">
                  <input type="text"
                         class="text-center my-3 peer block min-h-[auto] w-1/4 rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                         id="phoneNumber" value="<?php
                  echo $_SESSION['points'] ?>">

                </div>
                <div class="text-xl flex justify-center items-center">แต้ม</div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </span>
    <button type="button"
            class="hidden inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-toggle="modal" data-te-target="#gachaId" data-te-ripple-init data-te-ripple-color="light">
        Top Left
    </button>

    <div data-te-modal-init
         class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
         id="gachaId" tabindex="-1" aria-labelledby="gachaIdLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
             class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
            <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">

                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="gachaIdLabel">
                        ตารางความหน้าจะเป็นของ {gacha.gachaName}
                    </h5>

                    <button type="button"
                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!--Modal body-->
                <div class="relative flex-auto p-4" data-te-modal-body-ref>

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-hidden">
                                    <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500 max-h-72 overscroll-contain overflow-y-auto">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                                #
                                            </th>
                                            <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                                ระดับ
                                            </th>
                                            <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                                ชื่อเมนู
                                            </th>
                                            <th scope="col" class="border-r px-6 py-4 dark:border-neutral-500">
                                                ส่วนลด
                                            </th>
                                            <th scope="col" class="px-6 py-4">
                                                เปอร์เซ็นต์
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="table_body_gachaId">

                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                {gacha.gachaID}
                                            </td>
                                            <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                {gacha.rarity}
                                            </td>
                                            <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                {gacha.menuName}
                                            </td>
                                            <td class="whitespace-nowrap border-r px-6 py-4">
                                                {gacha.rarity}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                {%%%}
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <form action="/backend/database/customer.php" method="post" id="getCoupon">
      <input type="hidden" name="case" value="generateCoupon">
    </form>
    <script>
        fetch("/backend/database/customer.php?case=banner").then(e => e.json()).then(payload => {
            selectorContainer = document.getElementById('bannerSel');
            contentContainer = document.getElementById('contentHolder');
            payload.forEach(bannerObj => {
                selList = document.createElement('li');
                selList.setAttribute('role', 'presentation');
                selList.className = 'flex-grow text-center'

          selector = document.createElement('a');
          selector.className = "my-2 block border-x-0 data-[te-nav-active]:border-b-2 border-t-0  px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
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
          randButton.setAttribute('onclick', 'randomCoupon(' + bannerObj['gachaID'] + ', ' + bannerObj['cost'] + ')')
          randButton.innerHTML = "สุ่มบัตรลด"

                probButton = document.createElement('button');
                probButton.setAttribute('type', 'button');
                probButton.className = "inline-block rounded-full border-2 border-dark-50 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-dark-50 transition duration-150 ease-in-out hover:border-dark-100 hover:bg-dark-500 hover:bg-opacity-10 hover:text-dark-100 focus:border-dark-100 focus:text-dark-100 focus:outline-none focus:ring-0 active:border-dark-200 active:text-dark-200 dark:hover:bg-dark-100 dark:hover:bg-opacity-10"
                probButton.setAttribute("data-te-ripple-init", "");
                probButton.setAttribute("data-te-toggle", "modal");
                probButton.setAttribute("data-te-target", "#prob_" + bannerObj['gachaID']);
                probButton.innerHTML = "ดูความน่าจะเป็น";

                buttonsNode.appendChild(randButton);
                buttonsNode.appendChild(probButton);
                contentBody.appendChild(buttonsNode);

                contentContainer.appendChild(contentBody);
                // --------------------------------------------------------------------------------------------
                modalContainer1 = document.createElement('div');
                modalContainer1.setAttribute('data-te-modal-init', '');
                modalContainer1.className = "fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                modalContainer1.id = "prob_" + bannerObj['gachaID'];
                modalContainer1.setAttribute('tabindex', '-1');
                modalContainer1.setAttribute('aria-labelledby', "prob_" + bannerObj['gachaID'] + "Lable");
                modalContainer1.setAttribute('aria-hidden', 'true');

                modalContainer2 = document.createElement('div');
                modalContainer2.setAttribute('data-te-modal-dialog-ref', '');
                modalContainer2.className = "pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]";

                modalContainer3 = document.createElement('div');
                modalContainer3.className = "min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600";

                modalTitleCon = document.createElement('div');
                modalTitleCon.className = "flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50";

                modalTitle = document.createElement('h5');
                modalTitle.className = "text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200";
                modalTitle.id = "prob_" + bannerObj['gachaID'] + "Lable";
                modalTitle.innerHTML = "ตารางความน่าจะเป็นของ " + bannerObj['name'];

                exitModalBtn = document.createElement("button");
                exitModalBtn.setAttribute('type', 'button');
                exitModalBtn.className = "box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none";
                exitModalBtn.setAttribute('data-te-modal-dismiss', '');
                exitModalBtn.setAttribute('aria-label', 'Close');
                exitModalBtn.innerHTML = `              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>`

                modalBodyCon1 = document.createElement('div');
                modalBodyCon1.className = "relative flex-auto p-4"
                modalBodyCon1.setAttribute("data-te-modal-body-ref", '');

                modalBodyCon2 = document.createElement('div');
                modalBodyCon2.className = "flex flex-col";

                modalBodyCon3 = document.createElement('div');
                modalBodyCon3.className = "overflow-x-auto sm:-mx-6 lg:-mx-8";

                modalBodyCon4 = document.createElement('div');
                modalBodyCon4.className = "inline-block min-w-full py-2 sm:px-6 lg:px-8";

                modalBodyCon5 = document.createElement('div');
                modalBodyCon5.className = "overflow-x-hidden"

                rates = document.createElement('div')
                rates.className = "text-center"
                rates.innerHTML = "โอกาศที่จะได้คูปองส่วนลด<br>ระดับ Common คือ 70%<br>ระดับ Uncommon คือ 15%<br>ระดับ Rare คือ 11%<br>ระดับ Epic คือ 3.4%<br>ระดับ Legendary คือ 0.5%<br>ระดับ Mythic คือ 0.01%<br>"


                table = document.createElement("table");
                table.className = "min-w-full border text-center text-sm font-light dark:border-neutral-500 max-h-72 overscroll-contain overflow-y-auto"

                tableHead = document.createElement("thead");
                tableHead.className = "border-b font-medium dark:border-neutral-500";

                headRow = document.createElement("tr");

                headId = document.createElement("th");
                headId.setAttribute('scope', 'col');
                headId.className = "border-r px-6 py-4 dark:border-neutral-500";
                headId.innerHTML = "#"

                headRa = document.createElement("th");
                headRa.setAttribute('scope', 'col');
                headRa.className = "border-r px-6 py-4 dark:border-neutral-500";
                headRa.innerHTML = "ระดับ"

                headMe = document.createElement("th");
                headMe.setAttribute('scope', 'col');
                headMe.className = "border-r px-6 py-4 dark:border-neutral-500";
                headMe.innerHTML = "ชื่อเมนู"

                headDi = document.createElement("th");
                headDi.setAttribute('scope', 'col');
                headDi.className = "px-6 py-4";
                headDi.innerHTML = "ส่วนลด"

                tableBody = document.createElement('tbody');
                tableBody.id = "table_body_" + bannerObj['gachaID']

          modalContainer1.appendChild(modalContainer2);
          modalContainer2.appendChild(modalContainer3);
          modalContainer3.appendChild(modalTitleCon);
          modalTitleCon.appendChild(modalTitle);
          modalTitleCon.appendChild(exitModalBtn);
          modalContainer3.appendChild(modalBodyCon1);
          modalBodyCon1.appendChild(modalBodyCon2);
          modalBodyCon2.appendChild(modalBodyCon3);
          modalBodyCon3.appendChild(modalBodyCon4);
          modalBodyCon4.appendChild(modalBodyCon5);
          modalBodyCon5.appendChild(rates);
          modalBodyCon5.appendChild(table);
          table.appendChild(tableHead);
          tableHead.appendChild(headRow);
          headRow.appendChild(headId);
          headRow.appendChild(headRa);
          headRow.appendChild(headMe);
          headRow.appendChild(headDi);
          table.appendChild(tableBody);
          document.body.appendChild(modalContainer1)
        });
        fetch("/backend/database/customer.php?case=getrate").then(e => e.json()).then(payload => {
          payload.forEach(itemObj => {
            table = document.getElementById("table_body_" + itemObj['gachaID']);

                    row = document.createElement('tr');
                    row.className = "border-b dark:border-neutral-500"

                    idData = document.createElement('td');
                    idData.className = "whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500"
                    idData.innerHTML = itemObj['gachaID']

                    rareData = document.createElement('td');
                    rareData.className = "whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500"
                    rareData.innerHTML = itemObj['rarity']

                    nameData = document.createElement('td');
                    nameData.className = "whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500"
                    nameData.innerHTML = itemObj['menuName']

                    discountData = document.createElement('td');
                    discountData.className = "whitespace-nowrap px-6 py-4"
                    discountData.innerHTML = itemObj['discount'] * 100 + "%"

                    row.appendChild(idData);
                    row.appendChild(rareData);
                    row.appendChild(nameData);
                    row.appendChild(discountData);
                    table.appendChild(row);
                });
            });
        });

        function randomRarity() {
            number = Math.random();
            if (number < 1 && number > 0.3) {
                return 'COMMON'
            } else if (number > 0.15) {
                return 'UNCOMMON';
            } else if (number > 0.04) {
                return 'RARE';
            } else if (number > 0.006) {
                return 'EPIC';
            } else if (number > 0.001) {
                return 'LEGENDARY';
            } else {
                return 'MYTHIC';
            }
        }

      function randomCoupon(banner_id, cost) {
        if (<?php echo $_SESSION['points'] ?> >= cost) {
          rarity = randomRarity();
          Swal.fire({
            title: "คุณได้รับ",
            text: "คูปองระดับ " + rarity,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "ดูเมนูที่ได้รับ",
            allowOutsideClick: false
          }).then((result) => {
            if (result.isConfirmed) {
              fetch("/backend/database/customer.php?case=getgachaitem&banner_id=" + banner_id + "&rarity='" + rarity + "'").then(e => e.json()).then(payload => {
                recieved = payload[Math.floor(Math.random() * payload.length)];
                Swal.fire({
                  title: "คูปองของคุณ",
                  text: "ใช้ลดราคา " + recieved['menuName'] + " " + recieved['discount'] * 100 + " %",
                  icon: "info",
                  confirmButtonColor: "#3085d6",
                  confirmButtonText: "รับคูปอง",
                  allowOutsideClick: false
                }).then((result) => {
                  if (result.isConfirmed) {
                    const form = document.getElementById('getCoupon');
                    let disc = document.createElement("input")
                    disc.name = "discount"
                    disc.value = recieved['discount']
                    disc.className = "hidden"
                    let menu = document.createElement("input")
                    menu.name = "menuID"
                    menu.value = recieved['menuID']
                    menu.className = "hidden"
                    let costInput = document.createElement("input")
                    costInput.name = "cost"
                    costInput.value = cost
                    costInput.className = "hidden"
                    form.append(disc)
                    form.append(menu)
                    form.append(costInput)
                    form.submit()
                  }
                })
              });
            }
          });
        }

      }
    </script>
    <?php
    if (isset($_SESSION['result'])) { ?>
      <script>
        <?php $fire = false; ?>
        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "generateCoupon")) { ?>
          Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
          });
          <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "generateCoupon")) { ?>
          Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
          })
        <?php $fire = true;
        } ?>

        <?php if ($fire)
          unset($_SESSION['result']); ?>
      </script>
    <?php
    } ?>
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
