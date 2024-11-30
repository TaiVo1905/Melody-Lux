<?php
function createAlbum($albumName, $author, $imgPath) {
    $html = "
            <div class='card'>
                <ion-icon class='play-icon' name='caret-forward-outline'></ion-icon>
                <img src='$imgPath' class='card-img-top img-fluid' alt='...'>
                <div class='card-body'>
                    <h6 class='card-text'>$albumName</h6>
                    <p class='card-text'>$author</p>
                </div>
            </div>
    ";
    return $html;
}
function renderAlbumLibrary($albumName, $author, $imgPath) {
    echo "
            <div class='card'>
                <ion-icon class='play-icon' name='caret-forward-outline'></ion-icon>
                <img src='".$imgPath."' class='card-img-top img-fluid' alt='...'>
                <div class='card-body'>
                    <h6 class='card-text'>".$albumName."</h6>
                    <p class='card-text'>".$author."</p>
                </div>
            </div>
    ";
    
}
?>
