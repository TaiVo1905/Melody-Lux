<?php
function createThemeContainer() {
    $html = "
    <div class='theme-background' id='theme-background'></div>
    <div class='theme-container' id='theme-container'>
        <div>
            <h1>Giao diện</h1>
            <h5>Chủ Đề</h5>
            <div class='themes'>
                <div class='display:flex'>
                    <div class='theme-item iu'>
                        <img src='../../public/images/backgrounds/background1.jpg' alt='Iu'>
                        <div class='overlay'>
                            <button class='apply-btn'>Áp Dụng</button>
                            <button class='preview-btn'>Xem Trước</button>
                        </div>
                    </div>
                    <p class='ns'>IU</p>
                </div>
                <div class='display:flex'>
                    <div class='theme-item dark'>
                        <img src='../../public/images/backgrounds/background2.jpg' alt='Lisa'>
                        <div class='overlay'>
                            <button class='apply-btn'>Áp Dụng</button>
                            <button class='preview-btn'>Xem Trước</button>
                        </div>
                    </div>
                    <p class='ns'>Lisa</p>
                </div>
                <div class='display:flex'>
                    <div class='theme-item purple'>
                        <img src='../../public/images/backgrounds/background3.jpg' alt='Jennie'>
                        <div class='overlay'>
                            <button class='apply-btn'>Áp Dụng</button>
                            <button class='preview-btn'>Xem Trước</button>
                        </div>
                    </div>
                    <p class='ns'>Jennie</p>
                </div>
                <div class='display:flex'>
                    <div class='theme-item green'>
                        <img src='../../public/images/backgrounds/background4.jpg' alt='Jisoo'>
                        <div class='overlay'>
                            <button class='apply-btn'>Áp Dụng</button>
                            <button class='preview-btn'>Xem Trước</button>
                        </div>
                    </div>
                    <p class='ns'>Jisoo</p>
                </div>
                <div class='display:flex'>
                    <div class='theme-item red'>
                        <img src='../../public/images/backgrounds/background5.jpg' alt='Rose'>
                        <div class='overlay'>
                            <button class='apply-btn'>Áp Dụng</button>
                            <button class='preview-btn'>Xem Trước</button>
                        </div>
                    </div>
                    <p class='ns'>Rose</p>
                </div>
            </div>
        </div>
    </div>
    ";
    return $html;
}
?>
