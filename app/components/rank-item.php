<div class="rank_items">
        <div class="rank_item_left">
            <div class="item_left_content">
                <div class="number-box">1</div>
                <p class="letter_spec">-</p>
                <div class="rank_song">
                    <div class="rank_song_img">
                        <img src="./img/MTP.jfif" alt="">
                        <ion-icon class="play-icon" name="caret-forward-outline"></ion-icon>
                    </div>
                    <div class="rank_song_singer">
                        <div class="rank_song_name">
                            <b>Một Lúc Mất 2 Thứ</b>
                        </div>
                        <div class="rank_singer">
                            Đình Nguyễn
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rank_item_right">
            <div class="song_name">
                Một lúc mất 2 thứ(Single)
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
    <script>
        var heartBox = document.querySelector('.heart_icon')
        var heart = document.querySelector('.heart_icon .rank_icon');
        heartBox.addEventListener('click', function() {
            heart.classList.toggle('heart-filled');
        });
    </script>