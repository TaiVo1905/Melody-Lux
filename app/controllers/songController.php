<?php
require_once("../models/userModel.php");
$jsonData = file_get_contents("php://input");
$request = json_decode($jsonData, true);
if (isset($request["func"]) && isset($request["data"])) {
    $func = $request["func"];
    $data = $request["data"];
    if(function_exists($func)){
        $func($data[0], $data[1], $data[2], $data[3], $data[4]);
    } else {
        echo "Hàm không tồn tại.";
    }
}

if(isset($_GET["func"]) && isset($_GET["userid"])) {
    $func = $_GET["func"];
    $userid = $_GET["userid"];
    if(function_exists($func)) {
        $result = $func($userid);
        $users = array(); // Lấy dữ liệu từ kết quả truy vấn và thêm vào mảng 
    while ($row = mysqli_fetch_assoc($result)) { $users[] = $row; }
    }
    echo json_encode($users);
}
?>