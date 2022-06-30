<?php 

Session_start();
Session_destroy();
echo "<script> window.location = '../pg_home/index.php' </script>";

?>