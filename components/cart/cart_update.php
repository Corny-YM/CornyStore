<?php 
session_start();
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_folder."class/cart_class.php";

$cart = new Cart(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$arr_product_id = $_GET;
$coupon = $_GET['coupon'];
$user_id = $_SESSION['id'];
// xóa phần tử cuối cùng ra khỏi mảng
// mảng được truyền vào bị thay đổi
array_pop($arr_product_id); 

if(!isset($coupon) || $coupon == NULL) {
    // Chỉ đang muốn update lại cart -> no coupon
    foreach($arr_product_id as $product_id => $quantity) {
        $cart->update_cart($user_id, $product_id, $quantity);
    }
    header("Location: ".$url_folder."pg_features/index.php");
} else {
    // Tiến hành check mã giảm giá => total
}
?>