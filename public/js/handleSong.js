const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const currentSong = $("#currentSong");
const play_song = $("#play_song");
const pause_song = $("#pause_song");
const media_title_name = $(".media_title--name");
const media_title_author = $(".media_title--author");
const media_cd = $(".media_cd");
const cdThumbAnimate = media_cd.animate(
    {transform: 'rotate(360deg)'},
    {
        duration: 20000,
        iterations: Infinity
    }
)
const media = $('.media');
const controls_lever_range = $("#controls_lever_range");

document.addEventListener('DOMContentLoaded', async () => {
    await handleCurrentSong(1, true);
    await handleEvent();
    currentSong.addEventListener('loadedmetadata', () => {
        let minutes = Math.floor(currentSong.duration / 60); let seconds = Math.floor(currentSong.duration % 60);
        $(".controls_time--right").innerText = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    });
});

play_song.addEventListener("click", async () => {
    await handleCurrentSong(1, true);
});

pause_song.addEventListener("click", async () => {
    currentSong.pause();
});

$(".sidebar").addEventListener('click', async () => {
    await saveCurrentSong(1, parseInt(media.dataset.songId), currentSong.currentTime, false, false);
});

async function saveCurrentSong(userid, songid, current_song_time, song_repeat, song_random) {
    let minutes = Math.floor(current_song_time / 60);
    let seconds = Math.floor(current_song_time % 60);
    let time = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    const data = [userid, songid, time, song_repeat, song_random];
    
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./app/controllers/songController.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log(xhr.responseText);
                    resolve(xhr.responseText);
                } else {
                    reject("Error saving current song");
                }
            }
        };
        xhr.send(JSON.stringify({ func: 'saveCurrentSong', data: data }));
    });
}

async function getCurrentSong(userid) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "./app/controllers/songController.php?func=getCurrentSong&userid=" + encodeURIComponent(userid), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    resolve(JSON.parse(xhr.responseText));
                } else {
                    reject("Error getting current song");
                }
            }
        };
        xhr.send();
    });
}

async function handleCurrentSong(userid, checkPlay = false) {
    try {
        const response = await getCurrentSong(userid);
        currentSong.src = response[0]["path_audio"];
        const time = response[0]["current_song_time"].split(":");
        currentSong.currentTime = parseInt(time[0]) * 60 + parseInt(time[1]);
        media_title_name.innerText = response[0]["song_name"];
        media_title_author.innerText = response[0]["author_singer_name"];
        media_cd.style.backgroundImage = `url(${response[0]["path_img"]})`;
        media.dataset.songId = response[0]["song_id"];
        if (checkPlay) {
            currentSong.play();
        }
    } catch (error) {
        console.error(error);
    }
}

async function handleEvent() {
    //update song's time
    currentSong.ontimeupdate = () => {
        let currentTime = currentSong.currentTime;
        let minutes = Math.floor(currentTime / 60);
        let seconds = Math.floor(currentTime % 60);
        $(".controls_time--left").innerText = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
        $("#progress").value = ((currentTime / currentSong.duration) || 0) * 100;
    };

    $("#progress").oninput = () => {
        currentSong.currentTime = $("#progress").value / 100 * currentSong.duration;
    };
    cdThumbAnimate.pause();

    //update volume
    controls_lever_range.oninput = () => {
        currentSong.volume = controls_lever_range.value;
        if (currentSong.volume == 0) {
            $(".volumeHigh").classList.add("active");
            $(".volumeLow").classList.remove("active");
        } else {
            $(".volumeHigh").classList.remove("active");
            $(".volumeLow").classList.add("active");
        }
    }

    currentSong.onended = async () => {
        if ($(".controls_player li:nth-child(5)").classList.contains("active")) {
            await saveCurrentSong(1, parseInt(media.dataset.songId), "00:00", false, false);
            await handleCurrentSong(1, true);
        }
    }
}

$$(".gallery .item").forEach(item => {
    item.addEventListener("click", async () => {
        await saveCurrentSong(1, parseInt(item.dataset.songId), "00:00", false, false);
        await handleCurrentSong(1, true);
    });
});

currentSong.onplay = () => {
    cdThumbAnimate.play();
    play_song.classList.add("active");
    pause_song.classList.remove("active");
}

currentSong.onpause = async () => {
    cdThumbAnimate.pause();
    pause_song.classList.add("active");
    play_song.classList.remove("active");
    await saveCurrentSong(1, parseInt(media.dataset.songId), currentSong.currentTime, false, false);
}