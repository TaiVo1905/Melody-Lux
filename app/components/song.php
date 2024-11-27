<?php
  function createSuggestSong ($songName, $author, $path_audio, $path_img) {
    $html = "
            <div class='item'>
              <img src='$path_img' alt='>
              <ion-icon class='play-icon' name='caret-forward-outline'></ion-icon>
              <div class='info' data-path='$path_audio'>
                  <h5>$songName</h5>
                  <p>$author</p>
              </div>
              <ion-icon class='rank_music' name='ellipsis-horizontal-outline'></ion-icon>
            </div>
          ";
    return $html;
  }
?>