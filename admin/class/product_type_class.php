<?php

class Product_type {
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
    public function show_product_type() {
        $query = "SELECT * FROM product_type a
        INNER JOIN category b ON a.category_id = b.category_id
        ORDER BY a.category_id;";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_product_type($category_id, $product_type_name) {
        $query = "INSERT INTO product_type (category_id, product_type_name) 
        VALUES ('$category_id', '$product_type_name')";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='product_type_show.php' </script>";
    }

    // UPDATE 
    public function update_product_type($product_type_id, $category_id, $product_type_name) {
        $query = "UPDATE `product_type` 
        SET `category_id`='$category_id', `product_type_name` = '$product_type_name' 
        WHERE `product_type_id` = '$product_type_id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='product_type_show.php' </script>";
    }

    // DELETE
    public function delete_product_type($product_type_id) {
        $query = "DELETE FROM `product_type` WHERE product_type_id = '$product_type_id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='product_type_show.php' </script>";
    }


}

?>