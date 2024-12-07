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
    function getSongLibraryUser($userid){
        $db = connectDB();
        $sql = "SELECT s.song_id, s.song_name, s.path_img, s.path_audio, asi.author_singer_name FROM Song_Libraries as sl
                JOIN songs as s on sl.song_id = s.song_id
                JOIN song_singers as ss on s.song_id = ss.song_id
                JOIN author_singers as asi on asi.author_singer_id = ss.singer_id
                WHERE sl.user_id = '$userid'";
        $results = mysqli_query($db, $sql);
        if(!$results){
            return false;
        };
        return $results;
    }
?>