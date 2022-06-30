<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/color_class.php";
?>    
<?php
    $color = new Color(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if((!isset($_GET['color_id']) || $_GET['color_id'] == null)) {
        echo "<script> window.location = 'color_show.php' </script>";
    } else {
        $color_id = $_GET['color_id'];
        $color_name = $_GET['color_name'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $color_name = $_POST['color_name'];
        $color->update_color($color_id, $color_name);
    }

?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Cập nhật màu sắc</h1>
                <form action="" method="POST">
                    <input value="<?php echo $color_name ?>" 
                    name="color_name" required 
                    type="text" placeholder="Nhap ten mau sac">
                    <button class="btn" type="submit">Cập nhật</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 