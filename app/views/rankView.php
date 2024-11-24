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
    <link rel="stylesheet" href="../../public/css/grid.css">
    <link rel="stylesheet" href="../../public/css/footer.css">
    
    <link rel="stylesheet" href="../../public/css/header.css?v=<?php echo time(); ?>"> 

    <link rel="stylesheet" href="../../public/css/rank-item.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="../../public/css/sidebar.css?v=<?php echo time(); ?>">


</head>
<body>
   <div class="grid">
        <div class="row no-gutters">
            <div class="col c-2">
                <?php
                include_once '../components/sidebar.php';
                ?>
            </div>
            <div class="col c-10" style="background-color: #170F23;">
                
                <?php
                    include_once '../components/header.php';
                ?>
                
                <div class="rank-body" style="padding:30px 45px 0 45px;">
                    <?php
                        include_once '../components/rank-item.php';
                        renderRankItems()
                    ?>
                </div>
            </div>
        </div>
            <?php
                    include_once '../components/footer.php';
                ?>
   </div>
   <script src="../../public/js/rank-item.js"></script>
</body>
</html>
          