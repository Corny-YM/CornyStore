<?php
    include "../config.php";
    include "../class/size_class.php";
?>    
<?php
    $size = new Size(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!isset($_GET['size_id']) || $_GET['size_id'] == null) {
        echo "<script> window.location = 'size_show.php' </script>";
    } else {
        // Tao bien luu tru gia tri
        $size_id = $_GET['size_id'];
    }    

    $size->delete_size($size_id);
?>