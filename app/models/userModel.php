<?php
session_start();
require_once("../../config/config.php");
function getCurrentSong($userid) {
    $conn = connectDB();
    $sql = "SELECT * from current_songs as cs
            join songs as s on cs.song_id = s.song_id
            join song_singers as ss on cs.song_id = ss.song_id
            join author_singers as asi on asi.author_singer_id = ss.singer_id
            where cs.user_id = '$userid'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function saveCurrentSong($userid, $songid, $current_song_time, $song_repeat, $song_random) {
    $conn = connectDB();
    $sql = "UPDATE current_songs set song_id = '$songid',
            current_song_time = '$current_song_time',
            song_repeat = '$song_repeat',
            song_random = '$song_random'
            where user_id = '$userid'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function checkExitStatus($song_id){
    $db = connectDB();
    $userid = isset( $_SESSION["user_id"])?  $_SESSION["user_id"] : 2;
    $sql = "SELECT * FROM song_libraries WHERE user_id = $userid AND song_id = $song_id";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        return true;
    } else {
        return false;
    }
}
?>