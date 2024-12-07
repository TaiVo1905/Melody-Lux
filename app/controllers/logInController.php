<?php
    require_once './app/models/loginModel.php';
    function handleLogin() {
        $userEmail = $_POST['emailLogin'];
        $userPassword = $_POST['passwordLogin'];
        $result = loginUser($userEmail, $userPassword);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['user_name'];
            $_SESSION['user_img'] = $user['user_img'];      
            header("location: discover");
            exit();
        }else {
            echo "<script>alert('Invalid email or password!')</script>";
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginbtn'])) { 
        handleLogin();
        // if($fail){
            //     // echo `<div style = " color: red">Fail</div>`;
            //     echo $fail;
            // }
        }
        
    include_once './app/components/register_login.php';
?>