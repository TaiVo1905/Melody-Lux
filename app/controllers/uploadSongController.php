<?php
    require_once("./app/models/uploadSongModel.php");
    session_start();
    if($_SESSION["user_id"]) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [];
            $data[0] = $_POST["songName"]; 
            $target_file = "./storage/uploads/" . basename($_FILES["songLink"]["name"]);
            $data[1] = $target_file;
            $data[2] = $_POST["author"];
            $userId = $_SESSION["user_id"];
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
            if (file_exists($target_file)) {
                echo "<script>alert('Xin lỗi, bài hát đã tồn tại.')</script>";
                $uploadOk = 0;
            }
        
            if ($fileType != "mp3" && $fileType != "m4a") {
                echo "<script>alert('Xin lỗi, bài hát không đúng định dạng.')</script>";
                $uploadOk = 0;
            }
        
            if ($uploadOk == 0) {
                echo "<script>alert('Xin lỗi, tải bài hát không thành công.')</script>";
            } else {
                if (move_uploaded_file($_FILES["songLink"]["tmp_name"], $target_file) && uploadSong($userId, $data)) {
                    echo "<script>
                        alert('Tải bài hát thành công.')
                        if(!confirm('Tiếp tục tải bài hát?')) {
                            window.location.href = 'discover';
                            exit();
                        }
                    </script>";
                } else {
                    echo "<script>alert('Xin lỗi, đã xảy ra lỗi khi tải bài hát.')</script>";
                }
            }
        }
    } else {
        echo "<script>
                    alert('Bạn cần đăng nhập.')
                    if(confirm('Bạn muốn đăng nhập bây giờ không?')) {
                        window.location.href = 'logIn';
                        exit();
                    }
                </script>";
    }
    require_once("./app/views/uploadSongView.php");
?>
    