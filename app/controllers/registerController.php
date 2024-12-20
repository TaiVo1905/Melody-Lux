<?php
    require_once './app/models/registerModel.php';
    
    
    function handleRegister($username, $email, $password, $code){
        $username_error = $password_error = $email_error = $code_error = '';
        // Validate the input fields
        if (!validate_username($username)) {
            $username_error = "Invalid username";
        }
        
        if (!validate_password($password)) {
            $password_error = "Invalid password";
        }
        
        if (!validate_email($email) || $email != $_COOKIE["email"]) {
            $email_error = "Invalid email";
        }
        
        if(empty($_COOKIE["code"]) || $code != $_COOKIE["code"] ){
            $code_error = "Invalid code";
        }
        if (empty($username_error) && empty($password_error) && empty($email_error) && empty($code_error)) {
            if(register_user($username, $password, $email)) {
                header('location: logIn');
                exit();
            }
        }else{
            echo "<script>alert('$username_error, $password_error, $email_error, $code_error')</script>";
        }
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registersub'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $code = $_POST['otpCode'];
        if(!checkEmail($email)){
            handleRegister($username, $email, $password, $code);
        }else{
            echo "<script>alert('Email already exists!')</script>";
        }
    }
    require_once './app/components/register_login.php';
?>