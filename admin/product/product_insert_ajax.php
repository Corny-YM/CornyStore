<?php 

include "../config.php";
include "../class/product_class.php";

$product = new Product(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$category_id = $_GET['category_id'];

$show_product_type_ajax = $product->show_product_type_ajax($category_id); 

if(mysqli_num_rows($show_product_type_ajax) > 0) {
    while($row = mysqli_fetch_assoc($show_product_type_ajax)) {
?>
    <option value="<?php echo $row['product_type_id'] ?>">
        <?php echo $row['product_type_name'] ?>
    </option>

<?php        
    }
}
?>
