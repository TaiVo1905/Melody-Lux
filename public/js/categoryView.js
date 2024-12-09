if (window.location.href.includes("category")) {
    const $=document.querySelector.bind(document);
    const $$=document.querySelectorAll.bind(document);
    document.addEventListener("DOMContentLoaded", () => {
    $$('.sidebar_center .bar_title')[1].classList.add("active");
})
document.addEventListener('DOMContentLoaded', () => {
    const heartBox = document.querySelectorAll('.heart_icon');
    console.log(heartBox);
    heartBox.forEach((heartboxx) => {
        heartboxx.addEventListener('click', function() {
            const songItem = heartboxx.closest('.song_items');
            const songId = parseInt(songItem.dataset.songId); // Lấy song_id từ data attribute
                console.log(songId); //
                this.classList.toggle('active');

                if (this.classList.contains('active')) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', './app/controllers/handleSLibraryController.php', true);
                    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    if(songId == parseInt($(".media").dataset.songId)){
                                        $("#heart").classList.add("active");
                                    }
                                } else {
                                    console.log("Error saving current song");
                                }
                            }
                        };
                    xhr.send(JSON.stringify({ func: 'addSongToLibrary', data: songId }));  
                }else{
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', './app/controllers/handleSLibraryController.php', true);
                    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if (xhr.status == 200) {
                                if(parseInt(xhr.responseText) == 1){
                                    $("#heart").classList.remove("active");
                                }
                            } else {
                                console.log("Error saving current song");
                            }
                        }
                    };
                    xhr.send(JSON.stringify({ func: 'removeSongLibrary', data: songId }));
                }
            });
        });
    });
}
