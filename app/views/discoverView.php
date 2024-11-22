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
    
    <?php include("../components/linkbootstrap.php"); ?>
    <link rel="stylesheet" href="../../public/css/footer.css?v=<?php echo time(); ?>">
    
    <link rel="stylesheet" href="../../public/css/header.css?v=<?php echo time(); ?>"> 

    <link rel="stylesheet" href="../../public/css/rank-item.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="../../public/css/sidebar.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="../../public/css/song-item.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="../../public/css/slider.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../public/css/grid.css">
</head>
<body>
   <div class="grid" style="background-color: #170F23;">
        <div class="row no-gutters">
            <div class="col c-2">
                <?php
                include_once '../components/sidebar.php';
                ?>  
            </div>
            <div class="col c-10">
                <?php
                include_once '../components/header.php';
                ?>
                <?php
                include_once '../components/slider.php';
                ?>
                
            </div>
                <?php
                include_once '../components/footer.php';
                ?>
        </div>
   </div>
</body>
</html>