<?php 
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_folder."class/location_class.php";
// include $url_folder."class/cart_class.php";
?>
<?php include $url_inside."links.php"?>
<body>
    <?php include "../layouts/header.php" ?>    
    <?php 
    // CART
    if(!isset($_SESSION['email']) || $_SESSION['email'] == NULL) {
    } else {
        $user_id = $_SESSION['id'];
        $arr_total = [];
        $cost_ship = 1;
        $cart = new Cart(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $show_cart_detail = $cart->show_cart_detail($id);
    } 
    // LOCATION
    $location = new Location(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $show_city = $location->show_city();
    ?>

    <form action="<?php echo $url_folder."orders/orders_insert.php"?>" method="GET"
    id="section" class="section_features-pay">
        <div class="container">
            <div class="bill_info">
                <h4>BILLING INFORMATION</h4>
                <p for="">Recipient's name: <span><?php echo $name?></span></p>
                <div class="phone_number">
                    <label for="phone">Enter your phone number:</label>
                    <input id="phone" name="phone" required>
                </div>
                <div class="delivery_address">
                    <span>Delivery address</span>
                    <div class="delivery_address-item">
                        <div class="address_item city">
                            <div>Province/City:</div>
                            <select name="id_tp" id="city" required>
                                <option value="">--Choose your option--</option>
                                <?php if(mysqli_num_rows($show_city) > 0) {
                                    while($row_city = mysqli_fetch_assoc($show_city)) {?>
                                <option value="<?php echo $row_city['id_tp']?>">
                                    <?php echo $row_city['name_tp']?>
                                </option>
                                <?php }} ?>
                            </select>
                        </div>
                        <div class="address_item district">
                            <div>District:</div>
                            <select name="id_qh" id="district" required>
                                <option value="">--Choose your option--</option>
                            </select>
                        </div>
                        <div class="address_item town">
                            <div>Town/commune/ward:</div>
                            <select name="id_xp" id="town" required>
                                <option value="">--Choose your option--</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="notes">
                    <label for="">Notes</label>
                    <textarea name="note" id=""></textarea>
                </div>
            </div>
            <div class="order_info">
                <h4>YOUR ORDER</h4>
                <div class="order_title">
                    <div>Product <span>(Sản phẩm)</span></div>
                    <div>Provisional <span>(tạm tính)</span></div>
                </div>
                <div class="order_product">
                    <?php 
                    if(mysqli_num_rows($show_cart_detail) > 0) {
                        while($row = mysqli_fetch_assoc($show_cart_detail)) { 
                            $tmp_total = $row['product_price'] * $row['quantity'];
                            $total = $tmp_total-(int)$tmp_total!=0? $tmp_total : $tmp_total.".00";
                            array_push($arr_total, $tmp_total);
                    ?>
                    <div class="order_product-item">
                        <div class="name_quantity">
                            <span><?php echo $row['product_name']?></span>
                            <b>x <?php echo $row['quantity']?></b>
                        </div>
                        <div>$ <?php echo $total?></div>
                    </div>
                    <?php }}?>
                </div>
                <div class="order_shipping">
                    <div>Shipping</div>
                    <div>Same price: $ 1.00</div>
                </div>
                <div class="order_total">
                    <div>Total:</div>
                    <div>$ 
                        <?php 
                        $total_final = 0 + $cost_ship;
                        for($i=0; $i<count($arr_total);$i++) {
                            $total_final+=$arr_total[$i]; 
                        } 
                        echo $total_final;
                        ?>
                    </div>
                </div>
                <div class="order_radio">
                    <input id="cash" type="radio" checked>
                    <label for="cash">Payment on delivery</label>
                </div>
                <button type="submit" class="btn">CHECKOUT</button>
            </div>
        </div>
    </form>

    <?php include "../layouts/footer.php" ?>
    <script>
        $(document).ready(function() {
            $('#city').change(function() {
                var id_city = $(this).val();
                $.get("./router/pay_district_ajax.php", {id_tp: id_city}, function(data) {
                    $('#district').html(data);
                    $('#district').change(function() {
                        var id_district = $(this).val();
                        $.get("./router/pay_town_ajax.php", {id_qh: id_district}, function(data) {
                            $('#town').html(data);
                        })
                    })
                })
            })
        })
    </script>
    <script src="<?php echo $url_base?>js/main.js"></script>
    <script src="<?php echo $url_base?>js/features.js"></script>
    <script src="<?php echo $url_base?>js/owl_carousel.js"></script>
</body>