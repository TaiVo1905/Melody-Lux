
<?php
    function renderSong($song_id, $path_img, $song_name, $author_singer_name, $path_audio) {
        return "          
            <div class='song_items' data-song-id='" . $song_id . "'>
                <div class='song_item_left'>
                    <div class='item_left_content'>
                        <ion-icon class='music_icon' name='musical-notes-outline'></ion-icon>
                        <div class='song_song'>
                            <div class='song_song_img'>
                                <img src='".$path_img."' alt=''>
                                <ion-icon class='play-iconss' name='caret-forward-outline'></ion-icon>
                            </div>
                            <div class='song_song_singer'>
                                <div class='song_song_name'>
                                    <b>".$song_name."</b>
                                </div>
                                <div class='song_singer'>
                                    ".$author_singer_name."
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='song_item_right'>
                    <div class='song_name'>
                        ".$song_name." (Single)
                    </div>
                    <div class='item_action'>
                        <div class='items_icon_song micro_icon'>
                            <ion-icon class='song_icon' name='mic-outline'></ion-icon>
                        </div>
                        <div class='items_icon_song heart_icon'>
                            <ion-icon class='song_icon' name='heart'></ion-icon>
                        </div>
                        <div class='items_icon_song' style='position:relative;'>
                        <li style='position: absolute; list-style-type: none;'> 
                            <ion-icon class='song_music' name='ellipsis-horizontal-outline'></ion-icon>
                        </li>
                        <p class='timemusic' style='color: #ffffff;' data-path='".$path_audio."'></p>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
?>
    