const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const currentSong = $("#currentSong");
const play_song = $("#play_song");
const pause_song = $("#pause_song");
const media_title_name = $(".media_title--name");
const media_title_author = $(".media_title--author");
const media_cd = $(".media_cd");
const media = $('.media');
document.addEventListener('DOMContentLoaded', () => {
        handleCurrentSong(1, true);
        handleTimeSongUpdate();
        currentSong.addEventListener('loadedmetadata', () => {
            console.log(currentSong.duration)
            let minutes = Math.floor(currentSong.duration / 60);
            let seconds = Math.floor(currentSong.duration % 60);
            $(".controls_time--right").innerText = (minutes < 10 ? "0" + minutes:minutes) + ":" + (seconds < 10 ? "0" + seconds:seconds);

        })
})
play_song.addEventListener("click", () => {
    handleCurrentSong(1, true);
})

pause_song.addEventListener("click", () => {
    saveCurrentSong(1, parseInt(media.dataset.songId), currentSong.currentTime, false, false);
    play_song.classList.remove("active");
    pause_song.classList.add("active");
    currentSong.pause();
})

$(".sidebar").addEventListener('click', () => {
    saveCurrentSong(1, parseInt(media.dataset.songId), currentSong.currentTime, false, false);
})

function saveCurrentSong(userid, songid, current_song_time, song_repeat, song_random) { // Tạo yêu cầu AJAX var 
    let minutes = Math.floor(current_song_time/60);
    let seconds = Math.floor(current_song_time%60);
    let time = (minutes < 10 ? "0" + minutes:minutes) + ":" + (seconds < 10 ? "0" + seconds:seconds);
    const data = [userid, songid, time, song_repeat, song_random];
    xhr = new XMLHttpRequest();
    xhr.open("POST", "./app/controllers/songController.php", true); 
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function() { if (xhr.readyState == 4 && xhr.status == 200) { // Xử lý kết quả trả về từ PHP 
    let response = xhr.responseText;
        console.log(response);
    } };
    xhr.send(JSON.stringify({ func: 'saveCurrentSong', data: data }));
}
function handleCurrentSong(userid, checkPlay = false) { // Tạo yêu cầu AJAX var 
    xhr = new XMLHttpRequest(); xhr.open("GET", "./app/controllers/songController.php?func=getCurrentSong&userid=" + encodeURIComponent(userid), true); 
    xhr.onreadystatechange = function() { if (xhr.readyState == 4 && xhr.status == 200) { // Xử lý kết quả trả về từ PHP 
    let response = JSON.parse(xhr.responseText);
        console.log(response);
        currentSong.pause();
        currentSong.src = response[0]["path_audio"];
        currentSong.load();
        const time = response[0]["current_song_time"].split(":");
        currentSong.currentTime = parseInt(time[1])*60 + parseInt(time[2]);
        media_title_name.innerText = response[0]["song_name"];
        media_title_author.innerText = response[0]["author_singer_name"];
        media_cd.style.backgroundImage = `url(${response[0]["path_img"]})`;
        console.log(response[0]["path_img"]);
        media.dataset.songId = response[0]["song_id"];
        if (checkPlay == true) {
            play_song.classList.add("active");
            pause_song.classList.remove("active");
            currentSong.play();
        }
    } };
    xhr.send();
}

function handleTimeSongUpdate () {
    currentSong.ontimeupdate = () => {
        let currentTime = currentSong.currentTime;
        let minutes = Math.floor(currentTime/60);
        let seconds = Math.floor(currentTime%60);
        $(".controls_time--left").innerText = (minutes < 10 ? "0" + minutes:minutes) + ":" + (seconds < 10 ? "0" + seconds:seconds);
        $("#progress").value = currentTime/currentSong.duration * 100;
    }
    $("#progress").addEventListener("input", () =>{
        currentSong.currentTime = $("#progress").value / 100 * currentSong.duration;
    })
}

$$(".gallery .item").forEach(item => {
    item.addEventListener("click", async () => {
            await saveCurrentSong(1, parseInt(item.dataset.songId), "00:00", false, false);
            await handleCurrentSong(1, true);
    })
});