<?php
function createAlbum($albumName, $author, $imgPath) {
    $html = "
            <div class='card' style='width: 18rem;'>
                <img src='$imgPath' class='card-img-top img-fluid' alt='...'>
                <div>
                    <i></i>
                </div>
                <div class='card-body'>
                    <h6 class='card-text'>$albumName</h6>
                    <p class='card-text'>$author</p>
                </div>
            </div>
    ";
}
    
?>
