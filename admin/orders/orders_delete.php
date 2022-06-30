<?php
    include "../config.php";
    include "../layouts/header.php";
    include "../class/orders_class.php";
?>    
<?php
    $orders = new Orders(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if((!isset($_GET['user_name']) || $_GET['user_name'] == null) || 
    (!isset($_GET['date_order']) || $_GET['date_order'] == null)) {
        echo "<script> window.location = 'orders_show.php' </script>";
    } else {
        $user_name = $_GET['user_name'];
        $date_order = $_GET['date_order'];
        $orders->delete_orders($user_name, $date_order);
        echo "<script> window.location = 'orders_show.php' </script>";
    }
?>