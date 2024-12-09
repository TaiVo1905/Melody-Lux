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
const songDiscover = $$(".gallery .item");
const rank_items = $$(".rank_items");
const songSearch_items = $$(".songSearch_items");

window.addEventListener("beforeunload", () => {
    if(!pause_song.classList.contains("active")) {
        sessionStorage.setItem("playing", true);
    } else {
        sessionStorage.setItem("playing", false);
    }
    saveCurrentSong(sessionStorage.getItem("userId") == "" ? 2 : JSON.parse(sessionStorage.getItem("userId")), parseInt(media.dataset.songId), currentSong.currentTime)
})

document.addEventListener('DOMContentLoaded', async () => {
    await getUser();
    const userId = sessionStorage.getItem("userId") == "" ? 2 : JSON.parse(sessionStorage.getItem("userId"));
    const playing = JSON.parse(sessionStorage.getItem("playing"));
    await handleCurrentSong(userId, playing);
    await handleEvent(userId);
    currentSong.addEventListener('loadedmetadata', () => {
        let minutes = Math.floor(currentSong.duration / 60); let seconds = Math.floor(currentSong.duration % 60);
        $(".controls_time--right").innerText = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    });   
    play_song.addEventListener("click", () => {
        currentSong.play();
    });
    pause_song.addEventListener("click", () => {
        currentSong.pause();
    });
    currentSong.onplay = async () => {
        cdThumbAnimate.play();
        play_song.classList.add("active");
        pause_song.classList.remove("active");
    }
    currentSong.onpause = async (userId) => {
        cdThumbAnimate.pause();
        pause_song.classList.add("active");
        play_song.classList.remove("active");
        await saveCurrentSong(userId, parseInt(media.dataset.songId), currentSong.currentTime);
    }
    songDiscover.forEach(item => {
        item.addEventListener("click", async () => {
            await saveCurrentSong(userId, parseInt(item.dataset.songId), "00:00");
            await handleCurrentSong(userId, true);
            for(let i = 0; i < songDiscover.length; i++) {
                if(songDiscover[i].classList.contains("active")) {
                    songDiscover[i].classList.remove("active");
                    break;
                }
            }
            item.classList.add("active");
        });
        if(item.dataset.songId == media.dataset.songId) {
            item.classList.add("active");
        }
    });
    
    selectorSongItems(userId);

    rank_items.forEach(item => {
        item.addEventListener("click", async (e) => {
            if (!e.target.closest(".item_action")) {
                console.log(item);
                await saveCurrentSong(userId, parseInt(item.dataset.songId), "00:00");
                await handleCurrentSong(userId, true);
                for(let i = 0; i < rank_items.length; i++) {
                    if(rank_items[i].classList.contains("active")) {
                        rank_items[i].classList.remove("active");
                        break;
                    }
                }
                item.classList.add("active");
            }
        });
        if(item.dataset.songId == media.dataset.songId) {
            item.classList.add("active");
        }
    });
    
    songSearch_items.forEach(item => {
        item.addEventListener("click", async (e) => {
            if (!e.target.closest(".item_action")) {
                console.log(item);
                await saveCurrentSong(userId, parseInt(item.dataset.songId), "00:00");
                await handleCurrentSong(userId, true);
                for(let i = 0; i < songSearch_items.length; i++) {
                    if(songSearch_items[i].classList.contains("active")) {
                        songSearch_items[i].classList.remove("active");
                        break;
                    }
                }
                item.classList.add("active");
            }
        });
        if(item.dataset.songId == media.dataset.songId) {
            item.classList.add("active");
        }
    });
    
    $(".controls_player li:nth-child(1)").onclick = async () => {
        $(".controls_player li:nth-child(1)").classList.toggle("active");
    }
    
    $(".controls_player li:nth-child(5)").onclick = async () => {
        $(".controls_player li:nth-child(5)").classList.toggle("active");
    }
});


async function saveCurrentSong(userid, songid, current_song_time) {
    let minutes = Math.floor(current_song_time / 60);
    let seconds = Math.floor(current_song_time % 60);
    let time = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
    const random =$(".controls_player li:nth-child(1)").classList.contains("active") ? true:false;
    const repeat =$(".controls_player li:nth-child(5)").classList.contains("active") ? true:false;
    const data = [userid, songid, time, repeat, random];
    
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

async function handleCurrentSong(userid = 2, checkPlay = false) {
    try {
        const response = await getCurrentSong(userid);
        currentSong.src = response[0]["path_audio"];
        const time = response[0]["current_song_time"].split(":");
        currentSong.currentTime = parseInt(time[0]) * 60 + parseInt(time[1]);
        media_title_name.innerText = response[0]["song_name"];
        media_title_author.innerText = response[0]["author_singer_name"];
        media_cd.style.backgroundImage = `url(${response[0]["path_img"]})`;
        media.dataset.songId = response[0]["song_id"];
        if (response[0]["song_random"] == 1) {
            $(".controls_player li:nth-child(1)").classList.add("active");
        }
        if (response[0]["song_repeat"] == 1) {
            $(".controls_player li:nth-child(5)").classList.add("active");
        }
        console.log(response[0]["isSongstatus"]);
        if(response[0]["isSongstatus"] == true) {
            $("#heart").classList.add("active");
        } else {
            $("#heart").classList.remove("active");
        }
        
        if (checkPlay) {
            currentSong.play();
        }
    } catch (error) {
        console.error(error);
    }
}

async function getUser() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "./app/controllers/userController.php?func=getUserid", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log(xhr.responseText);
                    sessionStorage.setItem("userId", xhr.responseText);
                } else {
                    "Error getting current song";
                }
            }
        };
        xhr.send();
}

async function handleEvent(userId) {
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
        } else {
            songid = nextSong();
        }
        await saveCurrentSong(userId, songid, "00:00")
        await handleCurrentSong(userId, true);
    }

    $(".controls_player li:nth-child(2)").onclick = async () => {
        var songid;
        if ($(".controls_player li:nth-child(1)").classList.contains("active")) {
            songid = handleSongRandom();
        } else {
            if(window.location.href.includes("library")) {
                const song_items = $$(".song_items");
                for (let i = song_items.length -1; i >= 0; i--) {
                    if(song_items[i] == song_items[0]) {
                        song_items[i].classList.remove("active");
                        songid = parseInt(song_items[song_items.length - 1].dataset.songId);
                        song_items[song_items.length - 1].classList.add("active");
                    }else if(song_items[i].classList.contains("active")) {
                        song_items[i].classList.remove("active");
                        songid = parseInt(song_items[i].previousElementSibling.dataset.songId);
                        song_items[i-1].classList.add("active");
                        break;
                    }                
                }
            } else if (window.location.href.includes("discover")) {
                for (let i = songDiscover.length -1; i >= 0; i--) {
                    if(songDiscover[i] == songDiscover[0]) {
                        songDiscover[i].classList.remove("active");
                        songid = parseInt(songDiscover[songDiscover.length - 1].dataset.songId);
                        songDiscover[songDiscover.length - 1].classList.add("active");
                    }else if(songDiscover[i].classList.contains("active")) {
                        songDiscover[i].classList.remove("active");
                        songid = parseInt(songDiscover[i].previousElementSibling.dataset.songId);
                        songDiscover[i-1].classList.add("active");
                        break;
                    }                
                }
            } else if (window.location.href.includes("rank")) {
                for (let i = rank_items.length -1; i >= 0; i--) {
                    if(rank_items[i] == rank_items[0]) {
                        rank_items[i].classList.remove("active");
                        songid = parseInt(rank_items[rank_items.length - 1].dataset.songId);
                        rank_items[rank_items.length - 1].classList.add("active");
                    }else if(rank_items[i].classList.contains("active")) {
                        rank_items[i].classList.remove("active");
                        songid = parseInt(rank_items[i].previousElementSibling.dataset.songId);
                        rank_items[i-1].classList.add("active");
                        break;
                    }                
                }
            } else if (window.location.href.includes("search")) {
                for (let i = songSearch_items.length -1; i >= 0; i--) {
                    if(songSearch_items[i] == songSearch_items[0]) {
                        songSearch_items[i].classList.remove("active");
                        songid = parseInt(songSearch_items[songSearch_items.length - 1].dataset.songId);
                        songSearch_items[songSearch_items.length - 1].classList.add("active");
                    }else if(songSearch_items[i].classList.contains("active")) {
                        songSearch_items[i].classList.remove("active");
                        songid = parseInt(songSearch_items[i].previousElementSibling.dataset.songId);
                        songSearch_items[i-1].classList.add("active");
                        break;
                    }                
                }
            }
        }
        console.log(songid);
        await saveCurrentSong(userId, songid, "00:00");
        await handleCurrentSong(userId, true);
    }
    $(".controls_player li:nth-child(4)").onclick = async () => {
        const songid = nextSong();
        await saveCurrentSong(userId, songid, "00:00");
        await handleCurrentSong(userId, true);
    }
}

function nextSong() {
    var songid;
        if ($(".controls_player li:nth-child(1)").classList.contains("active")) {
            return handleSongRandom(songid);
        } else {
            if(window.location.href.includes("library")) {
                const song_items = $$(".song_items");
                for (let i = 0; i < song_items.length; i++) {
                    if(song_items[i] == song_items[song_items.length - 1]) {
                        song_items[i].classList.remove("active");
                        songid = parseInt(song_items[0].dataset.songId);
                        song_items[0].classList.add("active");
                    } else if(song_items[i].classList.contains("active")) {
                        song_items[i].classList.remove("active");
                        songid = parseInt(song_items[i].nextElementSibling.dataset.songId);
                        song_items[i+1].classList.add("active");
                        break;
                    }
                }
            } else if (window.location.href.includes("discover")) {
                for (let i = 0; i < songDiscover.length; i++) {
                    if(songDiscover[i] == songDiscover[songDiscover.length - 1]) {
                        songDiscover[i].classList.remove("active");
                        songid = parseInt(songDiscover[0].dataset.songId);
                        songDiscover[0].classList.add("active");
                    } else if(songDiscover[i].classList.contains("active")) {
                        songDiscover[i].classList.remove("active");
                        songid = parseInt(songDiscover[i].nextElementSibling.dataset.songId);
                        songDiscover[i+1].classList.add("active");
                        break;
                    }
                }
            } else if (window.location.href.includes("rank")){
                for (let i = 0; i < rank_items.length; i++) {
                    if(rank_items[i] == rank_items[rank_items.length - 1]) {
                        rank_items[i].classList.remove("active");
                        songid = parseInt(rank_items[0].dataset.songId);
                        rank_items[0].classList.add("active");
                    } else if(rank_items[i].classList.contains("active")) {
                        rank_items[i].classList.remove("active");
                        songid = parseInt(rank_items[i].nextElementSibling.dataset.songId);
                        rank_items[i+1].classList.add("active");
                        break;
                    }
                }
            } else if (window.location.href.includes("search")) {
                for (let i = 0; i < songSearch_items.length; i++) {
                    if(songSearch_items[i] == songSearch_items[songSearch_items.length - 1]) {
                        songSearch_items[i].classList.remove("active");
                        songid = parseInt(songSearch_items[0].dataset.songId);
                        songSearch_items[0].classList.add("active");
                    } else if(songSearch_items[i].classList.contains("active")) {
                        songSearch_items[i].classList.remove("active");
                        songid = parseInt(songSearch_items[i].nextElementSibling.dataset.songId);
                        songSearch_items[i+1].classList.add("active");
                        break;
                    } 
                }
            }
            return songid;
        }
}

function handleSongRandom (songid) {
    if (window.location.href.includes("library")) {
        const song_items = $$(".song_items");
        do {
            var random = Math.floor(Math.random() * song_items.length);
        }
        while (random == currentSong.dataset.songId);
        songid = parseInt(song_items[random].dataset.songId);
        for(let i = 0; i < song_items.length; i++) {
            if(song_items[i].classList.contains("active")) {
                song_items[i].classList.remove("active");
                break;
            }
        }
        song_items[random].classList.add("active");
    } else if (window.location.href.includes("discover")) {
        do {
            var random = Math.floor(Math.random() * songDiscover.length);
        }
        while (random == currentSong.dataset.songId);
        songid = parseInt(songDiscover[random].dataset.songId);
        for(let i = 0; i < songDiscover.length; i++) {
            if(songDiscover[i].classList.contains("active")) {
                songDiscover[i].classList.remove("active");
                break;
            }
        }
        songDiscover[random].classList.add("active");
    } else if (window.location.href.includes("rank")) {
        do {
            var random = Math.floor(Math.random() * rank_items.length);
        }
        while (random == currentSong.dataset.songId);
        songid = parseInt(rank_items[random].dataset.songId);
        for(let i = 0; i < rank_items.length; i++) {
            if(rank_items[i].classList.contains("active")) {
                rank_items[i].classList.remove("active");
                break;
            }
        }
        rank_items[random].classList.add("active");
    } else if (window.location.href.includes("search")) {
        do {
            var random = Math.floor(Math.random() * songSearch_items.length);
        }
        while (random == currentSong.dataset.songId);
        songid = parseInt(songSearch_items[random].dataset.songId);
        for(let i = 0; i < songSearch_items.length; i++) {
            if(songSearch_items[i].classList.contains("active")) {
                songSearch_items[i].classList.remove("active");
                break;
            }
        }
        songSearch_items[random].classList.add("active");
    }
    return songid;
}

$("#heart").addEventListener('click', function () {
    this.classList.toggle('active');
    const songId = parseInt(media.dataset.songId); // Lấy song_id từ data attribute
    if (this.classList.contains('active')) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', './app/controllers/handleSLibraryController.php', true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    if (window.location.href.includes("library")) {
                        $(".songs").innerHTML = xhr.responseText;
                        $(`.song_items[data-song-id="${songId}"]`).classList.add("active");
                        selectorHeart();
                        selectorSongItems(sessionStorage.getItem("userId") == "" ? 2 : JSON.parse(sessionStorage.getItem("userId")))
                    } else if (window.location.href.includes("rank")) {
                        $(`.rank_items[data-song-id="${songId}"]`).querySelector(".heart_icon").classList.add("active");
                    } else if (window.location.href.includes("category")) {
                        $(`.song_items[data-song-id="${songId}"]`).querySelector(".heart_icon").classList.add("active");
                    }
                } else {
                    console.log("Error saving current song");
                }
            }
        };
        xhr.send(JSON.stringify({ func: 'addSongToLibrary', data: songId }));  
    }else{
        if (window.location.href.includes("library")) {
            $(`.song_items[data-song-id="${songId}"]`).remove();
        } else if (window.location.href.includes("rank")) {
            $(`.rank_items[data-song-id="${songId}"]`).querySelector(".heart_icon").classList.remove("active");
        } else if (window.location.href.includes("category")) {
            $(`.song_items[data-song-id="${songId}"]`).querySelector(".heart_icon").classList.remove("active");
        }
        const xhr = new XMLHttpRequest();
        xhr.open('POST', './app/controllers/handleSLibraryController.php', true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log(xhr.responseText);
                } else {
                    console.log("Error saving current song");
                }
            }
        };
        xhr.send(JSON.stringify({ func: 'removeSongLibrary', data: songId }));
    }
});
// sessionStorage.removeItem("userId")

function selectorHeart () {
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
                    }
                } else {
                    console.log("Error saving current song");
                }
            }
        };
        xhr.send(JSON.stringify({ func: 'removeSongLibrary', data: songId }));

        });
    });
}

function selectorSongItems(userId) {
    const song_items = $$(".song_items");
    song_items.forEach(item => {
        item.addEventListener("click", async (e) => {
            if (!e.target.closest(".item_action")) {
                console.log(item);
                await saveCurrentSong(userId, parseInt(item.dataset.songId), "00:00");
                await handleCurrentSong(userId, true);
                for(let i = 0; i < song_items.length; i++) {
                    if(song_items[i].classList.contains("active")) {
                        song_items[i].classList.remove("active");
                        break;
                    }
                }
                item.classList.add("active");
            }
        });
        if(item.dataset.songId == media.dataset.songId) {
            item.classList.add("active");
        }
    });
}