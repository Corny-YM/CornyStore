<?php 

include "../config.php";
include "../class/product_class.php";

$product = new Product(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($_GET['category_id'] == NULL || !isset($_GET['category_id'])) {
    echo "HEELLLO";
} else {
    $category_id = $_GET['category_id'];
    $product_type_id = $_GET['product_type_id'];
    echo "<script> console.log('$product_type_id') </script>";
}

$show_product_type_ajax = $product->show_product_type_ajax($category_id); 

if(mysqli_num_rows($show_product_type_ajax) > 0) {
    while($row = mysqli_fetch_assoc($show_product_type_ajax)) {
?>
    <option 
    <?php 
    if($product_type_id == $row['product_type_id']) {
        echo "SELECTED";
    } ?>
    value="<?php echo $row['product_type_id'] ?>">
        <?php echo $row['product_type_name'] ?>
    </option>

<?php        
    }
}


?>