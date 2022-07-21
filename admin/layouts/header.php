<?php 
session_start();

if($_SESSION['role'] == 'admin' &&
(isset($_SESSION['email']) || !($_SESSION['email'] == NULL)) ) {
} else {
    echo "<script> window.location.href='../index.php' </script>";
}

$url_base = "../../";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lý</title>
    
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
    crossorigin="anonymous"></script>
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="<?php echo $url_base?>assets/imgs/logo_website.png">
    <!-- Link source ckeditor -->
    <script src="../ckeditor/ckeditor.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/layouts_css/style.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="header">
        <h1><b>CORNY</b> STORE</h1>
    </div>

    <section id="section" class="contents">
        <div class="left_contents">
            <ul class="left_contents-list">
                <li class="left_contents-item">
                    <div class="item_btn-option">DANH MỤC</div>
                    <ul>
                        <li>
                            <a href="../category/category_insert.php">Thêm danh mục</a>
                        </li>
                        <li>
                            <a href="../category/category_show.php">Danh sách danh mục</a>
                        </li>
                    </ul>
                </li>
                <li class="left_contents-item">
                    <div class="item_btn-option">LOẠI SẢN PHẨM</div>
                    <ul>
                        <li>
                            <a href="../product_type/product_type_insert.php">Thêm loại sản phẩm</a>
                        </li>
                        <li>
                            <a href="../product_type/product_type_show.php">Danh sách loại sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li class="left_contents-item">
                    <div class="item_btn-option">SẢN PHẨM</div>
                    <ul>
                        <li>
                            <a href="../product/product_insert.php">Thêm sản phẩm</a>
                        </li>
                        <li>
                            <a href="../product/product_show.php">Danh sách sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li class="left_contents-item">
                    <div class="item_btn-option">QUẢN LÝ COLORS</div>
                    <ul>
                        <li>
                            <a href="../color/color_insert.php">Thêm màu sắc</a>
                        </li>
                        <li>
                            <a href="../color/color_show.php">Danh sách màu sắc</a>
                        </li>
                    </ul>
                </li>
                <li class="left_contents-item">
                    <div class="item_btn-option">QUẢN LÝ SIZE</div>
                    <ul>
                        <li>
                            <a href="../size/size_insert.php">Thêm size</a>
                        </li>
                        <li>
                            <a href="../size/size_show.php">Danh sách size</a>
                        </li>
                    </ul>
                </li>
                <li class="left_contents-item">
                    <div class="item_btn-option">QUẢN LÝ ĐƠN HÀNG</div>
                    <ul>
                        <li>
                            <a href="../orders/orders_show.php">Danh sách đơn hàng</a>
                        </li>
                    </ul>
                </li>
                <li class="left_contents-item">
                    <div class="item_btn-option">QUẢN LÝ REVIEWS</div>
                    <ul>
                        <li>
                            <a href="../reviews/reviews_show.php">Danh sách reviews</a>
                        </li>
                    </ul>
                </li>

                <!-- LAST ITEM -->
                <li class="left_contents-item">
                    <div class="item_btn-option">QUẢN LÝ USERS</div>
                    <ul>
                        <li>
                            <a href="../user/user_insert.php">Thêm người dùng</a>
                        </li>
                        <li>
                            <a href="../user/user_show.php">Danh sách người dùng</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>



