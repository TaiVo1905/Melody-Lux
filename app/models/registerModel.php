<?php
    require_once("./config/config.php");
    function validate_username($username)
    {
        return ctype_alnum($username);
    }

    function validate_password($password)
    {
        return strlen($password) >= 8;
    }
    function validate_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function checkEmail($email){
        $conn = connectDB();
        $sql = "SELECT * FROM Users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    function register_user($username, $password, $email)   {
        $conn = connectDB ();
        $sql = "INSERT INTO Users (user_name, password, email)
        VALUES ('$username', '$password', '$email')";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }
?>