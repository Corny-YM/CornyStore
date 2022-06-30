<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/product_type_class.php";
    include "../class/category_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $product_type = new Product_type(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category_id = $_POST['category_id'];
        $product_type_name = $_POST['product_type_name'];
        $product_type->insert_product_type($category_id, $product_type_name);
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
                    <select name="category_id" id="">
                        <option value="">--Chọn danh mục--</option>
                        <?php
                        $show_category = $category->show_category();
                        if(mysqli_num_rows($show_category) > 0) {
                            while($row = mysqli_fetch_assoc($show_category)) {
                        ?>
                        <option value="<?php echo $row['category_id']?>"> <?php echo $row['category_name'] ?> </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input name="product_type_name" required
                    type="text" placeholder="Nhập tên loại sản phẩm">
                    <button class="btn" type="submit">Thêm</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 