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


// làm hình trái tym
const heartIcons = document.querySelectorAll('.heart_icon');

heartIcons.forEach(heart => {
    heart.addEventListener('click', function () {
        this.classList.toggle('active');
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

