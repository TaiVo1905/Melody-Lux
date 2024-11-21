<?php
    function connectDB () {
        $host = "localhost";
        $database = "melody_lux";
        $user = "melody_lux";
        $pass = "melodylux";

        $conn = mysqli_connect($host, $user, $pass, $database);

        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            return null;
        }

        return $conn;
    }
?>