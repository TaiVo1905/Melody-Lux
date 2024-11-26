<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư viện</title>
    <?php include_once("./app/components/linkbootstrap.php");?>
    <link href="/melody-lux/public/css/grid.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="/melody-lux/public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/melody-lux/public/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/melody-lux/public/css/song-item.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/melody-lux/public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/melody-lux/public/css/libraryView.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="grid">
        <div class="row no-gutters">
            <div class="col c-2">
                <?php include_once("./app/components/sidebar.php");?>
            </div>
            <div class="right col c-10">
                <?php include_once("./app/components/header.php");?>
                <h1 class="header-name">Thư viện</h1>
                <div class="library-nav">
                    <li class="library-nav--item active">TỔNG QUAN</li>
                    <li class="library-nav--item">Bài hát</li>
                    <li class="library-nav--item">PLAYLIST</li>
                    <li class="library-nav--item">Nghệ sĩ</li>
                    <li class="library-nav--item">ALBUM</li>
                    <li class="library-nav--item">MV</li>
                    <li class="library-nav--item">Tải Lên</li>
                </div>
                <div class="row no-gutters">
                <h3 class="header-name">Bài hát</h3>

                    <div class="col c-3">
                    <div class="libarary-img--animaiton">
                                    <li class="libarary-img--animaiton-item second" style="background-image: url(/melody-lux/public/images/singers/chuBin.jpg)">

                                    </li>
                                    <li class="libarary-img--animaiton-item third" style="background-image: url(/melody-lux/public/images/singers/chuBin.jpg)">
                                        
                                    </li>
                                    <li class="libarary-img--animaiton-item first" style="background-image: url(/melody-lux/public/images/singers/chuBin.jpg)">
                                        
                                    </li>
                                </div>
                    </div>
                    <div class="songs col c-9">
                        <?php include_once("./app/components/song-item.php");
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
            <?php include_once("./app/components/footer.php");?>
        </div>
    </div>
</body>
    <script>
        const profile_head_list = document.querySelectorAll('.library-nav--item');


        profile_head_list.forEach((item, index) => {
            item.onclick = function (){
                document.querySelector('.library-nav--item.active').classList.remove('active');
                this.classList.add('active');
            }
        })


    const img_animate_first = document.querySelectorAll('.libarary-img--animaiton-item')[0];
    const img_animate_second = document.querySelectorAll('.libarary-img--animaiton-item')[1];
    const img_animate_third = document.querySelectorAll('.libarary-img--animaiton-item')[2];
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