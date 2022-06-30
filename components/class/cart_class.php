<?php

class Cart {
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
    public function show_cart($user_id, $product_id) {
        $query = "SELECT * FROM cart 
        WHERE `user_id` = '$user_id' AND `product_id` = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function show_cart_detail($user_id) {
        $query = "SELECT a.user_id, a.quantity, b.* FROM `cart` a
        INNER JOIN product b ON a.product_id = b.product_id
        WHERE a.user_id = '$user_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_cart($user_id, $product_id) {
        $show_cart = $this->show_cart($user_id, $product_id);
        if(mysqli_num_rows($show_cart) > 0) {
            $row = mysqli_fetch_assoc($show_cart);
            $new_quantity = $row['quantity'] + 1;
            $query = "UPDATE `cart` SET `quantity`='$new_quantity' 
            WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
            $result = mysqli_query($this->connect, $query);
        } else {
            $query = "INSERT INTO `cart` (`user_id`, `product_id`, `quantity`)
            VALUES ('$user_id', '$product_id', '1')";
            $result = mysqli_query($this->connect, $query);
        }
    }

    // UPDATE
    public function update_cart($user_id, $product_id, $quantity) {       
        $query = "UPDATE `cart` SET `quantity`='$quantity' 
        WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
        $result = mysqli_query($this->connect, $query);
    }

    // DELETE
    public function delete_cart($user_id, $product_id) {
        $query = "DELETE FROM `cart` 
        WHERE `user_id` = '$user_id' AND `product_id` = '$product_id'";
        $result = mysqli_query($this->connect, $query);
    }

    public function delete_cart_by_user($user_id) {
        $query = "DELETE FROM `cart` WHERE `user_id` = '$user_id'";
        $result = mysqli_query($this->connect, $query);
    }

    // get data
    public function isExisted($user_id, $product_id) {
        $query = "SELECT * FROM cart WHERE id = '$user_id' AND product_id = '$product_id'";
        $ex = mysqli_query($this->connect, $query);
        $row = mysqli_num_rows($ex);
        if($row > 0) {
            return true;
        } else {
            return false;
        }
    }

    // count data
    public function count_cart($user_id) {
        $query = "SELECT COUNT(product_id) as 'number' FROM `cart` 
        WHERE `user_id` = ".$user_id;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

}

?>