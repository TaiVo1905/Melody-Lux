<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../public/css/sidebar.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="sidebar">
        <div class="logo_img">
            <img src="../public/images/logo/melody_lux.png" alt="">
        </div>
        <div class="sidebar_top">
            <div class="bar_title">
                <ion-icon class="icon_sidebar" name="home-outline"></ion-icon>
                <p class="bar_title_content">Thư viện</p>
            </div>
            <div class="bar_title">
                <i class="fas fa-bullseye icon_sidebar"></i>
                <p class="bar_title_content">Khám phá</p>
            </div>
            <div class="bar_title">
                <i class="fas fa-signal icon_sidebar"></i>
                <p class="bar_title_content">Biểu đồ</p>
            </div>
            <div class="bar_title">
                <ion-icon class="icon_sidebar" name="radio-outline"></ion-icon>
                <p class="bar_title_content">Radio</p>
            </div>
        </div>
        <div class="sidebar_center">
            <div class="bar_title">
                <ion-icon class="icon_sidebar" name="musical-notes-outline"></ion-icon>
                <p class="bar_title_content">Xếp hạng</p>
            </div>
            <div class="bar_title">
                <ion-icon class="icon_sidebar" name="grid-outline"></ion-icon>
                <p class="bar_title_content">Thể loại</p>
            </div>
            <div class="bar_title">
                <ion-icon class="icon_sidebar" name="star-outline"></ion-icon>
                <p class="bar_title_content">Top 100</p>
            </div>
            <div class="bar_title bar_title_box">
                <div class="box_icon_bar icon_time">
                    <ion-icon class="icon_sidebar" name="timer-outline"></ion-icon>
                </div>
                <p class="bar_title_content">Nghe gần đây</p>
            </div>
            <div class="bar_title bar_title_box">
                <div class="box_icon_bar icon_heart">
                    <ion-icon class="icon_sidebar" name="heart-outline"></ion-icon>
                </div>
                <p class="bar_title_content">Bài hát yêu thích</p>
            </div>
            <div class="bar_title bar_title_box">
                <div class="box_icon_bar icon_play">
                    <ion-icon class="icon_sidebar" name="play-circle-outline"></ion-icon>
                </div>
                <p class="bar_title_content">Playlist</p>
            </div>
            <div class="bar_title bar_title_box">
                <div class="box_icon_bar icon_album">
                    <ion-icon class="icon_sidebar" name="albums-outline"></ion-icon>
                </div>
                <p class="bar_title_content">Album</p>
            </div>
            <div class="bar_title bar_title_box">
                <div class="box_icon_bar icon_upload">
                    <ion-icon class="icon_sidebar" name="cloud-upload-outline"></ion-icon>
                </div>
                <p class="bar_title_content">Tải lên</p>
            </div>
        </div>
        <div class="add_playlist">
            <ion-icon class="icon_sidebar" name="add-outline"></ion-icon>
            <p class="bar_title_content">Tạo playlist mới</p>
        </div>
    </div>
</body>
</html>