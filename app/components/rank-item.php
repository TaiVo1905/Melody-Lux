<div class="rank-header">
    <h1  class="header-title"><b> BXH nhạc mới </b></h1>
    <ion-icon class="header-icon" name="caret-forward-circle-outline"></ion-icon>
</div>

<?php
require_once '../models/songModel.php';
    function renderRankItems(){
        $song = songModel ();
        if (!$song) {
            echo '<p>No data found.</p>';
            return;
        }
        $a = 0;
        while ($row = mysqli_fetch_assoc($song)){
            ++$a;
            echo '
                <div class="rank_items">
                    <div class="rank_item_left">
                        <div class="rankitem_left_content">
                            <div class="number-box">'.$a.'</div>
                            <p class="letter_spec">-</p>
                            <div class="rank_song">
                                <div class="rank_song_img">
                                    <img src="../../'.$row['path_img'].'" alt="">
                                    <ion-icon class="play-icon" name="caret-forward-outline"></ion-icon>
                                </div>
                                <div class="rank_song_singer">
                                    <div class="rank_song_name">
                                        <b>'.$row['song_name'].'</b>
                                    </div>
                                    <div class="rank_singer">
                                       '.$row['author_singer_name'].'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rank_item_right">
                        <div class="song_name">
                           '.$row['song_name'].'
                        </div>
                        <div class="item_action">
                            <div class="items_icon_rank micro_icon">
                                <ion-icon class="rank_icon" name="mic-outline"></ion-icon>
                            </div>
                            <div class="items_icon_rank heart_icon">
                                <ion-icon class="rank_icon" name="heart"></ion-icon>
                            </div>
                            <!-- Với chỉnh chỗ này  -->
                            <div class="items_icon_rank" style="position:relative;">
                                <li style="position: absolute; list-style-type: none;"> <ion-icon class="rank_music" name="ellipsis-horizontal-outline"></ion-icon></li>
                                <p class="timemusic" style="color: #ffffff;">04:40</p>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            
        }
    }
    
?>
