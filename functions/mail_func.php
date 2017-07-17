<?php

function send_mail($email, $subject, $msg, $header){
    
    return mail($email, $subject, $msg, $header);
}

function register_mail($email, $code){
    
    $subject = "Account active";
    $msg = "Please check the link below to active your accooount. <br><br><br>
            ".site_url()."/activate.php?email=$email&code=$code <br>";
    $header = "From: noreply@domain.local";
    
    return send_mail($email, $subject, $msg, $header);
}

function recover_mail($email, $code){
    
    $subject = "Recover your account.";
    $msg = "Here is your password reset code {$code}. <br><br><br>
            ".site_url()."/code.php?email=$email&code=$code <br>";
    $header = "From: noreply@domain.local";
    
    return send_mail($email, $subject, $msg, $header);
    
}