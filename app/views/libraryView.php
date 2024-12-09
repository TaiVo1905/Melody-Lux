<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư viện</title>
    <?php include_once("./app/components/linkbootstrap.php");?>
    <link href="/melody-lux/public/css/grid.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="./public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/song-item.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/libraryView.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/playList.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/artist.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/album.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./public/css/grid.css?v=<?php echo time(); ?>">
</head>
<style>
    .albums_hot{
        display: flex;
        gap: 20px;
        justify-content: center;
    }
    .padding-bottom {
        padding-bottom: 88px;
    }
</style>
<body>
<div style="background-color: #170F23;">
    <div class="grid">
        <div class="row no-gutters">
            <div class="col c-2">
                <?php include_once("./app/components/sidebar.php");?>
            </div>
            <div class="col c-10 padding-bottom">
                <?php 
                include_once("./app/components/header.php");
                ?>
                <h1 class="header-name">Thư viện</h1>
                <div class="library-nav">
                    <li class="library-nav--item active overview">Tổng quan</li>
                    <li class="library-nav--item song-view">Bài hát</li>
                    <li class="library-nav--item playlist-view">Playlist</li>
                    <li class="library-nav--item author-view">Nghệ sĩ</li>
                    <li class="library-nav--item album-view">Album</li>
                    <li class="library-nav--item mv-view">MV</li>
                    <li class="library-nav--item upload-view">Tải lên</li>
                </div>
                <div class="row no-gutters song-fiel">
                    <h3 class="header-name">Bài hát</h3>
                    <div class="col c-3">
                        <div class="libarary-img--animaiton">
                            <li class="libarary-img--animaiton-item second" style="background-image: url(./public/images/authors/author1.jpg)"></li>
                            <li class="libarary-img--animaiton-item third" style="background-image: url(./public/images/authors/author7.jpg)"></li>
                            <li class="libarary-img--animaiton-item first" style="background-image: url(./public/images/authors/author8.jpg)"></li>
                        </div>
                    </div>
                    <div class="songs col c-9">
                        <?php include_once("./app/components/song-item.php");
                              require_once './app/models/libraryModel.php';
                            if ($_SESSION['user_id']){
                                $user_id = $_SESSION['user_id'];
                                $songs = getSongLibraryUser($user_id);
                                $songsUpload = getSongUploadLibrary($user_id);
                                while ($song = mysqli_fetch_assoc($songs)){
                                    echo renderSong($song['song_id'], $song['path_img'], $song['song_name'], $song['author_singer_name'], $song['path_audio']);
                                };
                                while ($song = mysqli_fetch_assoc($songsUpload)){
                                    echo renderSong($song['song_id'], $song['path_img'], $song['song_name'], $song['author_singer_name'], $song['path_audio']);
                                };
                            }
                        ?>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="playlist-fiel">
                        <h3 class="header-name">Playlist</h3>
                        <div class="col c-3">
                            <?php include_once("./app/components/playList.php");?>
                        </div>
                    </div>
                    <div class="col c-9"></div>
                    <div class="author-fiel">
                        <h3 class="header-name">Nghệ sĩ</h3>
                        <?php include_once("./app/components/artist.php");
                        $artists = [
                            ['imgPath' => './public/images/albums/album1.jpg', 'name' => 'ANH TRAI "SAY HI"'],
                            ['imgPath' => './public/images/albums/album2.jpg', 'name' => 'Đức Phúc'],
                            ['imgPath' => './public/images/albums/album3.jpg', 'name' => 'Sơn Tùng M-TP'],
                            ['imgPath' => './public/images/albums/album4.jpg', 'name' => 'Lê Linh'],
                            ['imgPath' => './public/images/albums/album5.jpg', 'name' => 'Jack'],
                            ['imgPath' => './public/images/albums/album6.jpg', 'name' => 'Hồ Quang Hiếu']
                        ];
                        echo createArtistContainer($artists);      
                        ?>
                    </div>
                    <div class="album-fiel">
                        <h3 class="header-name">Albums</h3>
                        <div class="albums_hot">
                            <?php
                                require_once './app//models/libraryModel.php'; 
                                include_once("./app/components/album.php");
                                if ($_SESSION['user_id']){
                                    $user_id = $_SESSION['user_id'];
                                    $albums = getAlbumLibraryUser($user_id);
                                    while ($album = mysqli_fetch_assoc($albums)){
                                        renderAlbumLibrary($album['album_name'], $album['author_singer_name'], $album['album_img']);
                                    };
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("./app/components/footer.php");?>
</div>

<script src="./public/js/libraryView.js?v<?php echo time(); ?>"></script>
<script src="./public/js/handleSong.js?v<?php echo time(); ?>"></script>
<script src="./public/js/header.js?v<?php echo time(); ?>"></script>
<script src="./public/js/search.js?v<?php echo time(); ?>"></script>
<script src="./public/js/libraryView.js?v<?php echo time(); ?>"></script>
<script src="/melody-lux/public/js/rank-item.js?v<?php echo time(); ?>"></script>
<script>
        var heartBox = document.querySelectorAll('.heart_icon');
        // var heart = document;
        document.addEventListener('DOMContentLoaded', () => {

            heartBox.forEach((heartboxx) => {
                heartboxx.addEventListener('click', function() {
                heartboxx.querySelector('.song_icon').classList.toggle('heart-filled');
            });
            })
        })
</script>
</body>
</html>