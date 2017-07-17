<?php

function recover_validate(){
        
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $email = clean($_POST['email']);
        $token = clean($_POST['token']);
        
        if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']){
            
            if(email_exist($email)){
                
                $validation_code = md5($email + microtime());
                
                setcookie("recover_temp", $validation_code, time() + 900);
                
                $validation_code = escape($validation_code);
                $email = escape($email);
                
                $sql = "update users set validationCode = '$validation_code' where email = '$email'";
                $result = query($sql);
                confirm($result);
                
                if(recover_mail($email, $validation_code)){
                    
                    set_message("Please check your inbox.");
                    redirect("index.php");
                    
                } else{
                    
                    echo "Email can't be sent.";
                }
            } else {
                echo "This email does not exist.";
            }
        } else{
            redirect("login.php");
        }
    }
}


function validate_code(){
    
    if(isset($_COOKIE['recover_temp'])){
        if(!isset($_GET['email']) || !isset($_GET['code']) || empty($_GET['email']) || empty($_GET['code'])){
            echo "This recovary link is not valid.";
        } else{
            if(isset($_POST['code'])){
                
                $email = escape(clean($_GET['email']));
                $code = escape(clean($_POST['code']));
                
                if(email_validation_code_check($email, $code) == true){
                    
                    #setcookie("recover_temp", $validation_code, time() + 600);
                    redirect("reset.php?email=$email&code=$code");
                } else{
                    
                    echo "validation code is not valid";
                }
                
            }
        }
    } else{
        set_message("Your validaton cookie has expired.");
        redirect("recover.php");
    }
}

function reset_validate(){
    
    if(isset($_COOKIE['recover_temp'])){
        
        $email = $_GET['email'];
        $code  = $_GET['code'];
        
        if(!isset($email) || !isset($code) || empty($email) || empty($code)){
            
            echo "This reset link is not valid.";
        } else{
            
            if(isset($_SESSION['token']) && isset($_POST['token']) && $_POST['token'] == $_SESSION['token']){

                $password         = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                
                if($password != $confirm_password){
                    
                    echo "password did not match";
                } else{
                    
                    if(email_validation_code_check($email, $code) != true){
                        
                        echo "reset link is not valid";
                    } else{
                        
                        $password = escape(md5($_POST['password']));
                        $email    = escape(clean($email));
                        $validationCode = escape($code);
                        
                        $sql = "UPDATE users SET password  = '$password', validationCode = '0' WHERE email = '$email' AND validationCode = '$validationCode'";
                        $result = query($sql);
                        confirm($result);
                        
                        set_message("Password has updated. Please login your account.");
                        redirect("login.php");
                    }
                }
            }

        }
    } else{
        set_message("Your validaton cookie has expired.");
        redirect("recover.php");
    }
}

