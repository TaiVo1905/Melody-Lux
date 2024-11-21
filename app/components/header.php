
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../../public/css/header.css?v=<?php echo time(); ?>"> 
</head>
<body>
    <div class="header_container">
        <div class="header_left">
            <div class="arrow_icon">
                <ion-icon class = "icon_header arrow_left" name="arrow-back-outline"></ion-icon>
                <ion-icon class = "icon_header arrow_right" name="arrow-forward-outline"></ion-icon>
            </div>
            <div class="header_search">
                <ion-icon class="search_icon" name="search-outline"></ion-icon>
                <input class="search_fiel" type="text" placeholder="Search for songs, singers, song lyrics,...">
            </div>
        </div>
        <div class="header_right">
            <div class="border_circle">
                <i class="lni lni-stamp icon_header "></i>
            </div>
            <div class="border_circle">
                <ion-icon class = "icon_header" name="cloud-upload"></ion-icon>
            </div>
            <div class="border_circle">
                <ion-icon class = "icon_header" name="settings"></ion-icon>
            </div>
            <div class="border_circle">
                <ion-icon class = "icon_header" name="person"></ion-icon>
            </div>
        </div>
    </div>
</body>
</html>