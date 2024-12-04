// làm số rank
document.addEventListener('DOMContentLoaded', function () {
    const children = document.querySelectorAll('.number-box');
    if (children.length >= 3) {
        children[0].style.webkitTextStroke = "1px #4a90e2";    
        children[1].style.webkitTextStroke = "1px #50e3c2";   
        children[2].style.webkitTextStroke = "1px #e35050";  
    } else {
        console.warn("Không đủ thẻ .number-box để thay đổi màu sắc!");
    }
    document.querySelectorAll('.sidebar_center .bar_title')[0].classList.add("active");


});
        

// // làm hình trái tym
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
// Phần này dùng để xử lý các số không bằng nhau (cái thụt ra cái thụt vào á)
const numberBoxes = document.querySelectorAll('.number-box');

numberBoxes.forEach(box => {
    const value = parseInt(box.textContent.trim(), 10);

    if (value < 10) {
        box.classList.add('padding-small');
    }
});