<?php 
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
// include $url_folder."class/cart_class.php";
?>
<?php include $url_inside."links.php" ?>
<body>
    <?php include "../layouts/header.php" ?>    

    <!-- Lay product id, xo du lieu, lay toan bo quantity bi thay doi xong update -->
    <?php 
    $cart = new Cart(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $check_data = false;
    if(isset($_SESSION['id']) || !($_SESSION['id'] == NULL)) { 
        $user_id = $_SESSION['id'];
        $show_cart_detail = $cart->show_cart_detail($user_id);
        $arr_total = [];
        $cost_ship = 1;
        if(mysqli_num_rows($show_cart_detail) > 0) {
            $check_data = true;
        }
    }
    ?>

    <div id="section" class="section_features">
        <div class="container">
            <?php if($check_data) {?>
            <form class="cart_info"
            action="<?php echo $url_folder?>cart/cart_update.php" method="GET">
                <table class="cart_info-table">
                    <tr class="table_head">
                        <th class="column-1">Product</th>
                        <th class="column-2"></th>
                        <th class="column-3">Price</th>
                        <th class="column-4">Quantity</th>
                        <th class="column-5">Total</th>
                    </tr>
                    <?php if(mysqli_num_rows($show_cart_detail) > 0) {
                        while($row = mysqli_fetch_assoc($show_cart_detail)) {
                            $tmp_total = $row['product_price']*$row['quantity'];
                            $total = $tmp_total-(int)$tmp_total!=0? $tmp_total : $tmp_total.".00";
                            array_push($arr_total, $tmp_total);?>
                    <tr class="table_row">
                        <th class="column-1">
                            <a class="img_item"
                            href="<?php echo $url_folder."cart/cart_delete.php?product_id=".$row['product_id']?>">
                                <img alt="" width="60px" height="80px"
                                src="<?php echo $url_base."admin/uploads/".$row['product_img']?>">
                            </a>
                            <p style=" margin-top: 4px;
                            width: 165px;
                            white-space: nowrap;
                            overflow: hidden !important;
                            text-overflow: ellipsis;">
                                <?php echo $row['product_name']?>
                            </p>
                        </th>
                        <th class="column-2">
                            <span style=" display: inline-block;
                            width: 165px;
                            white-space: nowrap;
                            overflow: hidden !important;
                            text-overflow: ellipsis;">
                                <?php echo $row['product_name'] ?>
                            </span>
                        </th>
                        <th class="column-3"><?php echo $row['product_price'] ?></th>
                        <th class="column-4">
                            <div class="num_product">
                                <div class="btn_num_product-down">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <input name="<?php echo $row['product_id']?>" 
                                value="<?php echo $row['quantity']?>"
                                type="number" class="input_num_product">
                                <div class="btn_num_product-up">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </th>
                        <th class="column-5"><?php echo $total?></th>
                    </tr>
                    <?php }}?>
                </table>
                <div class="cart_interact">
                    <div class="cart_interact_coupon">
                        <input type="text" placeholder="Coupon Code" 
                        class="coupon_input" name="coupon">
                        <button type="submit" class="coupon_btn btn">
                            APPLY COUPON
                        </button>
                    </div>
                    <div class="cart_interact_update">
                        <button type="submit" class="update_btn btn">
                            UPDATE CART
                        </button>
                    </div>
                </div>
            </form>
            <div class="cart_totals">
                <div class="cart_totals-contents">
                    <h4>CART TOTALS</h4>
                    <?php 
                    $tmp_sum_total = 0;
                    for($i=0; $i<count($arr_total);$i++) 
                    {$tmp_sum_total+=$arr_total[$i]; } 
                    $sum_total = $tmp_sum_total-(int)$tmp_sum_total!=0?$tmp_sum_total:$tmp_sum_total."00" ?>
                    <div class="subtotal">
                        <div class="subtotal_title">Subtotal:</div>
                        <div class="subtotal_price">$<?php echo $sum_total?></div>
                    </div>
                    <div class="shipping">
                        <div class="shipping_title">Shipping:</div>
                        <div class="shipping_price">$1.00</div>
                    </div>
                    <div class="total">
                        <div class="total_title">Total:</div>
                        <div class="total_price">$
                            <?php $tmp_total_final = $sum_total + $cost_ship;
                            $total_final = $tmp_total_final-(int)$tmp_total_final!=0 ?
                            $tmp_total_final:$tmp_total_final."00"; 
                            echo $total_final;?>
                        </div>
                    </div>
                    <div>
                        <a href="pay.php" class="checkout_btn btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
            <?php } else {?>
            <div class="empty_cart">
                <h1>🛒 <i>Your cart is empty</i> 🛒</h1>
                <img src="<?php echo $url_base."assets/imgs/empty-cart.png"?>" alt="">
            </div>
            <?php }?>
        </div>
    </div>

    <?php include "../layouts/footer.php" ?>

    <script src="<?php echo $url_base?>js/main.js"></script>
    <script src="<?php echo $url_base?>js/features.js"></script>
    <script src="<?php echo $url_base?>js/owl_carousel.js"></script>
</body>

