<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="imge/x-icon" href="./public/images/logo/x-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải nhạc lên</title>
    <?php include_once("./app/components/linkbootstrap.php")?>
    <link rel="stylesheet" href="./public/css/grid.css">
    <link rel="stylesheet" href="./public/css/uploadSong.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="grid">
    <div class="row no-gutters">
        <div class="col col-10">
            <?php
                include_once './app/components/uploadSong.php';
                echo createUploadForm();
            ?>
        </div>
    </div>
</div>
</body>
</html>
