<?php
    include_once './app/components/register_login.php';
    require_once './app/models/loginModel.php';
    function handleLogin() {
        $userEmail = $_POST['emailLogin'];
        $userPassword = $_POST['passwordLogin'];
        $result = loginUser($userEmail, $userPassword);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            echo $user['user_name'];
            session_start();
            $_SESSION['username'] = $user['user_name'];
            $_SESSION['user_img'] = $user['user_img'];      
            header('location: discover');
        }else {
            echo "Invalid email or password";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        handleLogin();
    }
  
?>