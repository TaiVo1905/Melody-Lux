<?php
    session_start();
    if(isset($_GET["func"]) && $_GET["func"] == "getUserid") {
        if (isset($_SESSION['user_id'])) {
            echo $_SESSION['user_id'];
        } else {
            echo null;
        }
    }
?>