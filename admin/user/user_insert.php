<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/user_class.php";
?>    
<?php
    $user = new User(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user->insert_user($_POST, $_FILES);
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
                <h1>Thêm người dùng</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input name="name" required
                    type="text" placeholder="Nhập tên người dùng">

                    <input name="email" required
                    type="email" placeholder="Nhập email">

                    <input name="password" required
                    type="password" placeholder="Nhập mật khẩu">

                    <select name="role" id="" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>

                    <div for="">
                        Ảnh đại diện
                    </div>
                    <input name="avatar" accept="image/*" type="file">

                    <button class="btn" type="submit">Thêm</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 