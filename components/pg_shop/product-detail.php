<?php
$url_base = "../../"; 
$url_base_2 = "../../";
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_base."admin/class/product_class.php";
include $url_base."admin/class/reviews_class.php";

$product = new Product(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$reviews = new Reviews(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$product_id = $_GET['product_id'];
// PRODUCT
$GetDataImg_desc = $product->GetDataImg_desc($product_id);
$get_product_only = $product->get_product_only($product_id);
$get_product_color = $product->get_product_color($product_id);
$get_product_size = $product->get_product_size($product_id);
$arr_size = [];
$arr_color = [];
// REVIEWS
$show_reviews_by_product_id = $reviews->show_reviews_by_product_id($product_id);
$row_count_reviews = mysqli_fetch_assoc($reviews->count_reviews($product_id)); // số lượng reviews
?>
<?php include $url_inside."links.php" ?>
<link rel="stylesheet" href="<?php echo $url_base?>assets/css/pages/products-detail.css">
<body>
    <?php include $url_folder."layouts/header.php" ?>
    <section id="section" class="section_product-details">
        <!-- DETAILS PRODUCT -->
        <div class="overlay_quick_view">
            <div class="container">
                <div class="quick_view_content">
                    <div class="close_quick_view">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="quick_view_content-detail">

                        <!-- detail_img -->
                        <div class="detail_img swiper">
                            <div class="swiper-wrapper">
                            <?php 
                            if(mysqli_num_rows($GetDataImg_desc) > 0) {
                                $stt = 1;
                                while($row = mysqli_fetch_assoc($GetDataImg_desc)) { ?>
                                <div class="slide_banner swiper-slide">
                                    <img alt="" src="<?php echo $url_base_2."admin/uploads/img_desc/".$row['product_img_desc']?>">
                                </div>
                            <?php  }}?>
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>

                        <!-- detail_info -->
                        <div class="detail_info">
                            <?php if(mysqli_num_rows($get_product_only) > 0) {
                            $row = mysqli_fetch_assoc($get_product_only); ?>
                            <div class="name" style="text-transform:capitalize;"><?php echo $row['product_name']?></div>
                            <div class="price">$ <span>
                                <?php $price_result = $row['product_price'] - floor($row['product_price']); 
                                $result = $price_result != 0? $row['product_price'] : $row['product_price'].".00";
                                echo $result ?>
                            </span>
                            </div>
                            <div class="description"><?php echo $row['product_desc']?></div>
                            <?php } ?>
                            <form method="POST"
                            action="<?php echo $url_folder?>cart/cart_insert.php?product_id=<?php echo $product_id?>">
                                <div class="size">
                                    <p>Size</p>
                                    <select name="size_id" id="">
                                        <option value="#">--Choose your size--</option>
                                        <?php if(mysqli_num_rows($get_product_size) > 0) {
                                            while($row = mysqli_fetch_assoc($get_product_size)) { 
                                            array_push($arr_size, $row['size_name'])?>
                                        <option value="<?php echo $row['size_id'] ?>">
                                            Size <?php echo $row['size_name']?>
                                        </option>
                                        <?php }}?>
                                    </select>
                                </div>
                                <div class="color">
                                    <p>Color</p>
                                    <select name="color_id" required id="">
                                        <option value="#">--Choose your color--</option>
                                        <?php if(mysqli_num_rows($get_product_color) > 0) {
                                            while($row = mysqli_fetch_assoc($get_product_color)) { 
                                            array_push($arr_color, $row['color_name'])?>
                                        <option value="<?php echo $row['color_id'] ?>"><?php echo $row['color_name']?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                                <button class="btn" type="submit">ADD TO CART</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab_contents">
            <div class="container contents">
                <ul class="tab_list">
                    <li class="active">Description</li>
                    <li class="">Additional information</li>
                    <li class="">Reviews (<?php echo $row_count_reviews['number']?>)</li>
                </ul>
                <div class="tab_item-contents">
                    <div class="tab_item tab_desc active show">
                        <p>
                            Aenean sit amet gravida nisi. Nam fermentum est felis, 
                            quis feugiat nunc fringilla sit amet. 
                            Ut in blandit ipsum. Quisque luctus dui at ante aliquet, 
                            in hendrerit lectus interdum. Morbi elementum sapien 
                            rhoncus pretium maximus. Nulla lectus enim, cursus et 
                            elementum sed, sodales vitae eros. Ut ex quam, porta 
                            consequat interdum in, faucibus eu velit. Quisque 
                            rhoncus ex ac libero varius molestie. Aenean tempor 
                            sit amet orci nec iaculis. Cras sit amet nulla libero. 
                            Curabitur dignissim, nunc nec laoreet consequat, 
                            purus nunc porta lacus, vel efficitur tellus augue 
                            in ipsum. Cras in arcu sed metus rutrum iaculis. 
                            Nulla non tempor erat. Duis in egestas nunc.
                        </p>
                    </div>
                    <div class="tab_item tab_info ">
                        <ul>
                            <li>
                                <span class="">Weight</span>
                                <span class="">0.79 kg</span>
                            </li>
                            <li>
                                <span class="">Dimensions</span>
                                <span class="">110 x 33 x 100 cm</span>
                            </li>
                            <li>
                                <span class="">Materials</span>
                                <span class="">60% cotton</span>
                            </li>
                            <li>
                                <span class="">Color</span>
                                <span class="">
                                    <?php foreach($arr_color as $key => $value) {
                                    $last = $key+1;
                                    if($last != count($arr_color)) { echo $value.", ";} 
                                    else { echo $value; }} ?> 
                                </span>
                            </li>
                            <li>
                                <span class="">Size</span>
                                <span class="">
                                    <?php foreach($arr_size as $key => $value) {
                                    $last = $key+1;
                                    if($last != count($arr_size)) { echo $value.", ";} 
                                    else { echo $value; }} ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="tab_item tab_reviews">
                        <div class="tab_reviews-item">
                            <!-- LIST REVIEW USERS -->
                            <ul class="reviews-list">
                                <?php if(mysqli_num_rows($show_reviews_by_product_id) > 0) {
                                    while($row_reviews = mysqli_fetch_assoc($show_reviews_by_product_id)) {?>
                                <li>
                                    <div class="user_img">
                                        <img alt=""
                                        src="<?php echo $url_base."admin/uploads/avatar/".$row_reviews['avatar'] ?>">
                                    </div>
                                    <div class="user_text">
                                        <p class="name"><?php echo $row_reviews['name']?></p>
                                        <p class="comment">
                                            <?php echo $row_reviews['contents']?>
                                        </p>
                                    </div>
                                </li>
                                <?php }} ?>
                            </ul>

                            <!-- FORM POST REVIEW -->
                            <form method="GET"
                            action="<?php echo $url_folder."reviews/reviews_insert.php?"?>">
                                <div class="container">
                                    <i class="warnning">🌽 PLEASE LOGIN BEFORE REVIEW 🌽</i>
                                    <div class="input_review">
                                        <p>Your review</p>
                                        <input type="hidden"
                                        name="product_id" value="<?php echo $product_id;?>">
                                        <textarea name="contents" id="review" maxlength="100"></textarea>
                                    </div>
                                    <button class="btn btn_review">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include $url_folder."layouts/footer.php" ?>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            loop: true,
            
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script src="<?php echo $url_base?>js/main.js"></script>
    <script src="<?php echo $url_base?>js/product.js"></script>
    <script src="<?php echo $url_base?>js/product-detail.js"></script>
    <script src="<?php echo $url_base?>js/owl_carousel.js"></script>
</body>