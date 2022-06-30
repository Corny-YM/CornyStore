<?php

class Product {
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
    // AJAX METHODS
    public function show_product_type_ajax($category_id) {
        $query = "SELECT * FROM product_type 
        WHERE category_id = '$category_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    } 

    // SHOW
    public function show_product() {
        $query = "SELECT a.*, b.product_type_name, c.category_name
        FROM product a
        INNER JOIN product_type b on a.product_type_id = b.product_type_id
        INNER JOIN category c on b.category_id = c.category_id
        ORDER BY a.category_id, a.product_type_id";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function show_product_litmit($limit_number) {
        $query = "SELECT a.*, b.product_type_name, c.category_name
        FROM product a
        INNER JOIN product_type b on a.product_type_id = b.product_type_id
        INNER JOIN category c on b.category_id = c.category_id
        ORDER BY a.category_id, a.product_type_id LIMIT ".$limit_number;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_product($POST, $FILES) {
        // TAKE VALUES FROM POST & FILES
        $category_id = $POST['category_id'];
        $product_type_id = $POST['product_type_id'];
        $product_name = $POST['product_name'];
        $product_price = $POST['product_price'];
        $product_desc = $POST['product_desc'];
        $product_img = $FILES['product_img']['name'];


        // Kiểm tra xem file tồn tại chưa
        if(file_exists("../uploads/$product_img")) {
            $alert = "File existed!";
            return $alert;
        }
        // Kiểm tra dung lượng file
        $LIMIT_FILE = 1000000;
        if($FILES['product_img']['size'] > $LIMIT_FILE) {
            $alert = 'File cannot be larger than 1MB';
            return $alert;
        }
        move_uploaded_file($FILES['product_img']['tmp_name'], 
        "../uploads/".$product_img);


        $query = "INSERT INTO `product`(category_id, 
        product_type_id, product_name, 
        product_price, product_desc, product_img) 
        VALUES
        ('$category_id', '$product_type_id', '$product_name', 
        '$product_price', '$product_desc', '$product_img')";
        $result = mysqli_query($this->connect, $query);

        // upload img_des
        if($result) {
            $query = "SELECT * FROM product 
            ORDER BY product_id DESC LIMIT 1";
            $result = mysqli_fetch_assoc(mysqli_query($this->connect, $query));
            $product_id = $result['product_id'];
            $file_tmps = $FILES['product_img_desc']['tmp_name'];
            $file_names = $FILES['product_img_desc']['name'];

            // insert table product_img_desc
            foreach($file_names as $key => $value) {
                move_uploaded_file($file_tmps[$key], "../uploads/img_desc/".$value);

                $query = "INSERT INTO product_img_desc 
                (product_id, product_img_desc) 
                VALUES
                ('$product_id','$value')";
                $result = mysqli_query($this->connect, $query);
            }

            // insert table product_color
            $arr_color_id = $POST['color_id'];
            $this->insert_product_color($product_id, $arr_color_id);

            // insert table product_size
            $arr_size_id = $POST['size_id'];
            $this->insert_product_size($product_id, $arr_size_id);

        }
        echo "<script> window.location.href='product_show.php' </script>";
    }

    // UPDATE 
    public function update_product($product_id, $POST, $FILES) {
        $category_id = $POST['category_id'];
        $product_type_id = $POST['product_type_id'];
        $product_name = $POST['product_name'];
        $product_price = $POST['product_price'];
        $product_desc = $POST['product_desc'];
        $product_img = $FILES['product_img']['name'];

        // Kiểm tra dung lượng file
        $LIMIT_FILE = 1000000;
        if($FILES['product_img']['size'] > $LIMIT_FILE) {
            $alert = 'File cannot be larger than 1MB';
            return $alert;
        }
        move_uploaded_file($FILES['product_img']['tmp_name'], 
        "../uploads/".$product_img);

        $query = "UPDATE `product` SET 
        `category_id`='$category_id',`product_type_id`='$product_type_id',
        `product_name`='$product_name',`product_price`='$product_price',
        `product_desc`='$product_desc',`product_img`='$product_img' 
        WHERE `product_id`='$product_id'";
        $result = mysqli_query($this->connect, $query);

        // upload img_des
        if($result) {
            $GetDataImg_desc = $this->GetDataImg_desc($product_id);
            $row = mysqli_fetch_all($GetDataImg_desc);
            $file_tmps = $FILES['product_img_desc']['tmp_name'];
            $file_names = $FILES['product_img_desc']['name'];

            for($i = 0; $i < count($file_names); $i++) {
                move_uploaded_file($file_tmps[$i], "../uploads/img_desc/".$file_names[$i]);
                $query = "UPDATE `product_img_desc` 
                SET `product_img_desc`='$file_names[$i]' 
                WHERE `id`=".$row[$i][0]." AND `product_id`='$product_id'";
                $result = mysqli_query($this->connect, $query);
            }
        }

        
        // delete then insert table product_color
        $arr_color_id = $POST['color_id'];
        $this->delete_product_color($product_id);
        $this->insert_product_color($product_id, $arr_color_id);
        
        // delete then insert table product_size
        $arr_size_id = $POST['size_id'];
        $this->delete_product_size($product_id);
        $this->insert_product_size($product_id, $arr_size_id);
        

        echo "<script> window.location.href='product_show.php' </script>";
    }

    // DELETE
    public function delete_product($product_id) {
        // DELETE COLOR AND SIZE BY ID_PRODUCT
        $this->delete_product_color($product_id);
        $this->delete_product_size($product_id);
        
        // PRODUCT_IMG_DESC
        $query = "DELETE FROM `product_img_desc` 
        WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        
        // PRODUCT
        $query = "DELETE FROM `product` WHERE `product`.`product_id` = '$product_id'";
        $result = mysqli_query($this->connect, $query);       
        echo "<script> window.location.href='product_show.php' </script>";
    }


    // take data
    public function get_product_only($product_id) {
        $query = "SELECT * FROM product
        WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function get_product_color($product_id) {
        $query = "SELECT a.id, a.color_id, c.color_name, b.* FROM `product_color` a
        INNER JOIN product b on a.product_id=b.product_id
        INNER JOIN color c on a.color_id=c.color_id
        WHERE a.product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function insert_product_color($product_id, $arr_color_id) {
        foreach($arr_color_id as $key => $value) {
            $query = "INSERT INTO `product_color`(`product_id`, `color_id`) 
            VALUES ('$product_id','$value')";
            $result = mysqli_query($this->connect, $query);
        }
    }
    public function delete_product_color($product_id) {
        $query = "DELETE FROM `product_color` WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
    }
    public function get_product_size($product_id) {
        $query = "SELECT a.id, a.size_id, c.size_name, b.* FROM `product_size` a
        INNER JOIN product b on a.product_id=b.product_id
        INNER JOIN size c on a.size_id=c.size_id
        WHERE a.product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function insert_product_size($product_id, $arr_size_id) {
        foreach($arr_size_id as $key => $value) {
            $query = "INSERT INTO `product_size`(`product_id`, `size_id`) 
            VALUES ('$product_id','$value')";
            $result = mysqli_query($this->connect, $query);
        }
    }
    public function delete_product_size($product_id) {
        $query = "DELETE FROM `product_size` WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
    }

    public function GetDataByID($product_id) {
        $query = "SELECT * FROM product a
        INNER JOIN product_type b ON a.product_type_id = b.product_type_id
        INNER JOIN category c ON b.category_id = c.category_id
        WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function GetDataImg_desc($product_id) {
        $query = "SELECT * FROM product_img_desc 
        WHERE product_id = '$product_id'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function GetDataByImg_desc($product_img_desc) {
        $query = "SELECT * FROM `product_img_desc` a 
        WHERE a.product_img_desc = '$product_img_desc'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

}

?>