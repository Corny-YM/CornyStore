<?php

class Size {
    public $connect;

    // CONSTRUCTOR
    public function __construct($host, $user, $pw, $db_name) {
        $this->connect = new mysqli($host, $user, $pw, $db_name);
        if ($this->connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
    }

    // SHOW
    public function show_size() {
        $query = "SELECT * FROM size";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_size($size_name) {
        $query = "INSERT INTO size (size_name) 
        VALUES ('$size_name')";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='size_show.php' </script>";
    }

    // UPDATE 
    public function update_size($size_id, $size_name) {
        $query = "UPDATE `size` SET `size_name`='$size_name' WHERE `size_id`='$size_id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='size_show.php' </script>";
    }

    // DELETE
    public function delete_size($size_id) {
        $query = "DELETE FROM `size` WHERE size_id = '$size_id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='size_show.php' </script>";
    }
}

?>