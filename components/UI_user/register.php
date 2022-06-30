<?php  
$url_base = "../../";
$url_base_to_admin = "../../admin/";
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_base."admin/class/user_class.php";
?>
<?php
$user = new User(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['password_confirm'] == $_POST['password']) {
        $isSigned = $user->get_user_by_email($_POST['email']); 
        if($isSigned) {
            echo "<script>alert('Email này đã được đăng ký')</script>";
        } else {
            $result = $user->insert_user_clients_side($_POST, $_FILES, $url_base_to_admin);
            if($result) {
                echo "<script> window.location.href='login.php'</script>";
            }
        }
    } else {
        echo '<script>alert("Mật khẩu xác nhận không chính xác")</script>';
    }
}

?>

<?php include $url_inside."links.php"?>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-control_file">
                <label>Chọn ảnh đại diện</label>
                <input type="file" name="avatar" id="img"
                accept="image/*" required>
            </div>
            <div class="form-control">
                <input type="text" name="name" required>
                <label>Họ và tên</label>
            </div>
            <div class="form-control">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="form-control">
                <input id="password" type="password" 
                name="password" required>
                <label>Password</label>
            </div>
            <div class="form-control">
                <input id="confirm_password" type="password" 
                name="password_confirm" required>
                <label>Password Confirm</label>
            </div>
            <button class="btn">Register</button>
            <p class="text">Already have an account? 
                <a href="login.php">Login</a> 
            </p>
        </form>
    </div>
    <script src="<?php echo $url_base?>js/form_wave_input.js"></script>
</body>
</html>