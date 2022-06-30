<?php

class User {
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
    public function show_user() {
        $query = "SELECT * FROM user";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // INSERT
    public function insert_user($POST, $FILES) {
        $email = $POST['email']; 
        $password = $POST['password']; 
        $name = $POST['name']; 
        $role = $POST['role']; 
        $avatar = $FILES['avatar']['name'];

        // Kiểm tra dung lượng file
        $LIMIT_FILE = 1000000;
        if($FILES['avatar']['size'] > $LIMIT_FILE) {
            $alert = 'File cannot be larger than 1MB';
            return $alert;
        }
        move_uploaded_file($FILES['avatar']['tmp_name'], "../uploads/avatar/".$avatar);

        $query = "INSERT INTO `user` (`email`, `password`, `name`, `role`, `avatar`)
        VALUES ('$email', '$password', '$name', '$role', '$avatar')";
        $result = mysqli_query($this->connect, $query);
        // echo "<script> window.location.href='user_show.php' </script>";
    }

    public function insert_user_clients_side($POST, $FILES, $url) {
        $email = $POST['email']; 
        $password = $POST['password']; 
        $name = $POST['name']; 
        $role = "user";
        $avatar = $FILES['avatar']['name'];

        // Kiểm tra dung lượng file
        $LIMIT_FILE = 1000000;
        if($FILES['avatar']['size'] > $LIMIT_FILE) {
            $alert = 'File cannot be larger than 1MB';
            return $alert;
        }
        move_uploaded_file($FILES['avatar']['tmp_name'], $url."uploads/avatar/".$avatar);

        $query = "INSERT INTO `user` (`email`, `password`, `name`, `role`, `avatar`)
        VALUES ('$email', '$password', '$name', '$role', '$avatar')";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // UPDATE 
    public function update_user($id, $POST, $FILES) {
        $email = $POST['email']; 
        $password = $POST['password']; 
        $name = $POST['name']; 
        $role = $POST['role']; 
        $avatar = $FILES['avatar']['name'];

        // Kiểm tra dung lượng file
        $LIMIT_FILE = 5000000;
        if($FILES['avatar']['size'] > $LIMIT_FILE) {
            $alert = 'File cannot be larger than 1MB';
            return $alert;
        }
        move_uploaded_file($FILES['avatar']['tmp_name'], "../uploads/avatar/".$avatar);

        $query = "UPDATE `user` SET
        `email` = '$email',
        `password` = '$password',
        `name` = '$name',
        `role` = '$role',
        `avatar` = '$avatar'
        WHERE `id`='$id'";
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='user_show.php' </script>";
    }

    // DELETE
    public function delete_user($id) {
        $query = "DELETE FROM `user` WHERE `id` = ".$id;
        $result = mysqli_query($this->connect, $query);
        echo "<script> window.location.href='user_show.php' </script>";
    }

    // get data
    public function get_data_by_id($id) {
        $query = "SELECT * FROM user WHERE `id` = ".$id;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // Clients
    public function get_user($email, $password) {
        $query = "SELECT * FROM user WHERE `email`='$email' AND `password` = '$password'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    public function get_user_by_email($email) {
        $query = "SELECT * FROM user WHERE `email`='$email'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }


}

?>