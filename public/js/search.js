document.addEventListener("DOMContentLoaded", function () {
    const searchField = document.querySelector(".search_fiel"); 
    searchField.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); 

            const query = searchField.value.trim();

            if (query) {
                window.location.href = `search?query=${encodeURIComponent(query)}`;
            } else {
                alert("Vui lòng nhập từ khóa tìm kiếm!");
            }
        }
    });
});


if(window.location.href.includes("search")) {
        // làm hình trái tym
    const heartIcons = document.querySelectorAll('.heart_icon');

    heartIcons.forEach(heart => {
        heart.addEventListener('click', function () {
            this.classList.toggle('active');
            
            const songItem = heart.closest('.songSearch_items');
            const songId = parseInt(songItem.dataset.songId); // Lấy song_id từ data attribute
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
    
    // handle thời gian nhạc from ChatGPT
    const timeMusicElements = document.querySelectorAll('.timemusic');

    timeMusicElements.forEach(el => {
        const path = el.getAttribute('data-path');

        if (path) {
            const audio = new Audio(path);
            audio.addEventListener('loadedmetadata', function () {
                const duration = audio.duration; 
                const minutes = Math.floor(duration / 60); 
                const seconds = Math.floor(duration % 60); 

                const formattedTime = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                el.textContent = formattedTime;
            });
        }
    });
}