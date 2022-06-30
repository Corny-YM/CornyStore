<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/reviews_class.php";
?>    
<?php
    $reviews = new Reviews(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if((isset($_GET['product_id']) || !($_GET['product_id'] == NULL)) &&
    isset($_GET['product_id']) || !($_GET['product_id'] == NULL)) {
        $product_id = $_GET['product_id'];
        $user_id = $_GET['user_id'];
        $reviews->delete_reviews($product_id, $user_id);
    } else {
        echo "<script> window.location.href='reviews_show.php' </script>";
    }
?>