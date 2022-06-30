<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/product_type_class.php";
    include "../class/category_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $product_type = new Product_type(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if((!isset($_GET['product_type_id']) || $_GET['product_type_id'] == NULL) &&
    (!isset($_GET['category_id']) || $_GET['category_id'] == NULL) &&
    (!isset($_GET['product_type_name']) || $_GET['product_type_name'] == NULL)) {
        echo "<script> window.location = 'product_type_show.php' </script>";
    } else {
        $product_type_id = $_GET['product_type_id'];
        $category_id = $_GET['category_id'];
        $product_type_name = $_GET['product_type_name'];
    }    
    // $get_brand = $brand->get_brand($brand_id);
    // if(mysqli_num_rows($get_brand) > 0) {
    //     $result = mysqli_fetch_assoc($get_brand);
    // }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category_id = $_POST['category_id'];
        $product_type_name = $_POST['product_type_name'];
        $product_type->update_product_type($product_type_id, $category_id, $product_type_name);
    }
?>
<style>
    select {
        display: block;
        font-size: 20px;
        padding: 4px 10px;
        outline: none;
        border: 3px solid var(--light-btn);
        margin-bottom: 10px;
    }
</style>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Thêm danh mục</h1>
                <form action="" method="POST">
                    <!-- Names select <=> hứng giá trị ID của option khi submit -->
                    <select name="category_id" id="">
                        <option value="">--Chọn danh mục--</option>
                        <?php
                        $show_category = $category->show_category();
                        if(mysqli_num_rows($show_category) > 0) {
                            while($row = mysqli_fetch_assoc($show_category)) {
                        ?>
                        <option <?php if($category_id == $row['category_id']) {echo 'SELECTED';} ?>
                        value="<?php echo $row['category_id']?>"> <?php echo $row['category_name'] ?> </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input name="product_type_name" required
                    value = "<?php echo $product_type_name?>"
                    type="text" placeholder="Nhập tên loại sản phẩm">
                    <button class="btn" type="submit">Cập nhật</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 