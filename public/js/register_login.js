const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const sendCodebtn = $('.sendCodebtn');
const loginLink = $('.login-link');
const registerLink = $('.register-link');
const backToDiscover = $('.backToDiscover');
const iconClose = $('.icon-close');
const logInForm = $('.login');
const registerForm = $('.register');
const wrapper = $('.wrapper');

registerLink.addEventListener('click',() => {
    window.location.href = "register";
});

loginLink.addEventListener('click',() => {
    window.location.href = "logIn";
});

backToDiscover.addEventListener('click',() => {
    window.location.href = "discover";
});
iconClose.addEventListener('click',() => {
    window.location.href = "discover";
});


document.addEventListener("DOMContentLoaded", () => {
    if (window.location.href.includes("register")) {
        wrapper.classList.add('active');
    }
})

function sendEmailCode(email) { // Tạo yêu cầu AJAX var 
    xhr = new XMLHttpRequest();
    xhr.open("GET", "./app/mail/sendEmail.php?func=sendEmailCode&email=" + encodeURIComponent(email), true); 
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) { // Xử lý kết quả trả về từ PHP 
            var response = xhr.responseText;
            document.querySelector(".input").value = response;
        }
    };
    xhr.send();
}

sendCodebtn.addEventListener("click", () => {
    sendEmailCode(registerForm.querySelector("input[type='email']").value);
});