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
        <div class="flex md:flex-row sm:flex-col flex-col blur-effect rounded-lg p-8 bg-white gap-3">
            <!-- Create Menu -->
            <div class="flex-1">
                <form class="" action="/backend/database/manager.php" method="post" enctype="multipart/form-data">
                    <h2 class="text-2xl  mt-0">สร้างเมนู</h2>
                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="name" name="name" placeholder="ชื่อเมนู" required/>
                        <label for="name"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อเมนู
                        </label>
                    </div>

                    <div class="relative mb-3">
                        <label for="select"></label><select data-te-select-init id="select" name="category">
                            <option value="" hidden select></option>
                        </select>
                        <label data-te-select-label-ref>ประเภทเมนู</label>
                    </div>

                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="number"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="price" name="price" placeholder="ราคา" min='0' required/>
                        <label for="price"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ราคา
                        </label>
                    </div>

                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <textarea
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="description" name="description" rows="3" placeholder="คำอธิบาย"></textarea>
                        <label for="description"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">คำอธิบาย
                            (Optional)</label>
                    </div>


                    <div class="mb-3">
                        <label for="formFileLg" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">รูปภาพเมนู
                            .webp (900x600)</label>
                        <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                               name="image" id="image" type="file" accept=".webp" required/>
                    </div>

                    <button name="case" value="create_menu" type="submit" data-te-ripple-init
                            data-te-ripple-color="light"
                            class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                        เพิ่มเมนู
                    </button>
                </form>
            </div>


            <!-- Create Category Menu -->
            <div class="flex-1">
                <form action="/backend/database/manager.php" method="post">
                    <h2 class="text-2xl mt-0">สร้างประเภทเมนู</h2>

                    <div class="relative mb-3" data-te-input-wrapper-init>
                        <input type="text"
                               class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="nameCategory" name="name" placeholder="ชื่อเมนู" required/>
                        <label for="name"
                               class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ประเภทเมนู
                        </label>
                    </div>

                    <button name="case" value="create_category" type="submit" data-te-ripple-init
                            data-te-ripple-color="light"
                            class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                        เพิ่มประเภทเมนู
                    </button>
                </form>

            </div>
        </div>

        <div class="flex flex-col gap-6">
            <div class="flex flex-col blur-effect rounded-lg p-8 bg-white relative overflow-hidden"
                 data-te-perfect-scrollbar-init>
                <h2 class="text-2xl mt-0">เมนูต่าง ๆ</h2>
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm font-light" id="displayMenu">
                                <thead class="font-medium dark:border-neutral-500">
                                <tr class="border-b dark:border-neutral-500">
                                    <th scope="col" class="px-6 py-4">ชื่อประเภท</th>
                                    <th scope="col" class="px-6 py-4">ชื่อเมนู</th>
                                    <th scope="col" class="px-6 py-4">ราคา</th>
                                    <th scope="col" class="px-6 py-4">คำอธิบาย</th>
                                    <th scope="col" class="px-6 py-4">รูปภาพเมนู</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 blur-effect rounded-lg p-8 bg-white">
                <h2 class="text-2xl mt-0">ประเภทเมนูต่าง ๆ</h2>
                <div class="m-3">
                    <table class="table-auto text-left text-sm font-light" id="display_category">
                        <tr class="border-b font-medium dark:border-neutral-500">
                            <th scope="col" class="px-6 py-4">ประเภทเมนู</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </section>
</main>


<script>
    // Select Category
    const select = document.getElementById("select")
    // Category
    const display_category = document.getElementById("display_category")
    fetch("./../../backend/database/manager.php?case=menu_category").then(e => e.json()).then(payload => {
        payload.forEach(item => {
            let row = display_category.insertRow(-1)
            let col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['name']

            let opt = document.createElement("option")
            opt.value = item['categoryID']
            opt.innerHTML = item['name']
            select.appendChild(opt)
        })
    })
</script>

<!-- Fetch Menus -->
<script>
    // Customer
    const tableMenu = document.getElementById("displayMenu")
    fetch("./../../backend/database/customer.php?case=allmenus").then(e => e.json()).then(payload => {
        payload.forEach(item => {
            let row = tableMenu.insertRow(-1)
            row.className = "border-b dark:border-neutral-500"

            let col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4 font-medium"
            col.innerHTML = item['categoryName']

            col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['menuName']

            col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['price']

            col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['description'] == "" ? "ไม่มีคำอธิบาย" : item['description']
            col.className += item['description'] == "" ? " opacity-50" : ""

            col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4 m-4"
            col.innerHTML = `<img class="w-full" src="../../assets/images/menus/${item['image']}" alt="">`
        })
    })
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./../../assets/scripts/sweetalert.js"></script>
<?php
if (isset($_SESSION['result'])) { ?>
    <script>
        <?php $fire = false; ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "create_menu")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "create_menu")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>



        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "create_category")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "create_category")) { ?>
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