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
        //mục đích của lệnh này là gì?
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function searchSong($searchValue) {
        $conn = connectDB();
        $sql = "SELECT songs.song_id, songs.song_name, songs.path_audio, songs.path_img,
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

    function suggestSong () {
        $conn = connectDB();
        $sql = "SELECT s.song_id, s.song_name, s.path_audio, s.path_img, s.plays,asi.author_singer_name
        FROM songs as s join song_singers as ss on s.song_id = ss.song_id
            join author_singers as asi on asi.author_singer_id = ss.singer_id ORDER BY RAND() LIMIT 6;";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    function songCategory ($category){
        $conn = connectDB();
        $sql = "select songs.song_id, songs.song_name, songs.path_audio, songs.path_img, songs.plays,
        albums.album_name, categories.category,
        author_singers.author_singer_name
        from songs
        join albums on songs.album_id = albums.album_id
        join categories on songs.category_id = categories.category_id
        join author_singers on songs.author_id = author_singers.author_singer_id
        where categories.category_id = $category
        order by plays desc;";
        //mục đích của lệnh này là gì?
        $result = mysqli_query($conn, $sql);
        return $result;
    }
?>