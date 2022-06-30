<?php

class Reviews {
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
    public function show_reviews() {
        $query = "SELECT * FROM reviews";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function show_reviews_by_product_id($product_id) {
        $query = "SELECT * FROM `reviews` a 
        INNER JOIN user b on a.user_id = b.id
        WHERE a.product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_reviews($product_id, $user_id, $contents) {
        $query = "INSERT INTO `reviews`(`product_id`, `user_id`, `contents`) 
        VALUES ('$product_id','$user_id','$contents')";
        $result = mysqli_query($this->connect, $query);
    }

    // DELETE
    public function delete_reviews($product_id, $user_id) {
        $query = "DELETE FROM `reviews`
        WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='reviews_show.php' </script>";
    }


    // isReviewed
    public function isReviewed($product_id, $user_id) {
        $query = "SELECT * FROM reviews 
        WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'";
        $result = mysqli_query($this->connect, $query);

        if(mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // count reviews
    public function count_reviews($product_id) {
        $query = "SELECT COUNT(a.contents) AS 'number' 
        FROM `reviews` a
        WHERE a.product_id = ".$product_id;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

}

?>