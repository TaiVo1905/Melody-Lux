const registerButton = document.getElementById('register');
const loginButton = document.getElementById('login');
const container = document.getElementById('container');

function sendEmailCode(email) { // Tạo yêu cầu AJAX var 
    xhr = new XMLHttpRequest(); xhr.open("GET", "./app/mail/sendEmail.php?func=sendEmailCode&email=" + encodeURIComponent(email), true); 
    xhr.onreadystatechange = function() { if (xhr.readyState == 4 && xhr.status == 200) { // Xử lý kết quả trả về từ PHP 
    var response = xhr.responseText;
        document.querySelector(".input").value = response;
    } };
    xhr.send();
}
const test = document.querySelector(".social-container");
console.log(test);
test.addEventListener("click", () => {
    sendEmailCode("voductaitxqt123@gmail.com");
});
registerButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
    console.log("aaa");
});

loginButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
});