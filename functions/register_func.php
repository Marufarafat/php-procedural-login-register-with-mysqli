<?php

function register_user($fName, $lName, $uName, $email, $pass){
    
    $fName  = escape($fName);
    $lName  = escape($lName);
    $uName  = escape($uName);
    $email  = escape($email);
    $pass   = escape($pass);
    
    $password = md5($pass);
    $validationCode = md5($uName + microtime());
    
    $sql = "INSERT INTO users(firstName, lastName, userName, email, password, validationCode)";
    $sql.= " VALUES('$fName', '$lName', '$uName', '$email', '$password', '$validationCode');";
    
    $result = query($sql);
    confirm($result);
    
    register_mail($email, $validationCode);
    
    return true;
}

function registration_validate(){
    
    $errors = [];
    $max_email = 36;
    $max = 16;
    $min = 3;
    $min_pass = 6;
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $firstname          = clean($_POST['first_name']);
        $lastname           = clean($_POST['last_name']);
        $username           = clean($_POST['username']);
        $email              = clean($_POST['email']);
        $password           = clean($_POST['password']);
        $confirm_password   = clean($_POST['confirm_password']);
        
        if(strlen($firstname) < $min || strlen($firstname) > $max || $firstname == ""){
            $errors[] = "First name can't be less than {$min} and more than {$max} later or empty!";
        }
        
        if(strlen($lastname) < $min || strlen($lastname) > $max || $lastname == ""){
            $errors[] = "Last name can't be less than {$min} and more than {$max} later or empty!";
        }
        
        if(strlen($username) < $min || strlen($username) > $max || $username == ""){
            $errors[] = "Username can't be less than {$min} and more than {$max} later or empty!";
        } elseif(username_exist($username) == true){
            $errors[] = "Sorry! that username already exist in our database.";
        }
        
        if(strlen($email) < $min || strlen($email) > $max_email || $email == ""){
            $errors[] = "Email can't be less than {$min} and more than {$max_email} later or empty!";
        } elseif(email_exist($email) == true){
            $errors[] = "Sorry! that email already registerd.";
        }
        
        if($password != $confirm_password){
            $errors[] = "Password didn't match!";
        } elseif(strlen($password) <= $min || strlen($password) >= $max || $password == ""){
            $errors[] = "Password can't be less than {$min_pass} and more than {$max} later or empty!";
        }
        
        if(!empty($errors)){
            
            foreach($errors as $error){
                echo $error;
                echo "<br>";
            }
        } else{
            if(register_user($firstname, $lastname, $username, $email, $password) == true){
                
                set_message("Please check your email or email spam folder for activation link.");
                redirect("index.php");
            } else{
                
                set_message("Registration is not available. Please try this later.");
                redirect("index.php");
            }
            

        }
    }
}

function activate_user(){
    
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        
        if(isset($_GET['email'])){
            
            $email      = escape(clean($_GET['email']));
            $code       = escape(clean($_GET['code']));
            
            $sql = "select id from users where email = '$email' and validationCode = '$code'";
            $result = query($sql);
            confirm($result);
            
            if(row_count($result)){
                $sql2 = "update users set active = 1, validationCode = 0 where email = '$email' and validationCode = '$code'";
                $result2 = query($sql2);
                confirm($result2);
                
                set_message("Account has been activated. Please login.");
                
                redirect("login.php");
            } else{
                echo "Activation link is not valid.";
            }
        }
    }
}