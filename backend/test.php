<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/script/tailwind.php") ?>
</head>

<body>

<div class="m-5">
    <!-- เพิ่มโต๊ะ Manager -->
    <h1 class="text-3xl">Manager</h1>
    <form class="m-3" action="/backend/database/manager.php" method="post">
        <h1 class="text-2xl">Create Table</h1>
        <label for="">Capacity: </label>
        <input class="bg-slate-300 p-2" type="number" name="capacity" id="" min="1" value="1" required>
        <button class="bg-black text-white rounded p-2" type="button" onclick="insertTable(this)">กดสร้าง</button>
    </form>

    <!--  -->
    <form class="m-3" action="/backend/database/manager.php" method="post">
        <h1 class="text-2xl">List Users</h1>
        <!-- data-te-datatable-init -->
        <!-- ตาราง Users -->
        <div id="divdp3"></div>
    </form>


</div>

<!-- สุ่มโค้ด Staff | Manager -->
<div class="m-5">
    <h1 class="text-3xl">Staff</h1>
    <form class="m-3" action='/backend/database/staff.php' method='post'>
        <h1 class="text-2xl">List Tables</h1>
        <table class="min-w-full text-left text-sm font-light" id="display1">
            <tr class="border-b font-medium dark:border-neutral-500">
                <th scope="col" class="px-6 py-4">เลขโต๊ะ</th>
                <th scope="col" class="px-6 py-4">โค้ด</th>
                <th scope="col" class="px-6 py-4">สมาชิก</th>
                <th scope="col" class="px-6 py-4">ความจุ</th>
                <th scope="col" class="px-6 py-4">สถานะ</th>
                <th scope="col" class="px-6 py-4">สุุ่มโค้ด</th>
                <th scope="col" class="px-6 py-4">จ่ายบิล</th>
            </tr>
        </table>
    </form>
</div>

<div class="m-5">
    <h1 class="text-3xl">Customer</h1>
    <form class="m-3" action="/backend/database/customer.php" method="post">
        <h1 class="text-2xl">Reservation Table</h1>
        <label for="">Table Code: </label>
        <input type="text" class="bg-slate-300 p-2 rounded" name="code">
        <input type="hidden" name="case" value="tableCheck">
        <button class="bg-black text-white rounded p-2">ยืนยัน</button>
    </form>

    <div class="m-3">
        <h1 class="text-2xl">Menu</h1>
        <table class="min-w-full text-left text-sm font-light" id="display2">
            <tr class="border-b font-medium dark:border-neutral-500">
                <th scope="col" class="px-6 py-4">เลขประเภทเมนู</th>
                <th scope="col" class="px-6 py-4">ชื่อประเภท</th>
                <th scope="col" class="px-6 py-4">เลขเมนู</th>
                <th scope="col" class="px-6 py-4">ชื่อเมนู</th>
                <th scope="col" class="px-6 py-4">ราคา</th>
                <th scope="col" class="px-6 py-4">คำอธิบาย</th>
            </tr>
        </table>
    </div>
</div>

<!-- Need tobe included, if not the ripple is not working -->
<button data-te-ripple-init data-te-ripple-color="light" hidden>
    Click me
</button>

<!-- Fetch Table -->
<script>
    const TBDisplay = document.getElementById("display1")
    // ดึงข้อมูลจาก Database ผ่าน GET
    fetch("/backend/database/staff.php?case=table").then(e => e.json()).then(payload => {
        console.log(payload)
        payload.forEach(item => {
            let isAvaliable = true
            let row = TBDisplay.insertRow(-1)
            row.className = "border-b dark:border-neutral-500"
            Object.keys(item).forEach(item2 => {
                let col = row.insertCell(-1)
                col.className = "whitespace-nowrap px-6 py-4"
                if (item2 != "status") col.innerHTML = item[item2] == null ? 'null' : item[item2]
                else col.innerHTML = item[item2].charAt(0) + item[item2].toLowerCase().substring(1, item[item2].length)
            })
            let col = row.insertCell(-1)
            if (item['status'] == "AVAILABLE") col.innerHTML = `<button type="button" onclick='randomCode(this, ${item['tableID']})' data-te-ripple-init data-te-ripple-color="light" class="inline-block rounded bg-primary text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200 disabled:opacity-70">สุ่มโค้ด</button>`
            else {
                isAvaliable = false;
                col.innerHTML = `<button type="button" class="pointer-events-none inline-block rounded bg-primary text-white px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200 disabled:opacity-70" disabled>สุ่มโค้ด</button>`
            }

            if (!isAvaliable) {
                col = row.insertCell(-1)
                col.innerHTML = `<button type="button" onclick=bill(this, ${item['tableID']}) data-te-ripple-init data-te-ripple-color="light" class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">จ่ายบิล</button>`
            }
        })
    });
</script>

<!-- Fetch Menus -->
<script>
    const TBDisplay2 = document.getElementById("display2")
    fetch("/backend/database/customer.php?case=allmenus").then(e => e.json()).then(payload => {
        console.log(payload)
        payload.forEach(item => {
            let row = TBDisplay2.insertRow(-1)
            Object.keys(item).forEach(item2 => {
                let col = row.insertCell(-1)
                col.className = "whitespace-nowrap px-6 py-4"
                col.innerHTML = item[item2]
            })
        })
    })
</script>

<!-- Fetch Users -->
<script>
    const Div3 = document.getElementById("divdp3")
    if (localStorage.getItem("content-users") == undefined) {
        fetch("/backend/database/manager.php?case=alluser").then(e => e.json()).then(payload => {
            let content = `<div data-te-datatable-init>
                <table class="min-w-full text-left text-sm font-light">
                    <thead>
                        <tr class="border-b font-medium dark:border-neutral-500">
                            <th scope="col" class="px-6 py-4">หมายเลขโทรศัพท์</th>
                            <th scope="col" class="px-6 py-4">ชื่อสมาชิก</th>
                            <th scope="col" class="px-6 py-4">อีเมล</th>
                            <th scope="col" class="px-6 py-4">ตำแหน่ง</th>
                            <th scope="col" class="px-6 py-4">สถานะ</th>
                            <th scope="col" class="px-6 py-4">แต้มสะสม</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>`
            payload.forEach(item => {
                let row = "<tr>"
                Object.keys(item).forEach(item2 => {
                    let col = "<td>"
                    if (item2 != 'userID') {
                        col += item[item2]
                        col += "</td>"
                    } else {
                        if (item['status'] == "ACTIVE") col = `<td><button type='button' class="inline-block rounded bg-warning px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]" onclick="change_status(this, ${item['userID']})">ระงับบัญชี</button></td>`
                        else col = `<td><button type='button' class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out hover:bg-success-600 hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:bg-success-600 focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0 active:bg-success-700 active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]" onclick="change_status(this, ${item['userID']})">เปิดใช้งานบัญชี</button></td>`
                        col += `<td><button type='button' class="inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]" onclick="change_passwd(this, ${item['userID']})">รีเซ็ตรหัสผ่าน</button></td>`
                    }
                    row += col
                })
                row += "</tr>"
                content += row
            })

            content += `</tbody>
                </table>
            </div>`
            localStorage.setItem("content-users", content)
            location.reload()
        })
    } else {
        Div3.innerHTML = localStorage.getItem("content-users")
        localStorage.removeItem("content-users")
    }
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

    function change_status(element, id) {
        let input = document.createElement("input")
        inp_case(input, 'change_status', 'case')
        element.form.appendChild(input)

        input = document.createElement("input")
        inp_case(input, id, "ID")
        element.form.appendChild(input)

        element.form.submit()
    }

    function change_passwd(element, id) {
        let input = document.createElement("input")
        inp_case(input, 'change_passwd', 'case')
        element.form.appendChild(input)

        input = document.createElement("input")
        inp_case(input, id, "ID")
        element.form.appendChild(input)

        element.form.submit()
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/assets/script/sweetalert.js"></script>
<?php if (isset($_SESSION['result'])) { ?>
    <script>
        <?php $fire = false; ?>
        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "insertTable")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "insertTable")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>


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


        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "change_status")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "change_status")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>

        <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "change_passwd")) { ?>
        Toast.fire({
            icon: "success",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true; ?>

        <?php } else if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "change_passwd")) { ?>
        Toast.fire({
            icon: "error",
            title: "<?php echo $_SESSION['result']['message']; ?>",
        });
        <?php $fire = true;
        } ?>

        <?php if ($fire) unset($_SESSION['result']) ?>
    </script>
<?php } ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/script/tw_element.php") ?>

</body>

</html>