<?php
$url_base = "../../"; 
$url_folder = "../";
include $url_base."admin/config.php";
include $url_base."admin/class/reviews_class.php";
session_start();

if(!isset($_SESSION['email']) || $_SESSION['email'] == NULL) {
    echo "<script>alert('Vui lòng đăng nhập để sử dụng tính năng này') </script>"; 
    echo "<script>window.location.href = '".$url_folder."UI_user/login.php' </script>"; 
} else {
    $reviews = new Reviews(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['id'];
    $contents = $_GET['contents'];

    $isReviewed = $reviews->isReviewed($product_id, $user_id);
    if($isReviewed) {
        echo "<script>
        alert('Bạn đã bình luận về sản phẩm này')
        window.location.href = '".$url_folder."pg_shop/product-detail.php?product_id=".$product_id."'
        </script>"; 
    } else {
        $reviews->insert_reviews($product_id, $user_id, $contents);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
?>