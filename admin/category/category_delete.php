<?php
    include "../config.php";
    include "../class/category_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!isset($_GET['category_id']) || $_GET['category_id'] == null) {
        echo "<script> window.location = 'category_show.php' </script>";
    } else {
        // Tao bien luu tru gia tri
        $category_id = $_GET['category_id'];
    }    

    $category->delete_category($category_id);
?>