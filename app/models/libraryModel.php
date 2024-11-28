<?php
    require_once "../../config/config.php";
    
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
?>
