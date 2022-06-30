<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/product_class.php";
?>    
<?php
    $product = new Product(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_product = $product->show_product();
?>
<style>
    td {
        object-fit: fit-content;
        max-width: 200px;
        word-wrap: break-word;
    }
    .interact {
        flex-direction: column;
    }
</style>
    <div class="right_contents">
        <div class="right_contents-item right_contents-category_add">
            <h1>Danh sách sản phẩm</h1>

            <table style="overflow-x: scroll">
                <tr>
                    <th width="3% ">STT</th>
                    <th width="3% ">ID</th>
                    <th width="5%">Danh mục</th>
                    <th width="5%">Loại sản phẩm</th>
                    <th width="10%">Tên</th>
                    <th width="5%">Giá</th>
                    <th width="15%">Mô tả</th>
                    <th width="30%">Image</th>
                    <th width="10%">More</th>
                </tr>

                <!-- Begin: Take value data -->
                <?php
                $arr_color_id = [];
                if(mysqli_num_rows($show_product) > 0) {
                    $stt=0;
                    while($row = mysqli_fetch_assoc($show_product)) {
                        $stt++;
                ?> 
                <tr>
                    <td><?php echo $stt ?></td>
                    <td><?php echo $row['product_id'] ?></td>
                    <td><?php echo $row['category_name'].' ('.$row['category_id'].') ' ?></td>
                    <td><?php echo $row['product_type_name'].' ('.$row['product_type_id'].') ' ?></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td><?php echo $row['product_price'] ?></td>
                    <td><?php echo $row['product_desc'] ?></td>
                    <td> 
                        <img src="<?php echo "../uploads/".$row['product_img']?>"
                        width="80%" style="height:250px;" alt="">
                    </td>
                    <td class="interact" style="min-height: 156px">
                        <a class="btn update" 
                        href="product_update.php?
                        product_id=<?php echo $row['product_id']?>&
                        category_id=<?php echo $row['category_id']?>&
                        product_type_id=<?php echo $row['product_type_id']?>">
                            Update
                        </a> |
                        <a class="btn delete" 
                        href="product_delete.php?
                        product_id=<?php echo $row['product_id']?>">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php }}?>
                <!-- End: Take value data -->

            </table>
            
        </div>
    </div>
<?php
    include "../layouts/footer.php";
?> 