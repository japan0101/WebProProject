<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] != "MANAGER")
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
    <link rel="stylesheet" href="./../../assets/stylesheets/developers.css">
</head>

<body>
<?php
include("./../../assets/component/navManager.php") ?>
<main class="">
    <section class="body_container top-item flex flex-col gap-6">

        <!-- ตาราง Create -->
        <div class="flex flex-col gap-6">
            <div class="flex flex-col blur-effect rounded-lg p-8 bg-white relative overflow-hidden"
                 data-te-perfect-scrollbar-init>
                <h2 class="text-2xl mt-0">จัดการเมนู</h2>
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8" data-te-datatable-init>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm font-light" id="displayTable">
                                <thead>
                                <tr class="border-b font-medium dark:border-neutral-500">
                                    <th scope="col" class="px-6 py-4">ชื่อเมนู</th>
                                    <th scope="col" class="px-6 py-4">ราคา</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">คำอธิบาย</th>
                                    <th scope="col" class="px-6 py-4">ประเภทเมนู</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false">รูป</th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                    <th scope="col" class="px-6 py-4" data-te-sort="false"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include '../../backend/connectDatabase.php';
                                $data = array();
                                $database->custom("SELECT menuID, menuName, price, description, name as `categoryName`, image FROM menus LEFT JOIN menu_category USING (categoryID)");
                                foreach ($database->getResult()['payload'] as $item) {
                                    array_push($data, $item); ?>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->menuName ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->price ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->description ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><?php
                                            echo $item->categoryName ?></td>
                                        <td class="whitespace-nowrap px-6 py-4"><img class="md:w-full sm:w-0 w-0"
                                                                                     src="./../../assets/images/menus/<?php
                                                                                     echo $item->image ?>" alt=""></td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <button data-te-toggle="modal" data-te-target="#<?php
                                            echo "menu_modify{$item->menuID}" ?>" type="button" data-te-ripple-init
                                                    data-te-ripple-color="light"
                                                    class="inline-block rounded-full bg-primary px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                                                แก้ไขเมนู
                                            </button>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <button data-te-toggle="modal" data-te-target="#<?php
                                            echo "menu_delete{$item->menuID}" ?>" type="button" data-te-ripple-init
                                                    data-te-ripple-color="light"
                                                    class="inline-block rounded-full bg-danger px-4 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">
                                                ลบเมนู
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                unset($database);
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

<script>
    const select = []
</script>

<?php
foreach ($data as $item) { ?>
    <div data-te-modal-init
         class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
         id="menu_modify<?php
         echo $item->menuID ?>" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
             class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalCenterTitle">
                        แก้ไขเมนู
                    </h5>
                    <!--Close button-->
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
                <form class="p-5" action="./../../backend/database/manager.php" method="post" enctype="multipart/form-data">
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="name" name="name" placeholder="ชื่อเมนู" value="<?php
                        echo $item->menuName ?>" required/>
                        <label for="name"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อเมนู
                        </label>
                    </div>

                    <div class="relative mb-3">
                        <label for="select"></label>
                        <select data-te-select-init id="select_<?php
                        echo $item->menuID ?>" name="category">
                            <option value="" hidden select></option>
                        </select>
                        <label data-te-select-label-ref>ประเภทเมนู</label>
                    </div>

                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="number"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="price" name="price" placeholder="ราคา" min='0' value="<?php
                        echo $item->price ?>" required/>
                        <label for="price"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ราคา
                        </label>
                    </div>

                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <textarea
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="description" name="description" rows="3" placeholder="คำอธิบาย"><?php
                            echo $item->description ?></textarea>
                        <label for="description"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">คำอธิบาย
                            (Optional)</label>
                    </div>

                    <img src="./../../assets/images/menus/<?php
                    echo $item->image ?>" alt="">

                    <div class="mb-3">
                        <label for="formFileLg" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">รูปภาพเมนู
                            .webp (900x600)</label>
                        <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                               name="image" id="image" type="file" accept=".webp"/>
                    </div>

                    <input type="hidden" name="case" value="modify_menu">
                    <input type="hidden" name="ID" value="<?php
                    echo $item->menuID ?>">

                    <!--Modal footer-->
                    <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button type="button"
                                class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            ยกเลิก
                        </button>
                        <button type="submit"
                                class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light">
                            แก้ไขข้อมูล
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!--Vertically centered modal-->
    <div data-te-modal-init
         class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
         id="menu_delete<?php
         echo $item->menuID ?>" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
             class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!--Modal title-->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                        id="exampleModalCenterTitle">
                        ลบเมนู
                    </h5>
                    <!--Close button-->
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
                <form action="./../../backend/database/manager.php" method="post">
                    <div class="relative p-4">
                        <p>ต้องการลบเมนูทิ้งใช่หรือไม่?</p>
                    </div>

                    <input type="hidden" name="case" value="delete_menu">
                    <input type="hidden" name="ID" value="<?php
                    echo $item->menuID ?>">

                    <!--Modal footer-->
                    <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <button type="button"
                                class="inline-block rounded bg-red-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-red-700 transition duration-150 ease-in-out hover:bg-red-200 focus:bg-red-100 focus:outline-none focus:ring-0 active:bg-red-200"
                                data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                            ยกเลิก
                        </button>
                        <button type="submit"
                                class="ml-1 inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light">
                            ยืนยัน
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        select.push({
            id: document.getElementById("select_<?php echo $item->menuID ?>"),
            category: "<?php echo $item->categoryName ?>"
        })
    </script>
    <?php
}
?>

<script>
    fetch("./../../backend/database/manager.php?case=menu_category").then(e => e.json()).then(payload => {

        select.forEach(obj => {

            payload.forEach(item => {
                let opt = document.createElement("option")
                if (obj['category'] == item['name']) opt.selected = true
                opt.value = item['categoryID']
                opt.innerHTML = item['name']
                obj['id'].appendChild(opt)
            })
        })
    })
</script>

<script>
    function inp_case(input, value, name) {
        input.value = value
        input.type = 'hidden'
        input.name = name
    }

    // สร้าง Input Hidden ตอนกดส่ง Form
    function insertTable(element) {
        let input = document.createElement("input")
        inp_case(input, 'insertTable', 'case')
        element.form.append(input);

        element.form.submit();
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./../../assets/scripts/sweetalert.js"></script>
<?php
if (isset($_SESSION['result'])) { ?>
    <script>
        <?php $fire = false; ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "modify_menu")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "modify_menu")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>



        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "delete_menu")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "delete_menu")) { ?>
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
</body>

</html>