<?php
session_start();
require_once '../models/librarysModel.php';
$jsonData = file_get_contents("php://input");
$request = json_decode($jsonData, true);
if (isset($request["func"]) && isset($request["data"])) {
    $func = $request["func"];
    $data = $request["data"];
    if(function_exists($func)){

        echo $func($_SESSION['user_id'], $data);
        
    } else {
        echo "Hàm không tồn tại.";
    }
}


?>