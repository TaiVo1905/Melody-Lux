<?php
    require_once '../components/register_login.php';
    require_once '../models/loginModel.php';


    function handleRegister(){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $code = $_POST['otpCode'];

        $username_error = $password_error = $email_error = $code_error = '';
        // Validate the input fields
        if (!validate_username($username)) {
            $username_error = "Invalid username";
        }

        if (!validate_password($password)) {
            $password_error = "Invalid password";
        }

        if (!validate_email($email)) {
            $email_error = "Invalid email";
        }
        
        if(empty($_COOKIE["code"]) || $code !== $_COOKIE["code"] ){
            $code_error = "Invalid code";
        }
        if (empty($username_error) && empty($password_error) && empty($email_error) && empty($code_error)) {
            register_user($username, $password, $email) ;
            
        }else{
            echo "Registration failed. Please try again.";
        }
    }
    handleRegister()
?>