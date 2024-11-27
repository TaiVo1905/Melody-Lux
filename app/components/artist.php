<?php
function createArtistContainer($artists) {
    $html = "<div class='artist-container'>";

    foreach ($artists as $artist) {
        $html .= "
            <div class='artist-card'>
                <img src='{$artist['imgPath']}' alt=''>
                <div class='play-button'>
                    <ion-icon name='caret-forward-outline'></ion-icon>
                </div>
                <h3>{$artist['name']}</h3>
                <p>Nghệ sĩ</p>
            </div>
        ";
    }

    $html .= "</div>";
    return $html;
}
?>
