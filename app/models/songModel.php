<?php
    require_once("./config/config.php");
    function songModel (){
        $conn = connectDB();
        $sql = "select songs.song_id, songs.song_name, songs.path_audio, songs.path_img, songs.plays,
        albums.album_name, categories.category,
        author_singers.author_singer_name
        from songs
        join albums on songs.album_id = albums.album_id
        join categories on songs.category_id = categories.category_id
        join author_singers on songs.author_id = author_singers.author_singer_id
        order by plays desc;";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function searchSong($searchValue) {
        $conn = connectDB();
        $sql = "select songs.song_id, songs.song_name, songs.path_audio, songs.path_img,
        albums.album_name, categories.category,
        author_singers.author_singer_name
        from songs
        join albums on songs.song_id = albums.album_id
        join categories on songs.category_id = categories.category_id
        join author_singers on songs.author_id = author_singers.author_singer_id
        where songs.song_name like '%$searchValue%';";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
?>