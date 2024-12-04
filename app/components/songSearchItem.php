<div class="rank-header">
    <h1  class="header-title"><b> Kết quả của:  <?php 
                             if (isset($_GET['query'])) {
                            echo trim($_GET['query']); } ?> </b></h1>
    
</div>

<?php

    function renderSearchResults($path_img, $song_name, $author_singer_name, $path_audio, $song_id){
        echo '
        <div class="songSearch_items" data-song-id="' . $song_id . '">
            <div class="songSearch_item_left">
                <div class="songSearchitem_left_content">
                    <div class="songSearch_song">
                        <div class="songSearch_song_img">
                            <img src="'.$path_img.'" alt="">
                            <ion-icon class="play-icon" name="caret-forward-outline"></ion-icon>
                        </div>
                        <div class="songSearch_song_singer">
                            <div class="songSearch_song_name">
                                <b>'.$song_name.'</b>
                            </div>
                            <div class="songSearch_singer">
                               '.$author_singer_name.'
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="songSearch_item_right">
                <div class="song_name">
                   '.$song_name.'
                </div>
                <div class="item_action">
                    <div class="items_icon_songSearch micro_icon">
                        <ion-icon class="songSearch_icon" name="mic-outline"></ion-icon>
                    </div>
                    <div class="items_icon_songSearch heart_icon">
                        <ion-icon class="songSearch_icon" name="heart"></ion-icon>
                    </div>
                    <!-- Với chỉnh chỗ này  -->
                    <div class="items_icon_songSearch" style="position:relative;">
                        <li style="position: absolute; list-style-type: none;"> <ion-icon class="songSearch_music" name="ellipsis-horizontal-outline"></ion-icon></li>
                        <p class="timemusic" style="color: #ffffff;" data-path= "'.$path_audio.'"></p>
                    </div>
                </div>
            </div>
        </div>
    ';  

            
        
    }
    
?>
