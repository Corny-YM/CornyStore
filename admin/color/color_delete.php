<?php
    include "../config.php";
    include "../class/color_class.php";
?>    
<?php
    $color = new Color(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!isset($_GET['color_id']) || $_GET['color_id'] == null) {
        echo "<script> window.location = 'color_show.php' </script>";
    } else {
        // Tao bien luu tru gia tri
        $color_id = $_GET['color_id'];
    }    

    $color->delete_color($color_id);
?>