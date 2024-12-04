    <div class="listen">
        <div class="media" data-song-id="9">
            <div class="media_cd" style="background-image: url('./public/images/singers/chuBin.jpg')"></div>
            <div class="media_title">
                <marquee class="media_title--name" scrolldelay="130">Cô đơn trên sofa</marquee>
                <a class="media_title--author">Chu Bin</a>
            </div>
            <div class="media_icon">
                <li class="meadia_icon_more heart">
                <ion-icon name="heart-outline"></ion-icon>
                <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                </li>
            </div>
        </div>
        <div class="controls">
            <div class="controls_player">
                <li class="controls_player--icon" id="random_song"><ion-icon name="shuffle-outline"></ion-icon></i></li>
                <li class="controls_player--icon" id="prev_song"><ion-icon name="play-skip-back-outline"></ion-icon></li>
                <li class="controls_player--icon big">
                    <ion-icon name="play-circle-outline" class="" id="play_song"></ion-icon>
                    <ion-icon name="pause-outline" class="active"  id="pause_song"></ion-icon>
                </li>
                <li class="controls_player--icon"><ion-icon name="play-skip-forward-outline"></ion-icon></li>
                <li class="controls_player--icon"><ion-icon name="repeat-outline"></ion-icon></li>
            </div>
            <div class="controls_time">
                <span class="controls_time--left" style="color:#595560;padding-right:14px;">00.00</span>
                <input id="progress" class="controls_time--range" type="range" value="0" min="0" max="100" step="0.1">
                <span class="controls_time--right" style="color:white;padding-left:14px;">03.22</span>
            </div>
            <audio id="currentSong" src="./public/audio/DieuThuocTanNguoiTrongGiangHo6OST-LamChanKhang-5488925.mp3"></audio>
        </div>
        <div class="controls_extend">
            <div class="controls_extend--lever">
                <li class="controls_extend--lever_item"><ion-icon name="tv-outline"></ion-icon></li>
                <li class="controls_extend--lever_item"><ion-icon name="mic-outline"></ion-icon></li>
                <li class="controls_extend--lever_item">
                    <ion-icon name="volume-high-outline" class="volumeHigh"></ion-icon>
                    <ion-icon name="volume-mute-outline" class="volumeLow active"></ion-icon>
                </li>
                <!-- <li class="controls_extend--lever_item"><ion-icon name="volume-mute-outline"></ion-icon></li> -->
                <li class="controls_extend--lever_item_range">
                    <input id="controls_lever_range" type="range" class="range_volum" value="1" min="0" max="1" step="0.1">
                </li>
                <li class="controls_extend--lever_item"><ion-icon name="musical-note-outline"></ion-icon></li>
            </div>
        </div>
    </div>