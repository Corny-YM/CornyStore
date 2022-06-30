<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/category_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if((!isset($_GET['category_id']) || $_GET['category_id'] == null) &&
    (!isset($_GET['category_name']) || $_GET['category_name'] == null)) {
        echo "<script> window.location = 'category_show.php' </script>";
    } else {
        // Tao bien luu tru gia tri
        $category_id = $_GET['category_id'];
        $category_name = $_GET['category_name']; // theanh
    }    

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $category_name = $_POST['category_name']; // theanh123
        $category->update_category($category_id, $category_name);
    }
?>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Cập nhật danh mục</h1>
                <form action="" method="POST">
                    <input name="category_name" required value="<?php echo $category_name ?>"
                    type="text" placeholder="Nhap ten danh muc">
                    <button class="btn" type="submit">Thêm</button>
                </form>
            </div>
        </div>

<?php
    include "../layouts/footer.php";
?> 