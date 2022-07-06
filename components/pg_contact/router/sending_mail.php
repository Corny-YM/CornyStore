<?php

if((isset($_POST['email']) || $_POST['email'] != NULL) &&
(isset($_POST['message']) || $_POST['message'] != NULL)) {
    $from_email = $_POST['email'];
    $to = "ntay9356@gmail.com";
    $subject = "Feedback from customer";
    $message = $_POST['message'];
    $header  =  "From:".$from_email;
    // $header .=  "Cc:other@exmaple.com \r\n";

    $success = mail($to, $subject, $message, $header);
    if( $success == true ){ echo "Đã gửi mail thành công..."; }
    else{ echo "Không gửi đi được..."; }
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>