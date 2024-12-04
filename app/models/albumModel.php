<?php
include_once './config/config.php';
include_once './app/components/album.php'; 

function displayAlbums($category_id, $limit = 5, $offset = 0) {
    $conn = connectDB();
    if ($conn !== null) {
        // Cập nhật câu truy vấn SQL để thêm điều kiện WHERE cho thể loại
        $sql = "SELECT 
                    s.song_name,
                    s.path_audio,
                    s.path_img,
                    a.album_name,
                    a.album_img,
                    asg.author_singer_name,
                    c.category  -- Thêm thể loại vào SELECT
                FROM 
                    songs s
                JOIN 
                    albums a ON s.album_id = a.album_id
                JOIN 
                    author_singers asg ON s.author_id = asg.author_singer_id
                JOIN 
                    categories c ON s.category_id = c.category_id  -- Thêm JOIN với bảng categories
                WHERE 
                    c.category_id = $category_id  -- Thêm điều kiện WHERE cho category_id
                LIMIT $limit OFFSET $offset";  
        
        $result = mysqli_query($conn, $sql);
        return $result;
        
        mysqli_close($conn);
    } else {
        echo "Không thể kết nối đến cơ sở dữ liệu.";
    }
}
?>
