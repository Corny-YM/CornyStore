<?php

class Category {
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
    public function show_category() {
        $query = "SELECT * FROM category";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_category($category_name) {
        $query = "INSERT INTO category (category_name) 
        VALUES ('$category_name')";
        $result = mysqli_query($this->connect, $query);
        $this->connect->close(); // close connection
        echo "<script> window.location.href='category_show.php' </script>";
    }

    // UPDATE 
    public function update_category($category_id, $category_name) {
        $query = "UPDATE `category` SET `category_name`='$category_name' WHERE `category_id`='$category_id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='category_show.php' </script>";
    }

    // DELETE
    public function delete_category($category_id) {
        $query = "DELETE FROM `category` WHERE category_id = '$category_id'";
        $result = mysqli_query($this->connect, $query);
        $this->connect->close(); // close connection
        echo "<script> window.location.href='category_show.php' </script>";
    }


}

?>