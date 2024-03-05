<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != "STAFF" && $_SESSION['role'] != "MANAGER")
        header("Location: ./../../");
} else header("Location: ./../../");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
if ($isAuth && ($_SESSION['role'] == "STAFF" || $_SESSION['role'] == "MANAGER")) { ?>
<!--Tabs navigation-->
<br><br>
<ul class="place-content-center mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0" role="tablist" data-te-nav-ref>
    <li role="presentation">
        <a href="#tabs-table"
           class="my-2 block px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:bg-gray-100 data-[te-nav-active]:text-primary data-[te-nav-active]:border-b-2 border-primary dark:bg-neutral-700 dark:text-white dark:data-[te-nav-active]:text-primary-700"
           data-te-toggle="pill" data-te-target="#tabs-table" data-te-nav-active role="tab" aria-controls="tabs-table"
           aria-selected="true">โต๊ะ</a>
    </li>
    <li role="presentation">
        <a href="#tabs-queue"
           class="my-2 block border-x-0 border-t-0 px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-b-2 border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
           data-te-toggle="pill" data-te-target="#tabs-queue" role="tab" aria-controls="tabs-queue"
           aria-selected="false">คิวการรอ</a>
    </li>
</ul>

<!--Tabs content-->
<div class="mb-6">

    <div class="bg-white rounded-lg shadow p-3 w-fit m-auto place-content-center hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
         id="tabs-table" role="tabpanel" aria-labelledby="tabs-table-tab" data-te-tab-active>
        <form action="./../../backend/database/staff.php" method="post">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8" data-te-datatable-init>
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead>
                                <tr class="border-b font-medium dark:border-neutral-500">
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">เลขโต๊ะ</th>
                                    <th scope="col" class="px-6 py-4">โค้ดโต๊ะ</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">สมาชิก</th>
                                    <th scope="col" class="px-6 py-4">แต้มสะสม</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">ความจุที่นั่ง</th>
                                    <th scope="col" class="px-6 py-4">สถานะ</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $data = array();
                                include '../../backend/connectDatabase.php';
                                $database->custom("SELECT tableID, code, userID, phoneNumber, points, capacity, tables.status FROM tables LEFT JOIN users USING (userID)");
                                foreach ($database->getResult()['payload'] as $item) {
                                    $data[] = $item; ?>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->tableID ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->code ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->phoneNumber ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->points ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->capacity ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->status ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            if ($item->status == "RESERVED")
                                                echo "<button type='button' data-te-toggle='modal' data-te-target='#bill{$item->tableID}' data-te-ripple-init data-te-ripple-color='light' class='inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] disabled:opacity-70'>จ่ายบิล</button>";
                                            else echo "<button type='button' data-te-ripple-init data-te-ripple-color='light' class='inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] disabled:opacity-70' disabled>จ่ายบิล</button>" ?>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <?php
                                            if ($item->status == "AVAILABLE")
                                                echo "<button type='button' onclick='randomCode(this, {$item->tableID})' data-te-ripple-init data-te-ripple-color='light' class='inline-block rounded bg-primary text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200 disabled:opacity-70'>สุ่มโค้ด</button>";
                                            else echo "<button type='button' data-te-ripple-init data-te-ripple-color='light' class='inline-block rounded bg-primary text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200 disabled:opacity-70' disabled>สุ่มโค้ด</button>";
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        let select = "";
    </script>

    <?php
    foreach ($data as $item) { ?>

        <form action="./../../backend/database/staff.php" method="post">

            <div data-te-modal-init
                 class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                 id="bill<?php
                 echo $item->tableID; ?>" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true"
                 role="dialog">
                <div data-te-modal-dialog-ref
                     class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                    <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                            <!--Modal title-->
                            <div class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                 id="exampleModalCenterTitle">
                                <div>บิลโต๊ะ <?php
                                    echo $item->tableID ?></div>
                                <div class="text-base">สมาชิก: <?php
                                    echo $item->phoneNumber != "" ? $item->phoneNumber : "-"; ?></div>
                            </div>
                            <!--Close button-->
                            <button type="button"
                                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                    data-te-modal-dismiss aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <!--Modal body-->
                        <div class="relative p-4">
                            <p class="font-bold">รายการอาหารที่สั่ง</p>
                            <div class="flex flex-col m-auto opacity-75">

                                <?php
                                $total = 0;
                                $total_item = array();

                                $discount = array();
                                $database->custom("SELECT menuID, SUM(amount) as amount, menuName, price FROM orders LEFT JOIN menus USING (menuID) WHERE status = 'SERVED' AND tableID={$item->tableID} AND billID is null GROUP BY menuID");
                                foreach ($database->getResult()['payload'] as $item2) {
                                    $discount["{$item2->menuID}"] = "{$item2->menuName}";
                                    $total += $item2->amount * $item2->price;
                                    $total_item["{$item2->menuID}"] = $item2->amount * $item2->price; ?>

                                    <div class="flex flex-row flex-1">
                                        <div class="flex-1"><?php
                                            echo "{$item2->menuName} ({$item2->price})" ?></div>
                                        <div class="flex-1"><?php
                                            echo "X{$item2->amount}" ?></div>
                                        <div class="flex-1 text-right"><?php
                                            echo $item2->amount * $item2->price . " บาท" ?></div>
                                    </div>

                                    <?php
                                } ?>

                                <hr>
                                <div class="flex flex-row flex-1 mt-1 text-red-400">
                                    <div class="flex-1" id="discountName"></div>
                                    <div class="flex-1"></div>
                                    <div class="flex-1 text-right" id="discountPrice"></div>
                                </div>

                                <div class="flex flex-row flex-1">
                                    <div class="flex-1">ราคารวม</div>
                                    <div class="flex-1"></div>
                                    <div class="flex-1 text-right" id="priceSum"><?php
                                        echo $total . " บาท" ?></div>
                                </div>

                            </div>


                            <div class="mt-5">
                                <div class="relative my-3">
                                    <label for="select"></label>
                                    <select data-te-select-init id="select_<?php
                                    echo $item->userID ?>" name="code" disabled>
                                        <option value="" hidden select></option>
                                    </select>
                                    <label data-te-select-label-ref>โค้ดส่วนลด</label>
                                </div>

                                <div class="relative my-3">
                                    <label for="select"></label>
                                    <select data-te-select-init name="paymentMethod" required>
                                        <option value="" hidden select></option>
                                        <option value="1">เงินสด</option>
                                        <option value="2">โอนเงิน</option>
                                    </select>
                                    <label data-te-select-label-ref>วิธีการจ่ายเงิน</label>
                                </div>
                            </div>

                            <input type="hidden" name="tableID" value="<?php
                            echo $item->tableID ?>">
                            <input type="hidden" name="total" id="total" value="<?php
                            echo $total ?>">
                            <input type="hidden" name="case" value="payBill">

                        </div>

                        <!--Modal footer-->
                        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                            <button type="button"
                                    class="inline-block rounded bg-success-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-success-700 transition duration-150 ease-in-out hover:bg-success-accent-100 focus:bg-success-accent-100 focus:outline-none focus:ring-0 active:bg-success-accent-200"
                                    data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                ยกเลิก
                            </button>
                            <button type="submit"
                                    class="ml-1 inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                                    data-te-ripple-init data-te-ripple-color="light">
                                ยืนยัน
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    <?php
    if (!is_null($item->userID)) { ?>

        <script>
            select = document.getElementById("<?php echo "select_" . $item->userID; ?>")
            let total_item = <?php echo json_encode($total_item) ?>;
            let menuDis = <?php echo json_encode($discount) ?>;

            fetch(`./../../backend/database/staff.php?case=couponUser&ID=<?php echo $item->userID ?>`).then(e => e.json()).then(payload => {

                payload.forEach(item => {
                    if (menuDis[item['menuID']] != undefined) {
                        select.disabled = false

                        let opt = document.createElement("option")
                        opt.value = JSON.stringify({
                            code: item["code"],
                            discount: item['discount'],
                            menuID: item['menuID']
                        })
                        opt.append(document.createTextNode(item['code']))
                        opt.setAttribute("data-te-select-secondary-text", `${menuDis[item['menuID']]} ลด ${Number(item['discount']) * 100}%`)
                        select.append(opt)
                    }
                })
            })

            const discountName = document.getElementById("discountName")
            const discountPrice = document.getElementById("discountPrice")
            const priceSum = document.getElementById("priceSum")

            const inp_total = document.getElementById("total")

            select.addEventListener("change", function () {
                let total = <?php echo $total; ?>;
                let data = JSON.parse(this.value);
                discountName.innerHTML = menuDis[data['menuID']];
                discountPrice.innerHTML = "-" + (total_item[data['menuID']] * data['discount']) + " บาท"
                priceSum.innerHTML = `${total - total_item[data['menuID']] * data['discount']} บาท`;

                inp_total.value = total - total_item[data['menuID']] * data['discount']
            })
        </script>

        <?php
    } ?>

        <?php
    } ?>

    <div class="bg-white rounded-lg shadow account-container p-5 w-fit m-auto hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
         id="tabs-queue" role="tabpanel" aria-labelledby="tabs-queue-tab">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="justify-center m-auto">

                            <form action="">
                                <div class="flex md:flex-row sm:flex-col flex-col md:gap-3">
                                    <div class="flex-1 relative mb-3 mt-1" data-te-input-wrapper-init>
                                        <input type="number"
                                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                               id="que" name="que" placeholder="จำนวนลูกค้า" min='0' max='99' required/>
                                        <label for="que"
                                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">จำนวนลูกค้า
                                        </label>
                                    </div>

                                    <div class="place-content-center mt-1">
                                        <button data-te-ripple-init data-te-ripple-color="light"
                                                class="px-3 py-1.5 rounded-lg bg-primary text-white" type="submit"
                                                onclick="addque()">
                                            เพิ่มคิว
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">หมายเลขคิว</th>
                                <th scope="col" class="px-6 py-4">จำนวนลูกค้า</th>
                            </tr>
                            </thead>
                            <tbody id="that_table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    } ?>
    <script>
        function inp_case(input, value, name) {
            input.value = value
            input.type = 'hidden'
            input.name = name
        }

        function bill(element, id) {
            let input = document.createElement("input")
            inp_case(input, 'payBill', 'case')
            element.form.appendChild(input);

            // การส่งให้ผ่านต้องเป็น Staff
            input = document.createElement("input")
            inp_case(input, id, "ID")
            element.form.appendChild(input)

            element.form.submit();
        }

        function randomCode(element, id) {
            let input = document.createElement("input")
            inp_case(input, 'randomTableCode', 'case')
            element.form.append(input);

            // การส่งให้ผ่านต้องเป็น Staff
            input = document.createElement("input")
            inp_case(input, id, "ID")
            element.form.appendChild(input)

            element.form.submit();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./../../assets/scripts/sweetalert.js"></script>
    <?php
    if (isset($_SESSION['result'])) { ?>
        <script>
            <?php $fire = false; ?>

            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "randomTableCode")) { ?>
            Toast.fire({
                icon: "success",
                title: "<?php echo $_SESSION['result']['message']; ?>",
            });
            <?php $fire = true; ?>

            <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "randomTableCode")) { ?>
            Toast.fire({
                icon: "error",
                title: "<?php echo $_SESSION['result']['message']; ?>",
            });
            <?php $fire = true;
            } ?>


            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "payBill")) { ?>
            Toast.fire({
                icon: "success",
                title: "<?php echo $_SESSION['result']['message']; ?>",
            });
            <?php $fire = true; ?>

            <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "payBill")) { ?>
            Toast.fire({
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

    <?php
    include("./../../assets/scripts/tw_element.php") ?>
    <script>
        var current_queue;

        if (localStorage.getItem('queue_table') == null) {
            var queue_table = {
                current_queue: 1,
                queue: []
            };
            current_queue = 1;
            localStorage.setItem('queue_table', JSON.stringify(queue_table));
        } else {
            var queue_table = JSON.parse(localStorage.getItem('queue_table'));
            current_queue = queue_table.current_queue;
        }
        queue_table.queue.forEach(function (queueItem) {
            let tbody = document.getElementById('that_table');
            let col3 = document.createElement('td');
            let col2 = document.createElement('td');
            let col1 = document.createElement('td');
            col3.innerHTML = '<form><button data-te-ripple-init data-te-ripple-color="light" class="px-3 py-2 rounded-lg bg-primary text-white" onclick="delque(' + queueItem.queue_number + ')">เรียกคิวแล้ว</button></form>'
            col1.innerHTML = '<p scope="col" class="px-6 py-4">' + queueItem.queue_number + '</p>';
            col2.innerHTML = '<p scope="col" class="px-6 py-4">' + queueItem.customer_amount + '</p>';
            let row = document.createElement('tr');
            row.append(col1);
            row.append(col2);
            row.append(col3);
            tbody.append(row);
        });

        function delque(number) {
            var indexToRemove = queue_table.queue.findIndex(function (item) {
                return item.queue_number === number;
            });
            if (indexToRemove !== -1) {
                queue_table.queue.splice(indexToRemove, 1);
            }
            localStorage.setItem('queue_table', JSON.stringify(queue_table));
        }

        function addque() {
            let customer_amount = document.getElementById('que').value;
            if (customer_amount != '' && customer_amount != null) {
                queue_table.queue.push({
                    "queue_number": current_queue,
                    "customer_amount": customer_amount
                });
                queue_table.current_queue++;
                current_queue++; // Increment current_queue
                localStorage.setItem('queue_table', JSON.stringify(queue_table));
            }
        }
    </script>

</body>

</html>