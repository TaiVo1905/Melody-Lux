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
