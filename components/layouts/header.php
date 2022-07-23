<?php
session_start();
$url_base_to_admin = "../../admin/";
// $url_base = "../../";
// $url_folder = "../";
// $url_inside = "router/";
// include $url_base."admin/config.php";
include $url_base."admin/class/user_class.php";
include $url_folder."class/cart_class.php";
include $url_folder."class/wishlist_class.php";

if(!isset($_SESSION["email"]) || $_SESSION["email"]==NULL) {
    $islogged = false;
    // session_destroy();
} else {
    $islogged = true;
    $id = $_SESSION["id"];
    $email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $role = $_SESSION["role"];
    $user = new User(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $cart = new Cart(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $wishlist = new Wishlist(DB_HOST, DB_USER, DB_PASS, DB_NAME);


    // User
    $get_user_by_email = $user->get_user_by_email($email);
    $row = mysqli_fetch_assoc($get_user_by_email);
    // Cart
    $show_cart_detail = $cart->show_cart_detail($id);
    $total = 0;
    $cart_number_row = mysqli_num_rows($cart->count_cart($id));
    $cart_number = mysqli_fetch_assoc($cart->count_cart($id));
    // Wishlist
    $show_wishlist_detail_ori = $wishlist->show_wishlist_detail($id);
    $show_wishlist_detail = $wishlist->show_wishlist_detail($id);
    $row_count_wishlist = mysqli_fetch_assoc($wishlist->count_wishlist($id));
}
?>
<header id="header" class="header_home ">
    <div class="container">
        <a href=<?php echo $url_folder."pg_home/index.php"?> class="header_logo">
            <b>CORNY</b>STORE
        </a>
        <ul class="header_menu">
            <li class="item home">
                <a href=<?php echo $url_folder."pg_home/index.php"?>>Home</a>
            </li>
            <li class="item products">
                <a href=<?php echo $url_folder."pg_shop/index.php"?>>Shop</a>
            </li>
            <li class="item features">
                <a href=<?php echo $url_folder."pg_features/index.php"?>>Features</a>
            </li>
            <li class="item ">
                <a href="">Blog</a>
            </li>
            <li class="item about">
                <a href=<?php echo $url_folder."pg_about/index.php"?>>About</a>
            </li>
            <li class="item contact">
                <a href=<?php echo $url_folder."pg_contact/index.php"?>>Contact</a>
            </li>
            <li>
                <?php 
                if($islogged == false) { ?>
                <a href=<?php echo $url_folder."UI_user/login.php"?> class="login">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    LOGIN
                </a>
                <?php } else {?>
                <div class="user_info">
                    <div class="user_info-img">
                        <img src="<?php echo $url_base."admin/uploads/avatar/".$row['avatar']?>" alt="">
                    </div>
                    <div class="user_info-name">Corny</div>
                    <ul class="user_nav">
                        <li><a href="#">
                            <div class="icon">
                                <i class="fa-solid fa-address-card"></i>
                            </div>
                            Your profile
                        </a></li>
                        <li><a href="<?php echo $url_folder?>UI_user/logout.php">
                            <div class="icon">
                                <i class="fa-solid fa-right-to-bracket"></i>
                            </div>
                            Sign out
                        </a></li>
                    </ul>
                </div>
                <?php }?>
            </li>
        </ul>

        <div class="header_nav">
            <?php 
            if($islogged == false) { ?>
            <a href=<?php echo $url_folder."UI_user/login.php"?> class="login">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                LOGIN
            </a>
            <?php } else {?>
            <div class="user_info">
                <div class="user_info-img">
                    <img src="<?php echo $url_base."admin/uploads/avatar/".$row['avatar']?>" alt="">
                </div>
                <div class="user_info-name">Corny</div>
                <ul class="user_nav">
                    <li><a href="#">
                        <div class="icon">
                            <i class="fa-solid fa-address-card"></i>
                        </div>
                        Your profile
                    </a></li>
                    <li><a href="<?php echo $url_folder?>UI_user/logout.php">
                        <div class="icon">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </div>
                        Sign out
                    </a></li>
                </ul>
            </div>
            <?php }?>  

            <!-- ============== -->
            <div class="icon search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="icon cart">
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="icon_quantity">
                    <?php if($islogged) {
                        echo $cart_number['number'];
                    } else { echo "0";}?>
                </div>
            </div>
            <div class="icon heart">
                <i class="fa-solid fa-heart"></i>
                <div class="icon_quantity">
                    <?php if($islogged) {
                        echo $row_count_wishlist['number'];
                    } else { echo "0";}?>
                </div>
            </div>
            <div class="icon bars">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </div>

    <div class="header_search">
        <form class="container">
            <div class="icon-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <button class="btn_icon-search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input type="text" name="search" placeholder="Search...">
        </form>
    </div>
</header>

<!-- overlay -->
<div class="header_cart overlay">
    <div class="header_cart-container">
        <div class="header_cart-container_title">
            <span>YOUR CART</span>
            <div class="icon">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="container">
            <?php if($islogged && ($cart_number['number'] > 0)) {?>
            <ul class="header_cart-container_list">
                <?php if(mysqli_num_rows($show_cart_detail) > 0) {
                    while($row_cart = mysqli_fetch_assoc($show_cart_detail)) {
                        $total = $total + ($row_cart['product_price'] * $row_cart['quantity'])?>
                <li>
                    <a class="item_img"
                    href="<?php echo $url_folder."cart/cart_delete.php?product_id=".$row_cart['product_id']?>">
                        <img alt=""
                        src="<?php echo $url_base."admin/uploads/".$row_cart['product_img'] ?>">
                    </a>
                    <div class="item_info">
                        <a href="<?php echo $url_folder."pg_shop/product-detail.php?product_id=".$row_cart['product_id']?>" 
                        class="info_name"><?php echo $row_cart['product_name']?></a>
                        <div class="info_number">
                            <span class="quantity"><?php echo $row_cart['quantity']?></span> X
                            <span class="price">$<?php echo $row_cart['product_price']?></span>
                        </div>
                    </div>
                </li>
                <?php }}?>
            </ul>
            <div class="interact">
                <div class="header_cart-container_total">
                    Total: $
                    <span>
                        <?php 
                        $total_show = $total-(int)$total!=0?$total : $total."00";
                        echo $total_show;?>
                    </span>
                </div>
                <div class="header_cart-container_btns">
                    <a href="<?php echo $url_folder."pg_features/index.php"?>" class="btn">VIEW CART</a>
                    <a href="<?php echo $url_folder."pg_features/pay.php"?>" class="btn">CHECK OUT</a>
                </div>
            </div>
            <?php } else{?>
            <div class="no_cart">
                <h3>🛒 <i>Your cart is empty</i> 🛒</h3>
                <img src="<?php echo $url_base."assets/imgs/empty-cart.png"?>" alt="">
            </div>
            <?php }?>
        </div>
    </div>
</div>

<!-- wishlist -->
<div class="wishlist overlay">
    <div class="wishlist-container">
        <div class="wishlist-container_title">
            <span>YOUR WISHLIST</span>
            <div class="icon">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="container">
            <?php if($islogged) {?>
            <ul class="wishlist-container_list">
                <?php if(mysqli_num_rows($show_wishlist_detail_ori) > 0) {
                    while($row_wishlist_ori = mysqli_fetch_assoc($show_wishlist_detail_ori)) { ?>
                <li>
                    <a class="item_img"
                    href="<?php echo $url_folder."wishlist/wishlist_delete.php?product_id=".$row_wishlist_ori['product_id']?>">
                        <img alt=""
                        src="<?php echo $url_base."admin/uploads/".$row_wishlist_ori['product_img']?>">
                    </a>
                    <div class="item_info">
                        <a href="<?php echo $url_folder."pg_shop/product-detail.php?product_id=".$row_wishlist_ori['product_id']?>" 
                        class="info_name"><?php echo $row_wishlist_ori['product_name']?></a>
                        <div class="info_number">
                            <span class="price">$
                                <?php echo $row_wishlist_ori['product_price']?>
                            </span>
                        </div>
                    </div>
                </li>
                <?php }}?>
            </ul>
            <?php } else{?>
            <div class="no_cart">
                <h3>🛒 <i>Your wishlist is empty</i> 🛒</h3>
                <img src="<?php echo $url_base."assets/imgs/empty-cart.png"?>" alt="">
            </div>
            <?php }?>
        </div>
    </div>
</div>