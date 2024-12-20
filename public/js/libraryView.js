// const $=document.querySelector.bind(document);
// const $$=document.querySelectorAll.bind(document);

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

document.addEventListener("DOMContentLoaded", () => {
    $('.sidebar_top .bar_title:nth-child(1)').classList.add("active");
    const tabs = document.querySelectorAll(".library-nav--item");
    const fields = document.querySelectorAll(".song-fiel, .playlist-fiel, .author-fiel, .album-fiel");

    const defaultTab = document.querySelector(".library-nav--item.overview");
    defaultTab.classList.add("active");
    fields.forEach(field => field.style.display = "block");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            fields.forEach(field => field.style.display = "none");

            const fieldClass = tab.classList[1].split("-")[0] + "-fiel"; 
            const targetField = document.querySelector(`.${fieldClass}`);
            if (fieldClass === "overview-fiel") {
                fields.forEach(field => field.style.display = "block");
            } else if (targetField) {
                targetField.style.display = "block";
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const heartBox = document.querySelectorAll('.heart_icon');
    console.log(heartBox);
    heartBox.forEach((heartboxx) => {
        heartboxx.addEventListener('click', function() {
            const heartIcon = heartboxx.querySelector('.song_icon');
            const songItem = heartboxx.closest('.song_items');
            const songId = parseInt(songItem.dataset.songId); // Lấy song_id từ data attribute
                console.log(songId); //
                heartIcon.classList.toggle('heart-filled');

                const xhr = new XMLHttpRequest();
                xhr.open('POST', './app/controllers/handleSLibraryController.php', true);
                xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText);
                        if(parseInt(xhr.responseText) == 1){
                            songItem.remove();
                            $("#heart").classList.remove("active");
                        }
                    } else {
                        console.log("Error saving current song");
                    }
                }
            };
            xhr.send(JSON.stringify({ func: 'removeSongLibrary', data: songId }));

            });
        });
    });
