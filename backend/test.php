<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tailwind.php") ?>
</head>

<body>

    <!-- เพิ่มโต๊ะ Manager -->
    <form action="./database/manager.php" method="post">
        <label for="">Capacity: </label>
        <input class="bg-slate-300 p-2" type="number" name="capacity" id="" min="1" value="1" required>
        <button class="bg-black text-white rounded p-2" type="button" onclick="insertTable(this)">กดสร้าง</button>
    </form>

    <!-- สุ่มโค้ด Staff | Manager -->
    <form action='/backend/database/staff.php' method='post'>
        <table class="min-w-full text-left text-sm font-light" id="display">
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

    <!-- Need tobe included, if not the ripple is not working -->
    <button data-te-ripple-init data-te-ripple-color="light" hidden>
        Click me
    </button>

    <script>
        const TBDisplay = document.getElementById("display")
        // ดึงข้อมูลจาก Database ผ่าน GET
        fetch("./database/staff.php?case=table").then(e => e.json()).then(payload => {
            console.log(payload[0])
            payload.forEach(item => {
                let isAvaliable = true
                let row = TBDisplay.insertRow(-1)
                row.className = "border-b dark:border-neutral-500"
                Object.keys(item).forEach(item2 => {
                    let col = row.insertCell(-1)
                    col.className = "whitespace-nowrap px-6 py-4"
                    if (item[item2] == "AVALIABLE") isAvaliable = !isAvaliable
                    if (item2 != "status") col.innerHTML = item[item2] == null ? 'null' : item[item2]
                    else col.innerHTML = item[item2].charAt(0) + item[item2].toLowerCase().substring(1, item[item2].length)
                })
                let col = row.insertCell(-1)
                col.innerHTML = `<button type="button" onclick='randomCode(this, ${item['tableID']})' data-te-ripple-init data-te-ripple-color="light" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">สุ่มโค้ด</button>`

                if (!isAvaliable) {
                    col = row.insertCell(-1)
                    col.innerHTML = `<button type="button" onclick=bill(this, ${item[item2]}) data-te-ripple-init data-te-ripple-color="light" class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(220,76,100,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.2),0_4px_18px_0_rgba(220,76,100,0.1)]">จ่ายบิล</button>`
                }
            })
        });
    </script>

    <script>
        // สร้าง Input Hidden ตอนกดส่ง Form
        function insertTable(element) {
            let input = document.createElement("input")
            input.value = "insertTable"
            input.name = "case"
            input.type = "hidden"
            element.form.append(input);
            // element.form.submit();
        }

        function randomCode(element, id) {
            let input = document.createElement("input")
            input.value = "randomTableCode"
            input.name = "case"
            input.type = "hidden"
            element.form.append(input);
            // การส่งให้ผ่านต้องเป็น Staff
            input = document.createElement("input")
            input.value = id
            input.name = "ID"
            input.type = "hidden"
            element.form.append(input);
            // element.form.submit();
        }

        function bill(element, id) {

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/asset/script/sweetalert.js"></script>
    <?php if (isset($_SESSION['result'])) { ?>
        <script>
            <?php if (($_SESSION['result']['result'] == 1) && ($_SESSION['result']['type'] == "insertTable")) { ?>
                Toast.fire({
                    icon: "success",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                });
            <?php unset($_SESSION['result']);
            } ?>

            <?php if (($_SESSION['result']['result'] == 0) && ($_SESSION['result']['type'] == "insertTable")) { ?>
                Toast.fire({
                    icon: "error",
                    title: "<?php echo $_SESSION['result']['message']; ?>",
                });
            <?php unset($_SESSION['result']);
            } ?>
        </script>
    <?php } ?>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/asset/script/tw_element.php") ?>
    <script>
        // Initialization for ES Users
        import {
            Animate,
            Input,
            Ripple,
            initTE,
        } from "tw-elements";

        initTE({
            Animate,
            Input,
            Ripple
        });
    </script>

</body>

</html>