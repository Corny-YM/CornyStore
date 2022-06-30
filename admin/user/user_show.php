<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/user_class.php";
?>    
<?php
    $user = new User(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_user = $user->show_user();
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
                <th width="2%">ID</th>
                <th width="">Email</th>
                <th width="">Mật khẩu</th>
                <th width="">Tên người dùng</th>
                <th width="40%">Ảnh đại diện</th>
                <th width="">Vai trò</th>
                <th width="">More</th>
            </tr>

            <!-- Begin: Take value data -->
            <?php
            if(mysqli_num_rows($show_user) > 0) {
                $stt=0;
                while($row = mysqli_fetch_assoc($show_user)) {
                    $stt++;
            ?> 
            <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['name']?></td>
                <td><img src="<?php echo "../uploads/avatar/".$row['avatar']?>" 
                width="80%" style="height:250px;" alt=""></td>
                <td><?php echo $row['role']?></td>

                <td class="interact" style="min-height: 156px">
                    <a class="btn update" 
                    href="user_update.php?id=<?php echo $row['id']?>">
                        Update
                    </a> |
                    <a class="btn delete" 
                    href="user_delete.php?id=<?php echo $row['id']?>">
                        Delete
                    </a>
                </td>
            </tr>
            <?php }}?>
        </table>
    </div>
</div>
<?php
    include "../layouts/footer.php";
?> 