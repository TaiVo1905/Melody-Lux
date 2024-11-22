<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư viện</title>
    <?php include_once("../components/linkbootstrap.php");?>
    <link href="../../public/css/grid.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../../public/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../public/css/song-item.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../public/css/header.css?v=<?php echo time(); ?>">
    <style>
        /* .right {
            background-color: #061d4f;
    margin-top: 60px;

        } */
        h1 {
            color: #fff;
            padding-left: 12px;
            padding-top: 12px;
        }
.container_profile--head_list{
    width: 730px;
    height: 32px;
    background-color: #1f3461r;
    display: flex;
    border-radius: 16px;
    justify-content: center;
    align-items: center;

}

.container_profile--head_list--item{
    width: 100px;
    height: 28px;
    list-style: none;
    line-height: 28px;
    text-align: center;
    border-radius: 16px;
    cursor: pointer;
    /* color: #f6f6db; */
    color: #c2d5d6;
    text-transform: uppercase;
    font-size: 12px;
}

.container_profile--head_list--item:hover{
    /* color: #9a59e4; */
    color: #fff;
}

.container_profile--head_list--item:nth-child(1){
    width: 124px;
}

.container_profile--head_list--item.active{
    background-color: #6e6875;
    color: #fff;;
}

.container_profile--layout__sum--foot_img{
    width: 270px;
    height: 100%;
    /* background-color: #5a4be7; */
    background-size: cover;
    position: relative;
}

.container_profile--layout__sum--foot_img-item{
    width: 100%;
    height: 100%;
    list-style: none;
    z-index: -1;
    background-size: cover;
    border-radius: 4px;
    display: none;
}

.container_profile--layout__sum--foot_img-item.second,
.container_profile--layout__sum--foot_img-item.third,
.container_profile--layout__sum--foot_img-item.first{
    display: block;
}

.first{
    width: 230px;
    height: 230px;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 3;
    transition: 1s linear 0.02s;
}

.second{
    width: 196px;
    height: 196px;
    position: absolute;
    top: calc((230px - 196px) / 2);
    left: 16px;
    z-index: 2;
    opacity: 0.7;
    transition: 1s linear 0.02s;
}

.third{
    width: 162px;
    height: 162px;
    position: absolute;
    top: calc((230px - 162px) / 2);
    left: 0;
    z-index: 1;
    margin: auto;
    opacity: 0.3;
    transition: 1s linear 0.02s;
}
.songs{
    height: 244px;
    /* margin-left: 20px; */
    overflow-y: scroll;
}


    </style>
    
</head>
<body>
    <div class="grid">
        <div class="row no-gutters">
            <div class="col c-3">
                <?php include_once("../components/sidebar.php");
                ?>
            </div>
            <div class="col c-9">
                <div class="header">
                    <?php include_once("../components/header.php");?>
                </div>
                <h1>Thư viện</h1>
                <div class="container_profile--head_list">
                    <li class="container_profile--head_list--item active">TỔNG QUAN</li>
                    <li class="container_profile--head_list--item">Bài hát</li>
                    <li class="container_profile--head_list--item">PLAYLIST</li>
                    <li class="container_profile--head_list--item hion-on-mobile">Nghệ sĩ</li>
                    <li class="container_profile--head_list--item">ALBUM</li>
                    <li class="container_profile--head_list--item hion-on-mobile">MV</li>
                    <li class="container_profile--head_list--item hion-on-mobile">Tải Lên</li>
                </div>
                <div class="list-song row">
                <h1>Bài hát</h1>

                    <div class="col col-3">
                    <div class="container_profile--layout__sum--foot_img hion-on-mobile">
                                    <li class="container_profile--layout__sum--foot_img-item second hion-on-mobile" style="background-image: url(../../public/images/singers/chuBin.jpg)">

                                    </li>
                                    <li class="container_profile--layout__sum--foot_img-item third hion-on-mobile" style="background-image: url(../../public/images/singers/chuBin.jpg)">
                                        
                                    </li>
                                    <li class="container_profile--layout__sum--foot_img-item first hion-on-mobile" style="background-image: url(../../public/images/singers/chuBin.jpg)">
                                        
                                    </li>
                                </div>
                    </div>
                    <div class="songs col col-9">
                        <?php include_once("../components/song-item.php");
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                echo createSong();
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script>
        const profile_head_list = document.querySelectorAll('.container_profile--head_list--item');


        profile_head_list.forEach((item, index) => {
            item.onclick = function (){
                document.querySelector('.container_profile--head_list--item.active').classList.remove('active');
                this.classList.add('active');
            }
        })


        const img_animate_first = document.querySelectorAll('.container_profile--layout__sum--foot_img-item')[0];
    const img_animate_second = document.querySelectorAll('.container_profile--layout__sum--foot_img-item')[1];
    const img_animate_third = document.querySelectorAll('.container_profile--layout__sum--foot_img-item')[2];
    setTimeout(function(){
        setTimeout(function(){
            img_animate_first.classList.remove('second')
            img_animate_second.classList.remove('third')
            img_animate_third.classList.remove('first')

            img_animate_first.classList.add('first')
            img_animate_second.classList.add('second')
            img_animate_third.classList.add('third')
        },1000)
        setTimeout(function(){
            img_animate_first.classList.remove('first')
            img_animate_second.classList.remove('second')
            img_animate_third.classList.remove('third')

            img_animate_first.classList.add('third')
            img_animate_second.classList.add('first')
            img_animate_third.classList.add('second')
        },3000)
        setTimeout(function(){
            img_animate_first.classList.remove('third')
            img_animate_second.classList.remove('first')
            img_animate_third.classList.remove('second')
            
            img_animate_first.classList.add('second')
            img_animate_second.classList.add('third')
            img_animate_third.classList.add('first')
        },5000)
    },0)
    setInterval(function(){
        setTimeout(function(){
            img_animate_first.classList.remove('second')
            img_animate_second.classList.remove('third')
            img_animate_third.classList.remove('first')

            img_animate_first.classList.add('first')
            img_animate_second.classList.add('second')
            img_animate_third.classList.add('third')
        },1000)
        setTimeout(function(){
            img_animate_first.classList.remove('first')
            img_animate_second.classList.remove('second')
            img_animate_third.classList.remove('third')

            img_animate_first.classList.add('third')
            img_animate_second.classList.add('first')
            img_animate_third.classList.add('second')
        },3000)
        setTimeout(function(){
            img_animate_first.classList.remove('third')
            img_animate_second.classList.remove('first')
            img_animate_third.classList.remove('second')
            
            img_animate_first.classList.add('second')
            img_animate_second.classList.add('third')
            img_animate_third.classList.add('first')
        },5000)
    },6000)
    </script>
</html>