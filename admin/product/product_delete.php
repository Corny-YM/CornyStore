<?php
    include "../config.php";
    include "../class/product_class.php";
?>    
<?php
    $product = new Product(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!isset($_GET['product_id']) || $_GET['product_id'] == null) {
        echo "<script> window.location = 'product_show.php' </script>";
    } else {
        $product_id = $_GET['product_id'];

        $GetDataByID = $product->GetDataByID($product_id);
        $GetDataImg_desc = $product->GetDataImg_desc($product_id);
        
        if(mysqli_num_rows($GetDataByID) > 0) {
            $row = mysqli_fetch_assoc($GetDataByID);
            $product_img = $row['product_img'];
            if (file_exists("../uploads/$product_img")) 
            {
                unlink("../uploads/$product_img");
            }
        }
        if(mysqli_num_rows($GetDataImg_desc) > 0) {
            while($row = mysqli_fetch_assoc($GetDataImg_desc)) {
                $product_img_desc = $row['product_img_desc'];
                if (file_exists("../uploads/img_desc/$product_img_desc")) 
                {
                    $GetDataByImg_desc = $product->GetDataByImg_desc($product_img_desc);
                    $limit_number_img = 1;
                    var_dump($GetDataByImg_desc);
                    if(mysqli_num_rows($GetDataByImg_desc) == $limit_number_img) {
                        unlink("../uploads/img_desc/$product_img_desc");
                    }
                }
            }
        }
        // Tao bien luu tru gia tri
        $delete_product = $product->delete_product($product_id);
    }    
?>