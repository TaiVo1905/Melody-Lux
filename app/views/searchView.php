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
    <link rel="stylesheet" href="./public/css/grid.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    
    <link rel="stylesheet" href="./public/css/header.css?v=<?php echo time(); ?>"> 

    <link rel="stylesheet" href="./public/css/songSearchItem.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="./public/css/sidebar.css?v=<?php echo time(); ?>">

<style>
    body
    {   
        background-color: #170F23;
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
            <div class="col c-10" style="background-color: #170F23;">
                
                <?php
                    include_once './app/components/header.php';
                ?>
                
                <div class="rank-body" style="padding:30px 45px 0 45px;">
                    <?php
                        include_once './app/components/songSearchItem.php';
                        include_once './app/models/songModel.php';
                        if (isset($_GET['query'])) {
                            $query = ($_GET['query']); 
                            if (!empty($query)) {
                                $results = searchSong($query);
                                if(mysqli_num_rows($results) == 0) {
                                    echo 'Không tìm thấy kết quả';
                                }
                                while ($row = mysqli_fetch_assoc($results)) {
                                    renderSearchResults($row['path_img'], $row['song_name'], $row['author_singer_name'], $row['path_audio']);
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
            <?php
                    include_once './app/components/footer.php';
                ?>
   </div>
   <script src="./public/js/search.js?v=<?php echo time()?>"></script>
    <script src="./public/js/header.js?v<?php echo time(); ?>"></script>
    
</body>
</html>
          