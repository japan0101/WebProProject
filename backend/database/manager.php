<?php

global $database;
session_start();
header('Content-Type: application/json');

include './../connectDatabase.php';
include './../randomCode.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['role'] == "MANAGER") {
    switch ($_POST["case"]) {
        case 'insertTable':
        {
            // ต้องการ capacity

            $database->insert("tables", array("capacity" => $_POST['capacity']));
            if ($database->getResult()['result'])
                $database->customResult(message: "ทำการสร้าง โต๊ะ เสร็จสิ้น");

            break;
        }
        case 'change_status':
        {
            // ต้องการ ID

            $database->custom("SELECT status FROM users WHERE userID={$_POST['ID']}");

            if ($database->getResult()['payload'][0]->status == "ACTIVE") {

                $database->update("users", array("status" => 2), "userID={$_POST['ID']}");
                if ($database->getResult()['result'])
                    $database->customResult(message: "ระงับบัญชีผู้ใช้เรียบร้อย");
            } else {

                $database->update("users", array("status" => 1), "userID={$_POST['ID']}");
                if ($database->getResult()['result'])
                    $database->customResult(message: "เปิดใช้งานบัญชีผู้ใช้เรียบร้อย");
            }
            usleep(0.5 * 1000000);
            break;
        }
        case 'change_passwd':
        {
            // ต้องการ ID, passwd (ยังไม่ได้ทำ อาจให้ Manager INPUT รหัสผ่านที่ต้องการให้เปลี่ยนเลย)

            $password = "12345678";
            $hashedPassword = password_hash("12345678", PASSWORD_BCRYPT);
            $database->update("users", array("passwd" => $hashedPassword), "userID={$_POST['ID']}");
            if ($database->getResult()['result'])
                $database->customResult(message: "เปลี่ยนรหัสผ่านเสร็จสิ้น รหัสผ่าน: " . $password);

            break;
        }
        case 'create_category':
        {
            // name

            $database->insert("menu_category", array('name' => $_POST['name']));
            if ($database->getResult()['result'])
                $database->customResult(message: "เพิ่มประเภทเมนูเสร็จสิ้น");
            break;
        }
        case 'delete_category':
        {
            // ID

            $database->delete(tablename: "menu_category", where: "categoryID={$_POST['ID']}");
            if ($database->getResult()['result'])
                $database->customResult(message: "ลบประเภทเมนูเสร็จสิ้น");
            break;
        }
        case 'create_menu':
        {
            // name, category, price, image, description(Optional)

            $target_dir = "../../assets/images/menus/";
            $_FILES["image"]["name"] = time() . ".webp";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is an actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                    $_POST['image'] = $_FILES["image"]["name"];
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            $insert = array('menuName' => $_POST['name'], 'price' => $_POST['price'], 'categoryID' => $_POST['category']);
            if (isset($_POST['description']))
                $insert['description'] = $_POST['description'];
            if (isset($_POST['image']))
                $insert['image'] = $_POST['image'];

            $database->insert("menus", $insert);
            if ($database->getResult()['result'])
                $database->customResult(message: "เพิ่มเมนูเสร็จสิ้น");
            break;
        }
        case 'modify_menu':
        {
            //ID, name, category, price, description(Optional), image(Optional)

            $image = null;
            $desc = null;

            if (isset($_FILES['image']['name'])) {
                $target_dir = "../../assets/images/menus/";
                $_FILES["image"]["name"] = time() . ".webp";
                $image = $_FILES['image']['name'];

                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if image file is an actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    $image = null;
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                        $_POST['image'] = $_FILES["image"]["name"];
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                        $image = null;
                    }
                }
            }

            if (isset($_POST['description']))
                $desc = $_POST['description'];
            $update = array('menuName' => $_POST['name'], 'price' => $_POST['price'], 'categoryID' => $_POST['category']);

            if (!is_null($desc))
                $update['description'] = $desc;
            if (!is_null($image))
                $update['image'] = $image;

            $database->update("menus", $update, "menuID={$_POST['ID']}");
            if ($database->getResult()['result'])
                $database->customResult(message: "แก้ไขเมนูเสร็จสิ้น");

            break;
        }
        case 'delete_menu':
        {
            // ID

            $database->delete(tablename: "menus", where: "menuID={$_POST['ID']}");
            if ($database->getResult()['result'])
                $database->customResult(message: "ลบเมนูเสร็จสิ้น");
            break;
        }
        case 'modify_banner':
        {
            //name, cost, description, ID
            if (isset($_POST['description']))
                $desc = $_POST['description'];
            $expire = substr($_POST['expire'], 6, 4) . '-' . substr($_POST['expire'], 3, 2) . '-' . substr($_POST['expire'], 0, 2) . ' ' .
                ((substr($_POST['expire'], 18, 2) == 'PM') ? (((int)substr($_POST['expire'], 12, 2) + 12 < 24) ? (int)substr($_POST['expire'], 12, 2) + 12 : "12") : ((int)(substr($_POST['expire'], 12, 2) < 12) ? substr($_POST['expire'], 12, 2) : "00")) . ':' . substr($_POST['expire'], 15, 2) . ':00';
            $update = array('name' => $_POST['name'], 'cost' => (int)$_POST['cost'], 'expire' => $expire);
            if (!is_null($desc))
                $update['description'] = $desc;

            $database->update("gacha_banner", $update, "gachaID={$_POST['ID']}");
            if ($database->getResult()['result'])
                $database->customResult(message: "แก้ไขกล่องสุ่มเสร็จสิ้น");

            break;
        }
        case 'create_banner':
        {
            //name, description, cost, expire

            if (isset($_POST['description']))
                $desc = $_POST['description'];
            $expire = substr($_POST['expire'], 6, 4) . '-' . substr($_POST['expire'], 3, 2) . '-' . substr($_POST['expire'], 0, 2) . ' ' .
                ((substr($_POST['expire'], 18, 2) == 'PM') ? (((int)substr($_POST['expire'], 12, 2) + 12 < 24) ? (int)substr($_POST['expire'], 12, 2) + 12 : "12") : ((int)(substr($_POST['expire'], 12, 2) < 12) ? substr($_POST['expire'], 12, 2) : "00")) . ':' . substr($_POST['expire'], 15, 2) . ':00';
            $insert = array('name' => $_POST['name'], 'cost' => (int)$_POST['cost'], 'expire' => $expire);
            if (!is_null($desc))
                $insert['description'] = $desc;
            $database->insert("gacha_banner", $insert);
            if ($database->getResult()['result'])
                $database->customResult(message: "เพิ่มกล่องสุ่มเสร็จสิ้น");
            break;
        }
        case 'addtobanner':
        {
            //gachaID, menuID, rarity, discount
            $insert = array('gachaID' => $_POST['gachaID'], 'menuID' => $_POST['menuID'], 'rarity' => $_POST['rarity'], 'discount' => $_POST['discount']);
            $database->insert("gacha_item", $insert);
            if ($database->getResult()['result'])
                $database->customResult(message: "เพิ่มส่วนลดให้กล่องสุ่มเสร็จสิ้น");
            break;
        }
        case 'delete_banner':
        {
            // ID

            $database->delete(tablename: "gacha_banner", where: "gachaID={$_POST['ID']}");
            if ($database->getResult()['result'])
                $database->customResult(message: "ลบกล่องสุ่มเสร็จสิ้น");
            break;
        }
        case 'delfrombanner':
        {
            // menuID, bannerID, rarity
            $database->delete(tablename: "gacha_item", where: "menuID={$_POST['menuID']} AND gachaID={$_POST['gachaID']} AND rarity='{$_POST['rarity']}'");
            if ($database->getResult()['result'])
                $database->customResult(message: "ลบออกจากกล่องเสร็จสิ้น");
            break;
        }
        default:
        {
            $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
        }
    }

    $redirect .= $_SERVER['HTTP_REFERER'];
    $database->customResult(type: $_POST['case']);
} else if ($_SERVER['REQUEST_METHOD'] == "GET" && $_SESSION['role'] == "MANAGER") {
    switch ($_GET['case']) {
        case 'alluser':
        {
            $database->custom("SELECT phoneNumber, memberName, email, status, points, role, userID FROM users WHERE NOT userID={$_SESSION['userID']} ORDER BY role");
            echo json_encode($database->getResult()['payload']);
            break;
        }

        case 'menu_category':
        {
            $database->custom("SELECT categoryID, name FROM menu_category");
            echo json_encode($database->getResult()['payload']);
            break;
        }


        default:
        {
            $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
        }
    }
    return;
} else {
    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= "./../../";
}

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
header($redirect);
