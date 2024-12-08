<?php
session_start();
require_once '../models/librarysModel.php';
require_once '../models/searchModel.php';
require_once '../models/librarysModel.php';
require_once '../components/song-item.php';
$jsonData = file_get_contents("php://input");
$request = json_decode($jsonData, true);
if (isset($request["func"]) && isset($request["data"])) {
    $func = $request["func"];
    $data = $request["data"];
    if(function_exists($func)){
        if($request["func"] == "removeSongLibrary"){
            echo $func($_SESSION['user_id'], $data);
        }
        else if($request["func"] == "addSongToLibrary"){
            $func($_SESSION['user_id'], $data);
            if ($_SESSION['user_id']){
                $user_id = $_SESSION['user_id'];
                $songs = getSongLibraryUser($user_id);
                $html = "";
                while ($song = mysqli_fetch_assoc($songs)){
                    $html .= renderSong($song['song_id'], $song['path_img'], $song['song_name'], $song['author_singer_name'], $song['path_audio']);
                };
                echo $html;
            }
        }   
        
    } else {
        echo "Hàm không tồn tại.";
    }
}


?>