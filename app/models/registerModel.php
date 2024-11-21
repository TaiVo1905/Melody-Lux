<?php
    function registerUser($db, $email, $password, $username) {

        $hashedPassword = md5($password); 
    
        $sql = "INSERT INTO Users (email, password, username) VALUES (?, ?, ?)";
        
        if ($stmt = mysqli_prepare($db, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPassword, $username);
            
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                echo "Error " . mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
                return false;
            }
        } else {
            echo "Error: " . mysqli_error($db);
            return false;
        }
    }
    
?>