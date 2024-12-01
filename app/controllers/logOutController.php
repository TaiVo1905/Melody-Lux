<?php
    session_start();
    function logOut () {
        session_unset();
        session_destroy();
    }
    if(isset($_GET["func"])) {
        if($_GET["func"] == "logOut") {
            logOut();
        }
    }
?>