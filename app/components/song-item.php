
<?php
    function createSong() {
        $html = "          
                <div class='song_items'>
                    <div class='song_item_left'>
                        <div class='item_left_content'>
                            <ion-icon class='music_icon' name='musical-notes-outline'></ion-icon>
                            <div class='song_song'>
                                <div class='song_song_img'>
                                    <img src='./public/images/authors/author1.jpg' alt=''>
                                    <ion-icon class='play-icon' name='caret-forward-outline'></ion-icon>
                                </div>
                                <div class='song_song_singer'>
                                    <div class='song_song_name'>
                                        <b>Một Lúc Mất 2 Thứ</b>
                                    </div>
                                    <div class='song_singer'>
                                        Đình Nguyễn
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='song_item_right'>
                        <div class='song_name'>
                            Một lúc mất 2 thứ(Single)
                        </div>
                        <div class='item_action'>
                            <div class='items_icon_song micro_icon'>
                                <ion-icon class='song_icon' name='mic-outline'></ion-icon>
                            </div>
                            <div class='items_icon_song heart_icon'>
                                <ion-icon class='song_icon' name='heart'></ion-icon>
                            </div>
                            <div class='items_icon_song option_icon'>
                                <ion-icon class='song_icon' name='ellipsis-horizontal-outline'></ion-icon>
                            </div>
                            <!-- <p style='color: white;'>04:00</p> -->
                        </div>
                    </div>
                </div>
        ";
    return $html;
    }
    ?>
    <script>
        var heartBox = document.querySelectorAll('.heart_icon');
        // var heart = document;
        document.addEventListener('DOMContentLoaded', () => {

            heartBox.forEach((heartboxx) => {
                heartboxx.addEventListener('click', function() {
                heartboxx.querySelector('.song_icon').classList.toggle('heart-filled');
            });
            })
        })
    </script>
    