<?php
session_start();
$url_base = "../../"; 
$url_folder = "../";
$url_inside = "router/";
include $url_base."admin/config.php";
include $url_folder."class/cart_class.php";
include $url_folder."class/location_class.php";
include $url_base."admin/class/orders_class.php";

if(isset($_SESSION['email']) || !($_SESSION['email'] == NULL)) {
    // echo "<pre>";
    // var_dump($_GET);
    // echo "</pre>";
    $cart = new Cart(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $location = new Location(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $orders = new Orders(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $user_id = $_SESSION['id'];

    
    $get_city_data = $location->get_city_data($_GET['id_tp']);
    $get_district_data = $location->get_district_data($_GET['id_qh']);
    $get_town_data = $location->get_town_data($_GET['id_xp']);
    $row_city = mysqli_fetch_assoc($get_city_data);
    $row_district = mysqli_fetch_assoc($get_district_data);
    $row_town = mysqli_fetch_assoc($get_town_data);

    // Values insert
    $user_name = $_SESSION['name'];
    $phone_number = $_GET['phone']; 
    $name_tp = $row_city['name_tp'];
    $name_qh = $row_district['name_qh'];
    $name_xp = $row_town['name_xp'];
    $arr_product_name = [];
    $arr_quantity = [];
    $arr_total = [];
    $note = $_GET['note']; 

    $show_cart_detail = $cart->show_cart_detail($user_id);
    if(mysqli_num_rows($show_cart_detail) > 0) {
        while($row = mysqli_fetch_assoc($show_cart_detail)) {
            array_push($arr_product_name, $row['product_name']);
            array_push($arr_quantity, $row['quantity']);
            array_push($arr_total, $row['quantity'] * $row['product_price']);
        }
    }

    for($i=0;$i<count($arr_product_name);$i++) {
        $orders->insert_orders($user_name, $phone_number, $name_tp, $name_qh, $name_xp, 
        $arr_product_name[$i], $arr_quantity[$i], $arr_total[$i], $note);
    }

    $cart->delete_cart_by_user($user_id);

    echo "<script> window.location.href='".$url_folder."pg_features/pay-success.php'</script>";
}

?>