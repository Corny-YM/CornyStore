<?php

class Location {
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
    public function show_city() {
        $query = "SELECT * FROM `vn_tinhthanhpho`";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function show_district($id_tp) {
        $query = "SELECT * FROM `vn_quanhuyen` WHERE `id_tp`= '$id_tp'";
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function show_town($id_qh) {
        $query = "SELECT * FROM `vn_xaphuongthitran` WHERE `id_qh`=".$id_qh;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

    // get data
    public function get_city_data($id_tp) {
        $query = "SELECT * FROM `vn_tinhthanhpho` WHERE `id_tp`=".$id_tp;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function get_district_data($id_qh) {
        $query = "SELECT * FROM `vn_quanhuyen` WHERE `id_qh`=".$id_qh;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }
    public function get_town_data($id_xp) {
        $query = "SELECT * FROM `vn_xaphuongthitran` WHERE `id_xp`=".$id_xp;
        $result = mysqli_query($this->connect, $query);
        return $result;
    }

}

?>