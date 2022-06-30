<?php

class Wishlist {
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
    public function show_wishlist($user_id, $product_id) {
        $query = "SELECT * FROM wishlist 
        WHERE `user_id` = '$user_id' AND `product_id` = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function show_wishlist_detail($user_id) {
        $query = "SELECT a.user_id, b.* FROM `wishlist` a
        INNER JOIN product b ON a.product_id = b.product_id
        WHERE a.user_id = '$user_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_wishlist($user_id, $product_id) {
        $query = "INSERT INTO `wishlist` (`user_id`, `product_id`)
        VALUES ('$user_id', '$product_id')";
        $result = mysqli_query($this->connect, $query);
    }
    // DELETE
    public function delete_wishlist($user_id, $product_id) {
        $query = "DELETE FROM `wishlist` 
        WHERE `user_id` = '$user_id' AND `product_id` = '$product_id'";
        $result = mysqli_query($this->connect, $query);
    }

    // count data
    public function count_wishlist($user_id) {
        $query = "SELECT COUNT(product_id) as 'number' FROM `wishlist` 
        WHERE `user_id` = ".$user_id;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
}

?>