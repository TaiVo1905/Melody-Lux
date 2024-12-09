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

    <link rel="stylesheet" href="/melody-lux/public/css/footer.css?v=<?php echo time(); ?>">
    
    <link rel="stylesheet" href="/melody-lux/public/css/header.css?v=<?php echo time(); ?>"> 

    <link rel="stylesheet" href="/melody-lux/public/css/rank-item.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="/melody-lux/public/css/sidebar.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="/melody-lux/public/css/song-item.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="/melody-lux/public/css/slider.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="/melody-lux/public/css/song.css?v<?php echo time(); ?>">

    <link rel="stylesheet" href="/melody-lux/public/css/grid.css?v<?php echo time(); ?>">

    <link rel="stylesheet" href="/melody-lux/public/css/album.css?v<?php echo time(); ?>">

    <link rel="stylesheet" href="/melody-lux/public/css/rank.css?v<?php echo time(); ?>">
</head>
</head>
<style>
    h4{
        color: white;
        padding-left: 116px;
        margin: 0;
        padding-top: 30px;
    }
    .albums_hot{
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 25px 50px 0 50px;
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
                    <?php
                     include_once './app/components/rank.php';
                     ?>
                    <h4>Trữ Tình & Bolero</h4>
                    <div class="albums_hot">
                         <?php
                        include_once './app/components/song-item.php';

                        include_once './app/models/songModel.php';
                        $result = songCategory(4);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $isSongstatus = checkExitStatus($row['song_id']);
                                echo renderSong($row['song_id'], $row['path_img'], $row['song_name'], $row['author_singer_name'], $row['path_audio'], $isSongstatus);
                            }
                        } else {
                            echo "Không tìm thấy bài hát nào trong cơ sở dữ liệu.";
                        } 
                        ?> 
                    </div>
                    <h4>Nhạc Trẻ</h4>
                    <div class="albums_hot">
                    <?php
                        include_once './app/components/song-item.php';

                        include_once './app/models/songModel.php';
                        $result = songCategory(2);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $isSongstatus = checkExitStatus($row['song_id']);
                                echo renderSong($row['song_id'], $row['path_img'], $row['song_name'], $row['author_singer_name'], $row['path_audio'], $isSongstatus);
                            }
                        } else {
                            echo "Không tìm thấy bài hát nào trong cơ sở dữ liệu.";
                        } 
                        ?>
                    </div>
                    <h4>Nhạc Tình Cảm</h4>
                    <div class="albums_hot">
                    <?php
                        include_once './app/components/song-item.php';

                        include_once './app/models/songModel.php';
                        $result = songCategory(1);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $isSongstatus = checkExitStatus($row['song_id']);
                                echo renderSong($row['song_id'], $row['path_img'], $row['song_name'], $row['author_singer_name'], $row['path_audio'], $isSongstatus);
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
   <script src="./public/js/handleSong.js?v<?php echo time(); ?>"></script>
   <script src="./public/js/categoryView.js?v<?php echo time(); ?>"></script>
   <script src="./public/js/header.js?v<?php echo time(); ?>"></script>
   <script src="./public/js/search.js?v<?php echo time(); ?>"></script>
</body>
</html>