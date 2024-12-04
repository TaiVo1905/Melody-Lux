<?php
    require_once "../../config/config.php";
    function removeSongLibrary($user_id, $song_id){
        $db = connectDB();
        $sql = "DELETE FROM song_libraries WHERE user_id = '$user_id' AND song_id = '$song_id'";
        $result = mysqli_query($db, $sql);
        if(!$result){
            return false;
        };
        return true;
    }
?>