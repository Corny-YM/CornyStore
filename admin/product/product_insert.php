<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/category_class.php";
    include "../class/product_class.php";
    include "../class/color_class.php";
    include "../class/size_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $product = new Product(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $color = new Color(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $size = new Size(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // $color_id = $_POST['color_id'];
        // var_dump($color_id);
        // echo $color_id[2];
        $insert_product = $product->insert_product($_POST, $_FILES);
        if(isset($insert_product)) {
            echo "
            <script type='text/javascript'>
                alert('$insert_product');
            </script>";
        }
    }

    $show_category = $category->show_category();
    $show_color = $color->show_color();
    $show_size = $size->show_size();
?>
<style>
    .color, .size {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        max-width: 60%;
        font-size: 18px;
    }
    .color_item {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 8px
    }
    .color_item > label {
    }
    .color label, 
    .size label {
        display: block;
        margin-right: 10px;
    }
    .color input[type='checkbox'], 
    .size input[type='checkbox'] {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }
    select {
        display: block;
        font-size: 20px;
        padding: 4px 10px;
        outline: none;
        border: 3px solid var(--light-btn);
        margin-bottom: 10px;
        min-width: 210px;
    }
    form > div {
        font-size: 20px;
        margin-bottom: 4px;
    }
    form > input {
        margin-bottom: 10px;
    }
    form > textarea {
        padding: 10px 20px;
        width: 500px;
    }
</style>
        <div class="right_contents">
            <div class="right_contents-item right_contents-category_add">
                <h1>Thêm sản phẩm</h1>
                <!-- enctype="multipart/form-data" ==> Cho phép POST FILES -->
                <form action="" method="POST" enctype="multipart/form-data">

                    <!-- NAME PRODUCT -->
                    <div for="">Nhập tên sản phẩm <span style="color: red;">*</span></div>
                    <input name="product_name" required type="text"> <!-- value -->

                    <!-- NAME CATEGORY -->
                    <div for="">Chọn danh mục <span style="color: red;">*</span></div>
                    <select name="category_id" id="select_category">
                        <option value="">--Chọn danh mục--</option>
                        <?php
                        if(mysqli_num_rows($show_category)) {
                            while($row = mysqli_fetch_assoc($show_category)) {
                        ?>
                        <option value="<?php echo $row['category_id']?>">
                            <?php echo $row['category_name'] ?>
                        </option>
                        <?php }} ?>
                    </select>

                    <!-- NAME PRODUCT_TYPE -->
                    <div for="">Chọn loại sản phẩm <span style="color: red;">*</span></div>
                    <select name="product_type_id" id="product_type_id"> <!-- value -->
                        <option value="#">--Chọn loại sản phẩm--</option>
                    </select>

                    <!-- COLOR PRODUCT -->
                    <div for="">Chọn màu: <span style="color: red;">*</span></div>
                    <div class="color">
                        <?php 
                        if(mysqli_num_rows($show_color) > 0) {
                            while($row_color = mysqli_fetch_assoc($show_color)) {
                        ?>
                        <div class="color_item">
                            <input type="checkbox" id="color_id" name="color_id[]" 
                            value="<?php echo $row_color['color_id'] ?>">
                            <label> <?php echo $row_color['color_name'] ?> </label>
                        </div>
                        <?php }}?>
                    </div>

                    <!-- SIZE PRODUCT -->
                    <div for="">Chọn size: <span style="color: red;">*</span></div>
                    <div class="size">
                        <?php 
                        if(mysqli_num_rows($show_size) > 0) {
                            while($row_size = mysqli_fetch_assoc($show_size)) {
                        ?>
                        <input type="checkbox" id="size_id" name="size_id[]" 
                        value="<?php echo $row_size['size_id'] ?>">
                        <label> <?php echo $row_size['size_name'] ?> </label>
                        <?php }}?>
                    </div>


                    <!-- PRODUCT PRICE -->
                    <div for="">Nhập giá sản phẩm <span style="color: red;">*</span></div>
                    <input name="product_price" required type="text"> <!-- value -->
                    
                    <!-- PRODUCT DESCRIPTION -->
                    <div for="">Mô tả sản phẩm <span style="color: red;">*</span></div>
                    <textarea name="product_desc" required id="editor1" cols="30" rows="10"></textarea> <!-- value -->
                   
                    <!-- PRODUCT IMG -->
                    <div for="">
                        Ảnh sản phẩm
                        <span style="color: red;">*</span>
                    </div>
                    <input name="product_img" accept="image/*"
                    required type="file"> <!-- value -->

                    <!-- PRODUCT IMG DESCRIPTION -->
                    <div for="">Ảnh mô tả <span style="color: red;">*</span></div>
                    <input name="product_img_desc[]" accept="image/*"
                    required type="file" multiple> <!-- value -->


                    <button class="btn" type="submit">Thêm</button>
                </form>
            </div>
        </div>

    <script>
        // Lấy ID tags -> Thay thế thẻ textarea bằng thư viện của CKEDITOR
        CKEDITOR.replace('editor1')
    </script>

    <script>
        $(document).ready(function() {
            $('#select_category').change(function() {
                // alert($(this).val())
                var value_option = $(this).val();
                // Path send data, Create|Set data, Callback
                $.get("product_insert_ajax.php", {category_id: value_option}, function(data) {
                    $("#product_type_id").html(data);
                })
            })
        })
    </script>

<?php
    include "../layouts/footer.php";
?> 