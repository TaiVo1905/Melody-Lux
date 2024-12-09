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
    <link rel="stylesheet" href="/melody-lux/public/css/grid.css">
    <link rel="stylesheet" href="/melody-lux/public/css/footer.css">
    
    <link rel="stylesheet" href="/melody-lux/public/css/header.css?v=<?php echo time(); ?>"> 

    <link rel="stylesheet" href="/melody-lux/public/css/rank-item.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="/melody-lux/public/css/sidebar.css?v=<?php echo time(); ?>">

    <style>
        .padding-bottom {
        padding-bottom: 88px;
        }
    </style>
</head>
<body>
   <div class="grid">
        <div class="row no-gutters">
            <div class="col c-2">
                <?php
                include_once './app/components/sidebar.php';
                ?>
            </div>
            <div class="col c-10 padding-bottom" style="background-color: #170F23;">
                
                <?php
                    include_once './app/components/header.php';
                ?>
                
                <div class="rank-body" style="padding:30px 45px 0 45px;">
                    <?php
                        include_once './app/components/rank-item.php';
                        require_once './app/models/songModel.php';
                        $songs = songModel();
                        $stt = 0;
                        while ($song = mysqli_fetch_assoc($songs)){
                            $isSongstatus = checkExitStatus($song['song_id']);
                            ++$stt;
                            renderRankItems($stt, $song['path_img'], $song['song_name'], $song['author_singer_name'], $song['path_audio'], $song['song_id'], $isSongstatus);
                        };
                    ?>
                </div>
            </div>
        </div>
            <?php
                    include_once './app/components/footer.php';
                ?>
   </div>
    <script src="/melody-lux/public/js/handleSong.js?v<?php echo time(); ?>"></script>
    <script src="/melody-lux/public/js/search.js?v<?php echo time(); ?>"></script>
    <script src="/melody-lux/public/js/rank-item.js?v<?php echo time(); ?>"></script>
    <script src="./public/js/header.js?v<?php echo time(); ?>"></script>
</body>
</html>
          