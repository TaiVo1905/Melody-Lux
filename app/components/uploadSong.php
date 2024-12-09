<?php
function createUploadForm() {
    $html = "
        <div class='form-container'>
            <h1>Thêm Bài Hát</h1>
            <form action='' method='POST' enctype='multipart/form-data'>
                <div class='form-group'>
                    <label for='text'>Tên bài hát:</label>
                    <input class='form-control' id='text' type='text' name='songName' placeholder='' required>
                </div>
                <div class='form-group'>
                    <label for='textAut'>Tên tác giả:</label>
                    <input class='form-control' id='textAut' type='text' name='author' placeholder='' required>
                </div>
                <div class='form-group'>
                    <label for='song'>Đường dẫn bài hát:</label>
                    <input class='form-control' id='song' type='file' name='songLink' required>
                </div>
                <button type='submit' class='btn btn-primary mt'>Thêm bài hát</button>
            </form>
        </div>
    ";
    return $html;
}
?>
