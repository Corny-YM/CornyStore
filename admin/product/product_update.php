<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/category_class.php";
    include "../class/product_type_class.php";
    include "../class/product_class.php";
    include "../class/color_class.php";
    include "../class/size_class.php";
?>    
<?php
    $category = new Category(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $product_type = new Product_type(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $product = new Product(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $color = new Color(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $size = new Size(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if((!isset($_GET['product_id']) || $_GET['product_id'] == NULL) &&
    (!isset($_GET['category_id']) || $_GET['category_id'] == NULL) &&
    (!isset($_GET['product_type_id']) || $_GET['product_type_id'] == NULL)) {
        echo "<script> window.location = 'product_show.php' </script>";
    } else {
        $product_id = $_GET['product_id'];
        $category_id = $_GET['category_id'];
        $product_type_id = $_GET['product_type_id'];
    }
    

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $product->update_product($product_id, $_POST, $_FILES);
    }

    $show_category = $category->show_category();
    $show_product_type = $product_type->show_product_type();
    $show_color = $color->show_color();
    $show_size = $size->show_size();
    $get_product_color = $product->get_product_color($product_id);
    $get_product_size = $product->get_product_size($product_id);

?>
<style>
    .color, .size {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
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
        font-size: 18px;
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
        <h1>Cập nhật sản phẩm</h1>
        <form action="" method="POST" enctype="multipart/form-data">

            <!-- NAME PRODUCT -->
            <?php 
            $GetDataByID = $product->GetDataByID($product_id);
            $row_product = mysqli_fetch_assoc($GetDataByID);
            $product_name = $row_product['product_name'];
            ?>
            <div for="">Nhập tên sản phẩm <span style="color: red;">*</span></div>
            <input value="<?php echo $product_name ?>"
            name="product_name" 
            required type="text"> <!-- value -->

            <!-- NAME CATEGORY -->
            <div for="">Chọn danh mục <span style="color: red;">*</span>
                <i>Giá trị cũ: <?php echo $row_product['category_name'] ?></i>
            </div>
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
            <div for="">Chọn loại sản phẩm <span style="color: red;">*</span>
                <i>Giá trị cũ: <?php echo $row_product['product_type_name'] ?></i>
            </div>
            <select name="product_type_id" id="product_type_id"> <!-- value -->
                <option value="#">--Chọn loại sản phẩm--</option>
            </select>

            <!-- COLOR PRODUCT -->
            <?php $arr_color_id = [];
            if(mysqli_num_rows($get_product_color) > 0) {
                while($dpc = mysqli_fetch_assoc($get_product_color)) {
                    array_push($arr_color_id, $dpc['color_id']);
                }
            } ?>
            <div for="">Chọn màu: <span style="color: red;">*</span></div>
            <div class="color">
                <?php 
                if(mysqli_num_rows($show_color) > 0) {
                    while($row_color = mysqli_fetch_assoc($show_color)) {
                ?>
                <input 
                <?php for($i=0; $i<count($arr_color_id);$i++) {
                    if($arr_color_id[$i] == $row_color['color_id']) {echo "checked";}
                } ?> 
                type="checkbox" id="color_id" name="color_id[]" 
                value="<?php echo $row_color['color_id'] ?>">
                <label for="color_id"> <?php echo $row_color['color_name'] ?> </label>
                <?php }}?>
            </div>

            <!-- SIZE PRODUCT -->
            <?php $arr_size_id = [];
            if(mysqli_num_rows($get_product_size) > 0) {
                while($dpz = mysqli_fetch_assoc($get_product_size)) {
                    array_push($arr_size_id, $dpz['size_id']);
                }
            } ?>
            <div for="">Chọn size: <span style="color: red;">*</span>
            </div>
            <div class="size">
                <?php 
                if(mysqli_num_rows($show_size) > 0) {
                    while($row_size = mysqli_fetch_assoc($show_size)) {
                ?>
                <input <?php for($i=0; $i<count($arr_size_id);$i++) {
                    if($arr_size_id[$i] == $row_size['size_id']) {echo "checked";}
                } ?>
                type="checkbox" id="size_id" name="size_id[]" 
                value="<?php echo $row_size['size_id'] ?>">
                <label for="size_id"> <?php echo $row_size['size_name'] ?> </label>
                <?php }}?>
            </div>

            <!-- PRODUCT PRICE -->
            <div for="">Nhập giá sản phẩm <span style="color: red;">*</span></div>
            <input value="<?php echo $row_product['product_price'] ?>"
            name="product_price" required type="text"> <!-- value -->
            
            <!-- PRODUCT DESCRIPTION -->
            <div for="">Mô tả sản phẩm <span style="color: red;">*</span></div>
            <textarea name="product_desc" required 
            id="editor1" cols="30" rows="10">
                <?php echo $row_product['product_desc'] ?>
            </textarea> <!-- value -->
            
            <!-- PRODUCT IMG -->
            <div for="">
                Ảnh sản phẩm
                <span style="color: red;">*</span>
            </div>
            <input name="product_img" accept="image/*"
            required type="file"> <!-- value -->
            <div class="old_img">
                <p><i>Ảnh sản phẩm cũ</i></p>
                <div class="img_item">
                    <img src="../uploads/<?php echo $row_product['product_img'] ?>" 
                    width="250px" height="156px" alt="">
                </div>
            </div>

            <!-- PRODUCT IMG DESCRIPTION -->
            <div for="">Ảnh mô tả <span style="color: red;">*</span></div>
            <input name="product_img_desc[]" accept="image/*"
            required type="file" multiple> <!-- value -->
            <div class="old_img_desc">
                <p><i>Ảnh mô tả cũ</i></p>
                <div class="img_item">
                    <?php $GetDataImg_desc = $product->GetDataImg_desc($product_id); 
                        if(mysqli_num_rows($GetDataImg_desc) > 0) {
                            while($row_img_desc = mysqli_fetch_assoc($GetDataImg_desc)) {                      
                    ?>
                    <img src="../uploads/img_desc/<?php echo $row_img_desc['product_img_desc'] ?>" 
                    width="250px" height="156px" alt="">
                    <?php }} ?>
                </div>
            </div>


            <button class="btn" type="submit">Cập nhật</button>
        </form>
    </div>
</div>

    <script>
        // Lấy ID tags -> Thay thế thẻ textarea bằng thư viện của CKEDITOR
        const desc = CKEDITOR.replace('editor1');
    </script>

    <script>
        $(document).ready(function() {
            $('#select_category').change(function() {
                // alert($(this).val())
                var value_option = $(this).val();
                // Path send data, Create|Set data, Callback
                $.get("product_insert_ajax.php", 
                {category_id: value_option}, function(data) {
                    $("#product_type_id").html(data);
                })
            })
        })
    </script>

<?php
    include "../layouts/footer.php";
?> 