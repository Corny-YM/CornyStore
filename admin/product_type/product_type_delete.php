<?php
    include "../config.php";
    include "../class/product_type_class.php";
?>    
<?php
    $product_type = new Product_type(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!isset($_GET['product_type_id']) || $_GET['product_type_id'] == null) {
        echo "<script> window.location = 'product_type_show.php' </script>";
    } else {
        // Tao bien luu tru gia tri
        $product_type_id = $_GET['product_type_id'];
    }    

    $product_type->delete_product_type($product_type_id);
?>