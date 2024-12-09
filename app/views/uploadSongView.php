<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="icon" type="imge/x-icon" href="./public/images/logo/logo_x-icon.png"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Song</title>
    <?php include_once("./app/components/linkbootstrap.php")?>
    <link rel="stylesheet" href="./public/css/grid.css">
    <style>
        .pt {
            padding-top: 12px;
        }
        .mt {
            margin-top: 12px;
        }
    </style>
</head>
<body>
    <div class="grid">
        <div class="row no-gutters">
            <div class="col col-4">

            </div>
            <div class="col col-4">
                <form action ="" method="POST" enctype="multipart/form-data">
                    <div class="form-group pt" >
                        <label for="text">Tên bài hát: </label>
                        <input class="form-control" id ="text" type="text" name="songName" placeholder="" required>
                    </div>
                    <div class="form-group pt">
                        <label for="textAut">Tên tác giả: </label>
                        <input class="form-control" id ="textAut" type="text" name="author" placeholder="" required>
                    </div>
                    <div class="form-group pt">
                        <label for="song">Đường dẫn bài hát: </label>
                        <input class="form-control" id ="song" type="file" name="songLink" placeholder="" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt">Thêm bài hát</button>
                </form>
            </div>
            <div class="col col-4">
                
            </div>
        </div>
    </div>
</body>
</html>