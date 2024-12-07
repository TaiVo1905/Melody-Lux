<?php
    require_once "../../config/config.php";
    function addSongToLibrary($user_id, $song_id){
        $db = connectDB();
        $sql = "INSERT INTO Song_libraries (user_id, song_id) VALUES ($user_id, $song_id)";
        $result = mysqli_query($db, $sql);
        if($result){
            return true;
        } else {
            return false;
        }
    }
?>