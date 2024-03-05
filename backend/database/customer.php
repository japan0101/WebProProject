<?php
global $database;
global $id;
session_start();
header('Content-Type: application/json');

include './../connectDatabase.php';
include './../randomCode.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($_POST["case"]) {

        case 'tableCheck':
        {
            // ต้องการ code

            $database->custom("SELECT tableID, userID FROM tables WHERE code='{$_POST['code']}' LIMIT 1");
            if ($database->getResult()['result']) {

                $id = $database->getResult()['payload'][0]->tableID;

                // อัพเดทเป็นสถานะว่ามีการ จองแล้ว
                $database->update("tables", array("status" => 3), "code='{$_POST['code']}'");

                // เช็คว่ามีคนแล้วหรือยัง
                if (is_null($database->getResult()['payload'][0]->userID) && $_SESSION['userID'] != 'null') {
                    $database->update("tables", array("userID" => $_SESSION['userID']), "code='{$_POST['code']}'");
                }

                // เช็คว่าทำงานได้หรือไม่
                if ($database->getResult()['result'])
                    $database->customResult(message: "คุณอยู่ที่โต๊ะ $id");

                $_SESSION['tablecode'] = $_POST['code'];

                setcookie("tableID", $id, time() + 60 * 60 * 6, '/');
                setcookie("tablecode", $_POST['code'], time() + 60 * 60 * 6, '/');
            } else {

                $database->customResult(message: "ใส่โค้ดไม่ถูกต้อง");
            }
            break;
        }
        case 'orderFood':
        {
            // ต้อง menu(array keyvalue)
            $_POST['menu'] = json_decode($_POST['menu']);

            if (isset($_COOKIE['tableID']) && isset($_COOKIE['tablecode'])) {

                $database->custom("SELECT tableID FROM tables WHERE tableID={$_COOKIE['tableID']} AND code='{$_COOKIE['tablecode']}'");
                if ($database->getResult()['result']) {

                    foreach ($_POST['menu'] as $item) {
                        $database->insert("orders", array("tableID" => $_COOKIE['tableID'], "menuID" => $item->menuId, "amount" => $item->amount));
                    }
                    $database->customResult(message: "สั่งอาหารสำเร็จ");
                } else {

                    if (isset($_SESSION['memberName'])) {
                        $database->custom("SELECT points FROM users WHERE userID={$_SESSION['userID']}");
                        $_SESSION['points'] = $database->getResult()['payload'][0]->points;
                    }

                    $database->customResult(result: 0, message: "กรุณาใส่โค้ดของโต๊ะใหม่อีกครั้ง");
                }
            } else {

                $database->customResult(message: "กรุณาใส่โค้ดของโต๊ะ");
            }
            setcookie("tableID", $id, time() - 60 * 60 * 4, '/');
            setcookie("tablecode", $_POST['code'], time() - 60 * 60 * 4, '/');
            break;
        }

        case 'generateCoupon':
        {
            $_SESSION['points'] = $_SESSION['points'] - (int)$_POST['cost'];
            $database->custom("UPDATE `users` SET `points`= {$_SESSION['points']}");
            while (true) {
                $code = randomCode(7);
                $database->custom("SELECT code FROM `user_discount` WHERE code = '{$code}'");
                if ($database->getResult()['result'] == 0) {
                    $database->customResult(result: 1);
                    break;
                }
            }
            date_default_timezone_set("Asia/Bangkok");
            $date = date_create();
            date_modify($date, "+1 years");
            $expire = date_format($date, "Y-m-d H:i:s");
            $database->custom("INSERT INTO `user_discount`(`userID`, `menuID`, `discount`, `code`, `expire`) VALUES ('{$_SESSION["userID"]}','{$_POST["menuID"]}','{$_POST["discount"]}','{$code}','{$expire}')");
            $database->customResult(message: "คูปองได้ถูกเพิ่มเข้าคลังของคุณแล้ว");

            break;
        }
        case 'buycoupon':
        {
            while (true) {
                $code = randomCode(7);
                $database->custom("SELECT code FROM `user_discount` WHERE code = '{$code}'");
                if ($database->getResult()['result'] == 0) {
                    $database->customResult(result: 1);
                    break;
                }
            }
            date_default_timezone_set("Asia/Bangkok");
            $date = date_create();
            date_modify($date, "+1 years");
            $expire = date_format($date, "Y-m-d H:i:s");
            $database->custom("INSERT INTO `user_discount`(`userID`, `menuID`, `discount`, `code`, `expire`) VALUES ('{$_SESSION["userID"]}','{$_POST["menuID"]}','{$_POST["discount"]}','{$code}','{$expire}')");
            $_SESSION['points'] = $_SESSION['points'] - (int)$_POST['cost'];
            $database->custom("UPDATE `users` SET `points`= {$_SESSION['points']}");
            $database->customResult(message: "คูปองได้ถูกเพิ่มเข้าคลังของคุณแล้ว");
            break;
        }
        default:
        {
            $database->customResult(result: 0, message: "ไม่ได้ใส่สิ่งที่ต้องการ");
            break;
        }
    }

    $redirect .= $_SERVER['HTTP_REFERER'];
    $database->customResult(type: $_POST['case']);
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    switch ($_GET['case']) {

        case 'allmenus':
        {
            // ดึงข้อมูลเมนู
            $database->custom("SELECT menuName, mc.name AS `categoryName`, price, description, image, menuID, categoryID FROM menus LEFT JOIN menu_category AS `mc` USING (categoryID)");
            echo json_encode($database->getResult()['payload']);
            break;
        }
        case 'banner':
        {
            $database->custom("SELECT * FROM gacha_banner");
            echo json_encode($database->getResult()['payload']);
            break;
        }
        case 'category':
        {
            $database->custom("SELECT menu_category.categoryID, menus.menuID, menu_category.name as `category`, menus.menuName, coupon.discount, coupon.cost, menus.image FROM menu_category INNER JOIN menus ON menu_category.categoryID = menus.categoryID INNER JOIN coupon ON menus.menuID = coupon.menuID");
            echo json_encode($database->getResult()['payload']);
            break;
        }
        case 'mycoupon' :
        {
            date_default_timezone_set("Asia/Bangkok");
            $date = date_create();
            $today = date_format($date, "Y-m-d H:i:s");
            if (isset($_SESSION['memberName'])) {
                $database->custom("SELECT menu_category.categoryID, menus.menuID, menus.menuName, menu_category.name, user_discount.code, user_discount.discount, user_discount.expire, menus.image FROM menu_category INNER JOIN menus ON menu_category.categoryID = menus.categoryID INNER JOIN user_discount ON user_discount.menuID = menus.menuID WHERE userID = {$_SESSION['userID']} AND user_discount.expire >= '{$today}' ORDER BY user_discount.expire ASC");
                echo json_encode($database->getResult()['payload']);
                break;
            }
            break;
        }
        case 'getrate':
        {
            if (isset($_SESSION['userID'])) {
                $database->custom("SELECT gacha_item.gachaID, menus.menuName, gacha_item.rarity, gacha_item.discount, menus.menuID FROM gacha_item INNER JOIN menus ON gacha_item.menuID = menus.menuID ORDER BY  gachaID ASC, rarity DESC");
                echo json_encode($database->getResult()['payload']);
                break;
            }
            break;
        }
        case 'getgachaitem':
            if (isset($_SESSION['userID'])) {
                $database->custom("SELECT gachaID, gacha_item.menuID, rarity, discount, menus.menuName FROM gacha_item INNER JOIN menus ON gacha_item.menuID = menus.menuID WHERE gacha_item.gachaID = " . $_GET['banner_id'] . " AND gacha_item.rarity = " . $_GET['rarity']);
                echo json_encode($database->getResult()['payload']);
                break;
            }
            break;
        default:
        {
        }
    }
    return;
} else {
    $database->customResult(0, "Error: Wrong Method", "Method");
    $redirect .= './../../';
}

$_SESSION['result']['result'] = $database->getResult()['result'];
$_SESSION['result']['message'] = $database->getResult()['message'];
$_SESSION['result']['type'] = $database->getResult()['type'];

unset($database);
header($redirect);
