<?php
session_start();
require_once '../models/librarysModel.php';
require_once '../models/searchModel.php';
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
            echo $func($_SESSION['user_id'], $data);
        }   
        
    } else {
        echo "Hàm không tồn tại.";
    }
}


?>