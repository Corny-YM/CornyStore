<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/user_class.php";
?>    
<?php
$user = new User(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($_GET['id'] == NULL || !isset($_GET['id'])) {
    echo "<script> window.location = 'user_show.php' </script>";
} else {
    $id = $_GET['id'];
}

$get_data_by_id = $user->get_data_by_id($id);
$row = mysqli_fetch_assoc($get_data_by_id);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem file tồn tại chưa
    if(file_exists("../uploads/avatar/".$row['avatar'])) {
        unlink("../uploads/avatar/".$row['avatar']);
    }
    $user->update_user($id, $_POST, $_FILES);
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
        min-width: 210px;
    }
    form {
        display: flex;
        flex-direction: column;
    }
    form input,
    form select {
        width: 250px;
        margin-bottom: 10px

    }
</style>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Cập nhật người dùng</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>HEllo</h1>
                    <input name="name" required value="<?php echo $row['name']?>"
                    type="text" placeholder="Nhập tên người dùng">

                    <input name="email" required value="<?php echo $row['email']?>"
                    type="email" placeholder="Nhập email">

                    <input name="password" required
                    type="password" placeholder="Nhập mật khẩu">

                    <select name="role" id="" required>
                        <option <?php if($row['role']=='user'){echo "SELECTED";}?> value="user">User</option>
                        <option <?php if($row['role']=='admin'){echo "SELECTED";}?> value="admin">Admin</option>
                    </select>

                    <div for="">
                        Ảnh đại diện
                    </div>
                    <input name="avatar" accept="image/*" type="file">
                    <div><img src="<?php echo "../uploads/avatar/".$row['avatar']?>" 
                    width="auto" style="height:250px;" alt=""></div>

                    <button class="btn" type="submit">Cập nhật</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 