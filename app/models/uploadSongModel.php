<?php
    require_once("./config/config.php");
    function uploadSong($userId, $data) {
        try {
            $conn = connectDB();
            $sql = "SELECT author_singer_id from author_singers where author_singer_name = '" . $data[2] . "'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $author_singer_id = $row["author_singer_id"];
                }
            } else {
                $sql = "INSERT into author_singers (author_singer_name) value ('" . $data[2] . "')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $sql = "SELECT author_singer_id FROM author_singers ORDER BY author_singer_id DESC LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $author_singer_id = $row["author_singer_id"];
                        }
                    }
                }
            }
            if($author_singer_id) {
                $sql = "INSERT into songs (song_name, path_img, path_audio, user_id, author_id) value ('" . $data[0] . "', '" . "./puclic/images/songs/songDefault.png" . "', '" . $data[1] . "', '" . $userId . "', '" . $author_singer_id . "')";
                $result = mysqli_query($conn, $sql);
                return $result;
            } else {
                return false;
            }

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
?>