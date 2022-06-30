<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/color_class.php";
?>    
<?php
    $color = new Color(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $color_name = $_POST['color_name'];
        $color->insert_color($color_name);
    }
?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Thêm màu sắc</h1>
                <form action="" method="POST">
                    <input name="color_name" required 
                    type="text" placeholder="Nhap ten mau sac">
                    <button class="btn" type="submit">Thêm</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 