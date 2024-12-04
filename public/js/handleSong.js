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
const song_items = $$(".songs .song_items");

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
        var songid;
        if ($(".controls_player li:nth-child(5)").classList.contains("active")) {
            songid = parseInt(media.dataset.songId);
        } else if ($(".controls_player li:nth-child(1)").classList.contains("active")) {
            handleSongRandom();
        } else {
            songid = nextSong();
        }
        await saveCurrentSong(1, songid, "00:00", false, false);
        await handleCurrentSong(1, true);
    }

    $(".controls_player li:nth-child(2)").onclick = async () => {
        var songid;
        if ($(".controls_player li:nth-child(1)").classList.contains("active")) {
            handleSongRandom();
        } else {
            for (let i = 0; i < song_items.length; i++) {
                if(song_items[i].classList.contains("active")) {
                    song_items[i].classList.remove("active");
                    if(song_items[i] == song_items[0]) {
                        songid = parseInt(song_items[song_items.length - 1].dataset.songId);
                        song_items[song_items.length - 1].classList.add("active");
                    }else {
                        songid = parseInt(song_items[i].previousElementSibling.dataset.songId);
                        song_items[i-1].classList.add("active");

                    }                 
                    break;
                }
            }
        }
        console.log(songid);
        await saveCurrentSong(1, songid, "00:00", false, false);
        await handleCurrentSong(1, true);
    }
    $(".controls_player li:nth-child(4)").onclick = async () => {
        const songid = nextSong();
        await saveCurrentSong(1, songid, "00:00", false, false);
        await handleCurrentSong(1, true);
    }
}

function nextSong() {
    var songid;
        if ($(".controls_player li:nth-child(1)").classList.contains("active")) {
            handleSongRandom();
        } else {
            for (let i = 0; i < song_items.length; i++) {
                if(song_items[i].classList.contains("active")) {
                    song_items[i].classList.remove("active");
                    if(song_items[i] == song_items[song_items.length - 1]) {
                        songid = parseInt(song_items[0].dataset.songId);
                        song_items[0].classList.add("active");
                    }else {
                        songid = parseInt(song_items[i].nextElementSibling.dataset.songId);
                        song_items[i+1].classList.add("active");

                    }
                    return songid;
                }
            }
        }
}

function handleSongRandom () {
    if (window.location.href.includes("library")) {
        do {
            var random = Math.floor(Math.random() * song_items.length);
        }
        while (random == currentSong.dataset.songId);
        songid = parseInt(song_items[random].dataset.songId);
        song_items.Some(item => {
            if(item.classList.contains("active")) {
                item.classList.remove("active");
                return;
            }
        })
        song_items[random].classList.add("active");
    }
}

function handleSongClickprev() {
    if (window.location.href.includes("library")) {
        do {
            var random = Math.floor(Math.random() * song_items.length);
        }
        while (random == currentSong.dataset.songId);
        songid = parseInt(song_items[random].dataset.songId);
        for (let i = 0; i < song_items.length; i++) {
            if(song_items[i].classList.contains("active")) {
                song_items[i].classList.remove("active");
                break;
            }
        }
        song_items[random].classList.add("active");
    }
}

$$(".gallery .item").forEach(item => {
    item.addEventListener("click", async () => {
        await saveCurrentSong(1, parseInt(item.dataset.songId), "00:00", false, false);
        await handleCurrentSong(1, true);
    });
});

song_items.forEach(item => {
    item.addEventListener("click", async (e) => {
        if (!e.target.closest(".item_action")) {
            console.log(item);
            await saveCurrentSong(1, parseInt(item.dataset.songId), "00:00", false, false);
            await handleCurrentSong(1, true);
            song_items.forEach(item => {
                if(item.classList.contains("active")) {
                    item.classList.remove("active");
                }
            })
            item.classList.add("active");
        }
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

$(".controls_player li:nth-child(1)").onclick = async () => {
    $(".controls_player li:nth-child(1)").classList.toggle("active");
}

$(".controls_player li:nth-child(5)").onclick = async () => {
    $(".controls_player li:nth-child(5)").classList.toggle("active");
}

// async function getUser() {
//         const xhr = new XMLHttpRequest();
//         xhr.open("GET", "./app/controllers/userController.php?func=getUserid", true);
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState == 4) {
//                 if (xhr.status == 200) {
//                     xhr.responseText;
//                 } else {
//                     "Error getting current song";
//                 }
//             }
//         };
//         xhr.send();
// }