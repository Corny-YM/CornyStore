<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/size_class.php";
?>    
<?php
    $size = new Size(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $size_name = $_POST['size_name'];
        $size->insert_size($size_name);
    }
?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Thêm Size</h1>
                <form action="" method="POST">
                    <input name="size_name" 
                    required oninput="this.value = this.value.toUpperCase()"
                    type="text" placeholder="Nhap Size">
                    <button class="btn" type="submit">Thêm</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 