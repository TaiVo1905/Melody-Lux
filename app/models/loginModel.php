<?php
require_once("./config/config.php");
function loginUser($email, $Password) {
    $conn= connectDB();
    $query = "SELECT * FROM Users WHERE email = '$email' AND password = '$Password'";
    $result = mysqli_query($conn, $query);
    if ($result) {  
        return $result;
    }else{
        return false;
    }
}
?>
