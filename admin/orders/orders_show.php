<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/orders_class.php";
?>    
<?php
    $orders = new Orders(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_orders = $orders->show_orders();
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
                <th width="10%">Họ và tên</th>
                <th width="10%">SĐT</th>
                <th width="">Địa chỉ</th>
                <th width="10%">Ngày đặt</th>
                <th width="10%">Tổng tiền</th>
                <th width="">More</th>
            </tr>

            <!-- Begin: Take value data -->
            <?php if(mysqli_num_rows($show_orders) > 0) {
                $stt = 0;
                while($row = mysqli_fetch_assoc($show_orders)) { 
                    $stt++?> 
            <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $row['user_name']?></td>
                <td><?php echo $row['phone_number']?></td>
                <td><?php echo $row['name_xp'].", ".$row['name_qh'].", ".$row['name_tp']?></td>
                <td><?php echo $row['date_order'] ?></td>
                <td>$<?php echo $row['total'] ?></td>
                <td class="interact" style="min-height: 156px">
                    <a class="btn " 
                    href="orders_show_details.php?
                    orders_id=<?php echo $row['id']?>">
                        Xem
                    </a> |
                    <a class="btn delete" 
                    href="orders_delete.php?
                    user_name=<?php echo $row['user_name']?>&
                    date_order=<?php echo $row['date_order']?>">
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