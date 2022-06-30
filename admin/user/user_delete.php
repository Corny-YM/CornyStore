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

// Kiểm tra xem file tồn tại chưa
if(file_exists("../uploads/avatar/".$row['avatar'])) {
    unlink("../uploads/avatar/".$row['avatar']);
}
$user->delete_user($id);

?>