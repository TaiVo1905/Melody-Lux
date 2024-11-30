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
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['user_name'];
            $_SESSION['user_img'] = $user['user_img'];      
            header('location: discover');
        }else {
            return "Invalid email or password";
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginbtn'])) { 
        $fail = handleLogin();
        if($fail){
            // echo `<div style = " color: red">Fail</div>`;
            echo $fail;
        }
    }
  
?>