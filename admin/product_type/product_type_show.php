<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/product_type_class.php";
    include "../class/category_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $product_type = new Product_type(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_category = $category->show_category();
    $show_product_type = $product_type->show_product_type();
?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Thêm danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>ID Danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Tên loại sản phẩm</th>
                        <th>More</th>
                    </tr>
                    <?php
                    if(mysqli_num_rows($show_product_type) > 0) {
                        $stt = 0;
                        while($row = mysqli_fetch_assoc($show_product_type)) {
                            $stt++;
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $row['product_type_id'] ?></td>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td><?php echo $row['product_type_name'] ?></td>
                        
                        <td class="interact">
                            <a class="btn update" 
                            href="product_type_update.php?
                            product_type_id=<?php echo $row['product_type_id']?>&
                            category_id=<?php echo $row['category_id']?>&
                            product_type_name=<?php echo $row['product_type_name']?>">
                                Update
                            </a> |
                            <a class="btn delete" 
                            href="product_type_delete.php?product_type_id=<?php echo $row['product_type_id']?>">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php }} ?>
                </table>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 