<?php
  function createSuggestSong ($songName, $author, $song_id, $path_img) {
    $html = "
            <div class='item' data-song-id='$song_id'>
              <img src='$path_img' alt='>
              <ion-icon class='play-icon' name='caret-forward-outline'></ion-icon>
              <div class='info'>
                  <h5>$songName</h5>
                  <p>$author</p>
              </div>
              <ion-icon class='rank_music' name='ellipsis-horizontal-outline'></ion-icon>
            </div>
          ";
    return $html;
  }
?>