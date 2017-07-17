<?php

function user_login($email, $pass, $remamber){
    
    $sql = "select * from users where email = '$email' and active = 1";
    $result = query($sql);
    confirm($result);
    if(row_count($result) == 1){
        
        $row = fetch_array($result);
        $db_pass = $row['password'];
        
        if($db_pass == md5($pass)){
            
            if($remamber == "on"){
                setcookie("email", $email, time() + 86400);
            }else{
                $_SESSION['email'] = $email;
            }
            
            return true;
        } else {
            return false;
        }
    } else{
        return false;
    }
}

function login_validate(){
    
    $errors = [];
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email      = clean($_POST['email']);
        $password   = clean($_POST['password']);
        $remamber   = isset($_POST['remamber']);
        
        
        if($email == ""){
            $errors[] = "Email can't be empty!";
        }
        
        if($password == ""){
            $errors[] = "Password can't be empty!";
        }
        
        if(!empty($errors)){
            
            foreach($errors as $error){
                echo $error;
                echo "<br>";
            }
        } else{
            
            if(user_login($email, $password, $remamber)){
                
                redirect("admin.php");
            } else{
                echo "Your credentials is not correct!";
            }
        }        
    }
}

function user_logged_in(){
    
    if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
        return true;
    }
}