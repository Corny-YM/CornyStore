<?php 
session_start();
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_folder."class/cart_class.php";


if((isset($_GET['product_id']) || !($_GET['product_id'] == NULL)) &&
(isset($_SESSION['id']) || !($_SESSION['id'] == NULL))) {
    $cart = new Cart(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $user_id = $_SESSION['id'];
    $product_id = $_GET['product_id'];
    $cart->delete_cart($user_id, $product_id);
    header("Location: ".$url_folder."pg_features/index.php");
}
?>