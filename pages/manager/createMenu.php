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
    <title>LaewTaeApp (Manager)</title>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tailwind.php") ?>
</head>

<body>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/component/navManager.php") ?>

<!-- ตาราง Create -->
<div class="flex flex-row mt-7 m-5">
    <!-- Create Menu -->
    <div class="flex-1">
        <form class="" action="/backend/database/manager.php" method="post">
            <h2 class="text-2xl">Create Menu</h2>
            <div class="relative mb-3" data-te-input-wrapper-init>
                <input type="text"
                       class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                       id="name" name="name" placeholder="ชื่อเมนู" required/>
                <label for="name"
                       class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ชื่อเมนู
                </label>
            </div>

            <div class="relative mb-3">
                <select data-te-select-init id="select" name="category">
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
                    .webp (900x600) (Optional)</label>
                <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                       id="image" type="file" accept=".webp"/>
            </div>

            <button name="case" value="create_menu" type="submit" data-te-ripple-init data-te-ripple-color="light"
                    class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                เพิ่มเมนู
            </button>
        </form>
    </div>


    <!-- Create Category Menu -->
    <div class="flex-1">
        <form class="m-3" action="/backend/database/manager.php" method="post">
            <h2 class="text-2xl">Create Category Menu</h2>
            <div class="relative mb-3" data-te-input-wrapper-init>
                <input type="text"
                       class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                       id="nameCategory" name="name" placeholder="ชื่อเมนู"/>
                <label for="name"
                       class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">ประเภทเมนู
                </label>
            </div>

            <button name="case" value="create_category" type="submit" data-te-ripple-init data-te-ripple-color="light"
                    class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]">
                เพิ่มประเภทเมนู
            </button>
        </form>


        <div class="m-3">
            <table class="min-w-full text-left text-sm font-light" id="display_category">
                <tr class="border-b font-medium dark:border-neutral-500">
                    <th scope="col" class="px-6 py-4">ประเภทเมนู</th>
                </tr>
            </table>
        </div>

    </div>
</div>

<div class="m-3">
    <h2 class="text-2xl">Menu</h2>
    <table class="min-w-full text-left text-sm font-light" id="display2">
        <tr class="border-b font-medium dark:border-neutral-500">
            <th scope="col" class="px-6 py-4">ชื่อประเภท</th>
            <th scope="col" class="px-6 py-4">ชื่อเมนู</th>
            <th scope="col" class="px-6 py-4">ราคา</th>
            <th scope="col" class="px-6 py-4">คำอธิบาย</th>
        </tr>
    </table>
</div>


<script>
    // Select Category
    const select = document.getElementById("select")
    // Category
    const display_category = document.getElementById("display_category")
    fetch("/backend/database/manager.php?case=menu_category").then(e => e.json()).then(payload => {
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
    const TBDisplay2 = document.getElementById("display2")
    fetch("/backend/database/customer.php?case=allmenus").then(e => e.json()).then(payload => {
        console.log(payload)
        payload.forEach(item => {
            let row = TBDisplay2.insertRow(-1)

            let col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['categoryName']

            col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['menuName']

            col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['price']

            col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['description']

            col = row.insertCell(-1)
            col.className = "whitespace-nowrap px-6 py-4"
            col.innerHTML = item['image']
        })
    })
</script>

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/scripts/tw_element.php") ?>
</body>

</html>