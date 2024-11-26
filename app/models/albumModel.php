<?php
include_once './config/config.php';
include_once './app/components/album.php'; 

function displayAlbums($limit = 5, $offset = 0) {
    $conn = connectDB();
    if ($conn !== null) {
        $sql = "SELECT 
                    s.song_name,
                    s.path_audio,
                    s.path_img,
                    a.album_name,
                    a.album_img,
                    asg.author_singer_name
                FROM 
                    songs s
                JOIN 
                    albums a ON s.album_id = a.album_id
                JOIN 
                    author_singers asg ON s.author_id = asg.author_singer_id
                LIMIT $limit OFFSET $offset";  
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo createAlbum($row['album_name'], $row['author_singer_name'], $row['album_img']);
            }
        } else {
            echo "Không tìm thấy bài hát nào trong cơ sở dữ liệu.";
        }      
        mysqli_close($conn);
    } else {
        echo "Không thể kết nối đến cơ sở dữ liệu.";
    }
}
?>
