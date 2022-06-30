<?php 
session_start();
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_folder."class/wishlist_class.php";


$wishlist = new Wishlist(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if((!isset($_GET['product_id']) || $_GET['product_id'] == NULL) ||
(!isset($_SESSION['id']) || $_SESSION['id'] == NULL)) {
    echo "<script>alert('Vui lòng đăng nhập để sử dụng tính năng này') </script>";
    echo "<script> window.location.href='".$url_folder."UI_user/login.php' </script>";
} else {
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['id'];
    $show_wishlist = $wishlist->show_wishlist($user_id, $product_id);
    if(mysqli_num_rows($show_wishlist) > 0) {
        $wishlist->delete_wishlist($user_id, $product_id);
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    } else {
        $wishlist->insert_wishlist($user_id, $product_id);
        header("Location: ".$url_folder."pg_shop/product-detail.php?product_id=".$product_id);
        exit;
    }
} ?>