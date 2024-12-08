document.addEventListener('DOMContentLoaded', () => {
    const border_circle = document.getElementById('border_circle'); 
    const personal = document.getElementById('personall');
    const logoutbtn = document.querySelector('#logoutbtn');
    border_circle.addEventListener('mouseenter', () => {
        personal.style.display = 'block';
    });

    personal.addEventListener('mouseleave', () => {
        personal.style.display = 'none';
    });
    function logOut() {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "./app/controllers/logOutController.php?func=logOut", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        resolve(true);
                    } else {
                        reject(false);
                    }
                }
            };
            xhr.send();
        });
    }

    logoutbtn.addEventListener("click", () => {
        logOut()
            .then(() => {
                window.location.href = "discover";
            })
            .catch(() => {
                alert("Logout failed. Please try again.");
            });
    });

    const lni = document.getElementById('lni');
    const theme_container = document.getElementById('theme-container');
    
    lni.addEventListener('mouseover', () => {
        theme_container.style.display = 'block';
    });

    theme_container.addEventListener('mouseleave', () => {
        theme_container.style.display = 'none';
    });

    const themeBackground = document.getElementById('theme-background');
    const applyButtons = document.querySelectorAll('.theme-item .apply-btn');
    const savedBackground = localStorage.getItem('themeBackgroundImage');
    if (savedBackground) {
        themeBackground.style.backgroundImage = `url(${savedBackground})`;
        themeBackground.style.display = 'block';
    }
    applyButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const themeItem = event.target.closest('.theme-item');
            const img = themeItem.querySelector('img').src;
            localStorage.setItem('themeBackgroundImage', img);
            themeBackground.style.backgroundImage = `url(${img})`;
            themeBackground.style.display = 'block'; 
        });
    });
});
