<?php

session_start();

if($_SESSION['role'] == 'admin' &&
(isset($_SESSION['email']) || !($_SESSION['email'] == NULL)) ) {
    echo "<script> alert('Hello, ".$_SESSION['name']." welcome back 💕') </script>";
    header('Location: category/category_show.php');
} else {
    // echo "<script> window.location.href='../components/pg_home/index.php' </script>";
    header("Location: ../components/pg_home/index.php");
}

?>