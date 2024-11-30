<?php
function createPersonalCard($username) {
    $html = "
        <div class='personall' id='personall'>
            <div class='imgbxx'>
                <img src='../../public/images/albums/album1.jpg' alt='error' class='img_person'>
                <div class='basic_name'>
                    <h4>$username</h4>
                    <div>BASIC</div>
                </div>
            </div>
            <hr class='hr'>
            <div class='updated'>Nâng cấp tài khoản</div>
            <p class='para'><ion-icon name='ban-outline'></ion-icon>Danh sách chặn</p>
            <p class='para'><ion-icon name='cloud-upload-outline'></ion-icon>Tải lên</p>
            <hr class='hr'>
            <p class='para'><ion-icon name='exit-outline'></ion-icon>Đăng xuất</p>
        </div>
    ";
    return $html;
}
?>
