<?php 
session_start();
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_folder."class/wishlist_class.php";

if((isset($_GET['product_id']) || !($_GET['product_id'] == NULL)) &&
(isset($_SESSION['id']) || !($_SESSION['id'] == NULL))) {
    $wishlist = new Wishlist(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $user_id = $_SESSION['id'];
    $product_id = $_GET['product_id'];
    $wishlist->delete_wishlist($user_id, $product_id);
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
}

?>