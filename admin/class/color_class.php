<?php

class Color {
    public $connect;

    // CONSTRUCTOR
    public function __construct($host, $user, $pw, $db_name) {
        $this->connect = new mysqli($host, $user, $pw, $db_name);
        if ($this->connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
    }

    // SHOW
    public function show_color() {
        $query = "SELECT * FROM color";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_color($color_name) {
        $query = "INSERT INTO color (color_name) 
        VALUES ('$color_name')";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='color_show.php' </script>";
    }

    // UPDATE 
    public function update_color($color_id, $color_name) {
        $query = "UPDATE `color` SET `color_name`='$color_name' WHERE `color_id`='$color_id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='color_show.php' </script>";
    }

    // DELETE
    public function delete_color($color_id) {
        $query = "DELETE FROM `color` WHERE color_id = '$color_id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='color_show.php' </script>";
    }
}

?>