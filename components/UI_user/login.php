<?php  
session_start();
$url_base = "../../";
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_base."admin/class/user_class.php";

$user = new User(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = mysqli_fetch_assoc($user->get_user($_POST['email'], $_POST['password']));
    if($result) {
        $_SESSION["id"] = $result['id'];
        $_SESSION["email"] = $result['email'];
        $_SESSION["name"] = $result['name'];
        $_SESSION["role"] = $result['role'];
        echo "<script> window.location.href='".$url_folder."pg_home/index.php'</script>";
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác')</script>";
    }
}
?>
<?php include $url_inside."links.php"?>
<body>
    <div class="container">
        <h1>Please Login</h1>
        <form action="" method="POST">
            <div class="form-control">
                <input name="email" type="text" required>
                <label>Email</label>
            </div>
            <div class="form-control">
                <input name="password" type="password" required>
                <label>Password</label>
            </div>
            <button class="btn">Login</button>
            <p class="text">Don't have an account? 
                <a href="register.php">Register</a> 
            </p>
        </form>
    </div>
    <script src="<?php echo $url_base?>js/form_wave_input.js"></script>
</body>
</html>