<?php
session_start();
header('Content-Type: application/json');

include './../connectDatabase.php';

$redirect = "Location: ";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch ($_POST["case"]) {

        case 'tableCheck': {
                // ต้องการ code

                $database->custom("SELECT tableID, userID FROM tables WHERE code='{$_POST['code']}' LIMIT 1");
                if ($database->getResult()['result']) {

                    $id = $database->getResult()['payload'][0]->tableID;

                    // เช็คว่ามีคนแล้วหรือยัง
                    if (is_null($database->getResult()['payload'][0]->userID) && $_SESSION['userID'] != 'null') {
                        $database->update("tables", array("userID" => $_SESSION['userID']), "code='{$_POST['code']}'");
                    }

                    // เช็คว่าทำงานได้หรือไม่
                    if ($database->getResult()['result'])
                        $database->customResult(message: "คุณอยู่ที่โต๊ะ $id");

                    setcookie("tableID", $id, time() + 60 * 60 * 6, '/pages/order');
                    setcookie("tablecode", $_POST['code'], time() + 60 * 60 * 6, '/pages/order');

                    setcookie("tableID", $id, time() + 60 * 60 * 6, '/backend/database/customer.php');
                    setcookie("tablecode", $_POST['code'], time() + 60 * 60 * 6, '/backend/database/customer.php');
                } else {

                    $database->customResult(message: "ใส่โค้ดไม่ถูกต้อง");
                }
                break;
            }
        case 'orderFood': {
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

                        setcookie("tableID", $id, time() - 60 * 60 * 6, '/pages/order');
                        setcookie("tablecode", $_POST['code'], time() - 60 * 60 * 6, '/pages/order');

                        setcookie("tableID", $id, time() - 60 * 60 * 6, '/backend/database/customer.php');
                        setcookie("tablecode", $_POST['code'], time() - 60 * 60 * 6, '/backend/database/customer.php');

                        $database->customResult(message: "กรุณาใส่โค้ดของโต๊ะใหม่อีกครั้ง");
                    }
                } else {
                    
                    setcookie("tableID", $id, time() - 60 * 60 * 6, '/pages/order');
                    setcookie("tablecode", $_POST['code'], time() - 60 * 60 * 6, '/pages/order');

                    setcookie("tableID", $id, time() - 60 * 60 * 6, '/backend/database/customer.php');
                    setcookie("tablecode", $_POST['code'], time() - 60 * 60 * 6, '/backend/database/customer.php');

                    $database->customResult(message: "กรุณาใส่โค้ดของโต๊ะ");
                }
                break;
            }
        default: {
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
            $database->custom("SELECT menu_category.categoryID, menus.menuID, menu_category.name as `category`, menus.menuName, coupon.discount, coupon.cost FROM menu_category INNER JOIN menus ON menu_category.categoryID = menus.categoryID INNER JOIN coupon ON menus.menuID = coupon.menuID");
            echo json_encode($database->getResult()['payload']);
            break;
        }
        case 'mycoupon' :
        {
            if (isset($_SESSION['memberName'])) {
                $database->custom("SELECT menu_category.categoryID, menus.menuID, menu_category.name as `category`, menus.menuName, coupon.discount, user_coupon.couponCode, user_coupon.expire FROM menu_category INNER JOIN menus ON menu_category.categoryID = menus.categoryID INNER JOIN coupon ON menus.menuID = coupon.menuID INNER JOIN user_coupon ON user_coupon.couponID = coupon.couponID WHERE user_coupon.userID = {$_SESSION['userID']}");
                echo json_encode($database->getResult()['payload']);
                break;
            }
            break;
        }
        case 'getrate':
        {
            if (isset($_SESSION['userID'])) {
                $database->custom("SELECT gacha_item.gachaID, menus.menuName, gacha_item.rarity, gacha_item.discount FROM gacha_item INNER JOIN menus ON gacha_item.menuID = menus.menuID ORDER BY  gachaID ASC, rarity DESC");
                echo json_encode($database->getResult()['payload']);
                break;
            }
            break;
        }
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
