<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/size_class.php";
?>    
<?php
    $size = new Size(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if((!isset($_GET['size_id']) || $_GET['size_id'] == null)) {
        echo "<script> window.location = 'size_show.php' </script>";
    } else {
        $size_id = $_GET['size_id'];
        $size_name = $_GET['size_name'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $size_name = $_POST['size_name'];
        $size->update_size($size_id, $size_name);
    }

?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Cập nhật Size</h1>
                <form action="" method="POST">
                    <input value="<?php echo $size_name ?>" 
                    name="size_name" required 
                    type="text" placeholder="Nhap Size">
                    <button class="btn" type="submit">Cập nhật</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 