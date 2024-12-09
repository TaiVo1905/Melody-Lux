<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    
    <?php include("./app/components/linkbootstrap.php"); ?>
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>"> 

    <link rel="stylesheet" href="./public/css/rank-item.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="./public/css/sidebar.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="./public/css/song-item.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="./public/css/slider.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="./public/css/song.css?v<?php echo time(); ?>">

    <link rel="stylesheet" href="./public/css/grid.css?v<?php echo time(); ?>">

    <link rel="stylesheet" href="./public/css/album.css?v<?php echo time(); ?>">
</head>
<style>
    h4{
        color: white;
        padding-left: 45px;
        margin: 0;
        padding-top: 30px;
    }
    .albums_hot{
        display: flex;
        gap: 20px;
        justify-content: center;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        padding-top: 20px;
        margin: 0 68px;
        gap: 6px;
    }
    .padding-bottom {
        padding-bottom: 88px;
    }
</style>
<body>
   <div class="grid" style="background-color: #170F23;">
        <div class="row no-gutters">
            <div class="col c-2">
                <?php
                include_once './app/components/sidebar.php';
                ?> 
            </div>
            <div class="col c-10 padding-bottom">
                <?php
                include_once './app/components/header.php';
                ?>
                <div>
                    <?php
                    include_once './app/components/slider.php';
                    ?>
                    <h4>Gợi ý dành riêng cho bạn</h4>
                    <div class="gallery">
                    <?php
                        include_once("./app/models/songModel.php");
                        include_once './app/components/song.php';
                        $results = suggestSong();
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo createSuggestSong($row["song_name"], $row["author_singer_name"], $row["song_id"], $row["path_img"]);
                        }
                     ?>
                     </div>
                     <h4>Nhạc trẻ</h4> 
                    <div class="albums_hot">
                            <?php
                            include_once './app/models/albumModel.php'; 
                            $category_id = 2; 
                            $result = displayAlbums($category_id,5, 0);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo createAlbum($row['album_name'], $row['author_singer_name'], $row['album_img'], $row['category']);
                                }
                            } else {
                                echo "Không tìm thấy bài hát nào trong cơ sở dữ liệu.";
                            }
                            ?>
                    </div>
                    <h4>Bolero và trữ tình</h4> 
                    <div class="albums_hot">
                            <?php
                            include_once './app/models/albumModel.php'; 
                            $category_id = 4; 
                            $result = displayAlbums($category_id,5, 0);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo createAlbum($row['album_name'], $row['author_singer_name'], $row['album_img'], $row['category']);
                                }
                            } else {
                                echo "Không tìm thấy bài hát nào trong cơ sở dữ liệu.";
                            }
                            ?>
                    </div>
                    <h4>Nhạc tình cảm</h4> 
                    <div class="albums_hot">
                            <?php
                            include_once './app/models/albumModel.php'; 
                            $category_id = 1; 
                            $result = displayAlbums($category_id,5, 0);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo createAlbum($row['album_name'], $row['author_singer_name'], $row['album_img'], $row['category']);
                                }
                            } else {
                                echo "Không tìm thấy bài hát nào trong cơ sở dữ liệu.";
                            }
                            ?>
                    </div>
                    <h4>EDM</h4> 
                    <div class="albums_hot">
                            <?php
                            include_once './app/models/albumModel.php'; 
                            $category_id = 3; 
                            $result = displayAlbums($category_id,5, 0);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo createAlbum($row['album_name'], $row['author_singer_name'], $row['album_img'], $row['category']);
                                }
                            } else {
                                echo "Không tìm thấy bài hát nào trong cơ sở dữ liệu.";
                            }
                            ?>
                    </div>
                 </div>
            </div>
                <?php
                include_once './app/components/footer.php';
                ?>
        </div>
   </div>
    <script src="./public/js/discoverView.js?v<?php echo time(); ?>"></script>
    <script src="./public/js/handleSong.js?v<?php echo time(); ?>"></script>
    <script src="./public/js/search.js?v<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v<?php echo time(); ?>"></script>
</body>
</html>