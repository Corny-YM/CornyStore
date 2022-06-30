<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/reviews_class.php";
    include "../class/user_class.php";
    include "../class/product_class.php";
?>    
<?php
    $reviews = new Reviews(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $user = new User(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $product = new Product(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_reviews = $reviews->show_reviews();
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
                <th width="2%">STT</th>
                <th width="10%">Tên sản phẩm</th>
                <th width="10%">Tên người dùng</th>
                <th width="">Nội dung reviews</th>
                <th width="">More</th>
            </tr>

            <!-- Begin: Take value data -->
            <?php if(mysqli_num_rows($show_reviews) > 0) {
                $stt = 0;
                while($row_reviews = mysqli_fetch_assoc($show_reviews)) { 
                    $stt++?> 
            <tr>
                <td><?php echo $stt ?></td>
                <td>
                    <?php 
                    // echo $row_reviews['product_id'];
                    $row_product = mysqli_fetch_assoc($product->get_product_only($row_reviews['product_id']));
                    echo $row_product['product_name'];
                    ?>
                </td>
                <td>
                    <?php 
                    // echo $row_reviews['user_id'];
                    $get_data_by_id = $user->get_data_by_id($row_reviews['user_id']);
                    $row_user = mysqli_fetch_assoc($get_data_by_id);
                    echo $row_user['name'];
                    ?>
                </td>
                <td><?php echo $row_reviews['contents']?></td>
                <td class="interact" style="min-height: 156px">
                    <a class="btn delete" 
                    href="reviews_delete.php?
                    product_id=<?php echo $row_reviews['product_id']?>&
                    user_id=<?php echo $row_reviews['user_id']?>">
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