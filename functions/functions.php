<?php 


function site_url(){
    
    return "http://localhost/login";
}

function clean($string){
    return htmlentities($string);
}

function redirect($location){
    return header("Location: {$location}");
}

function set_message($message){
    if(!empty($message)){
        $_SESSION['message'] = $message;
    }else{
        $message = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function token_genarator(){
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    
    echo $_SESSION['token'];
}

function email_exist($email){
    
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = query($sql);
    if(row_count($result) == 1){
        return true;
    }
}

function username_exist($username){
    
    $sql = "SELECT * FROM users WHERE userName = '$username'";
    $result = query($sql);
    if(row_count($result) == 1){
        return true;
    }
}

function email_validation_code_check($email, $code){
    
    $sql = "select * from users where validationCode = '$code' and email = '$email'";
    $result = query($sql);
    confirm($result);

    if(row_count($result) == 1){

        return true;
    }
}

