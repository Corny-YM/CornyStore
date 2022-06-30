<?php

class Orders {
    public $connect; // SAVE CONNECT

    // CONSTRUCTOR
    public function __construct($host, $user, $pw, $db_name) {
        $this->connect = new mysqli($host, $user, $pw, $db_name);
        // check connect
        if ($this->connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
    }

    // ===================METHODS===================
    // SHOW
    public function show_orders() {
        $query = "SELECT * FROM orders";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }


    // INSERT
    public function insert_orders($user_name, $phone_number, $name_tp, 
    $name_qh, $name_xp, $product_name, $quantity, $total, $note) {
        $query = "INSERT INTO `orders`
        (`user_name`, `phone_number`, `name_tp`, `name_qh`, 
        `name_xp`, `product_name`, `quantity`, `total`, `note`) 
        VALUES 
        ('$user_name', '$phone_number', '$name_tp', '$name_qh', 
        '$name_xp', '$product_name', '$quantity', '$total', '$note')";
        $result = mysqli_query($this->connect, $query);
    }


    // DELETE 
    public function delete_orders($user_name, $date_order) {
        $query = "DELETE FROM `orders` 
        WHERE `user_name` = '$user_name' AND `date_order` = '$date_order'";
        $result = mysqli_query($this->connect, $query);
    }

}

?>