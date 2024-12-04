<?php
    require_once "./config/config.php";
    
    function getAlbumLibrary($user_id){
        $db = connectDB ();

        $sql = "SELECT a.album_name, a.quantity, a.datetime, album_img, s.song_name, s.path_audio, s. path_img, auS.author_singer_name
        FROM Album_Libraries as al
        JOIN Albums as a on al.album_id = a.album_id
        JOIN Songs as s on a.album_id = s.album_id
        JOIN Album_Singers as alS on alS.album_id = a.album_id
        JOIN Author_Singers as auS on auS.author_singer_id = alS.singer_id
        WHERE al.user_id = $user_id";
        
        $results = mysqli_query($db, $sql);
        if(!$results){
            return false;
        };
    
        return $results ;
    }       

    function getSongLibrary($user_id){
        $db = connectDB ();

        $sql = "SELECT  s.song_name, s.path_audio, s. path_img, auS.author_singer_name
            FROM  Song_Libraries AS sl
            JOIN Songs AS s ON s.song_id = sl.song_id
            JOIN  Song_Singers AS ss ON ss.song_id = s.song_id 
            JOIN Author_Singers AS auS ON auS.author_singer_id  = ss.singer_id
            WHERE sl.user_id = $user_id";
        
        $results = mysqli_query($db, $sql);
        if(!$results){
            return false;
        };

        return $results;
    }
    function getSongLibraryUser($userid){
        $db = connectDB();
        $sql = "SELECT s.song_id, s.song_name, s.path_img, s.path_audio, asi.author_singer_name FROM Song_Libraries as sl
                JOIN songs as s on sl.song_id = s.song_id
                JOIN song_singers as ss on s.song_id = ss.song_id
                JOIN author_singers as asi on asi.author_singer_id = ss.singer_id
                WHERE sl.user_id = '$userid'";
        $results = mysqli_query($db, $sql);
        if(!$results){
            return false;
        };
        return $results;
    }
    function getAlbumLibraryUser($userid){
        $db = connectDB();
        $sql = "SELECT a.album_name,asi.author_singer_name,  a.album_img FROM album_libraries as al
                JOIN albums as a on al.album_id = a.album_id
                JOIN Album_Singers as als on a.album_id = als.album_id
                JOIN author_singers as asi on asi.author_singer_id = als.singer_id
                WHERE al.user_id = '$userid'";
        $results = mysqli_query($db, $sql);
        if(!$results){
            return false;
        };
        return $results;
    }
?>
