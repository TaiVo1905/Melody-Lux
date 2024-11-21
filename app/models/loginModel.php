<?php
require_once("../../config/config.php");
function loginUser($conn, $email, $Password) {
    $conn= connectDB();
    $query = "SELECT * FROM Users WHERE email = '$email' AND password = '$Password'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            return $user;
        }
    }
    return false;
}
?>
