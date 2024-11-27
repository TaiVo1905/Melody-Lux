<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link rel="stylesheet" href="./public/css/register_login.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container register-container">
            <form class="form" action="" method="POST">
                <h1 class="dangnhap">Đăng Kí</h1>
                <input class="input" type="text" name="username" placeholder="Tên">
                <input class="input" type="email" name="email" placeholder="Email">
                <input class="input" type="password" name="password" placeholder="Mật khẩu">
                <input class="input" type="number" name="otpCode" placeholder="Mã xác thực">
                <button class="danki">Đăng kí</button>
                <span class="optionsaccount">hoặc sử dụng tài khoản của bạn</span>
                <div class="social-container">
                    <a href="#" class="social iconMXH"><i class="lni lni-facebook-fill"></i></a>
                    <a href="#" class="social iconMXH"><i class="lni lni-google"></i></a>
                    <a href="#" class="social iconMXH"><i class="lni lni-linkedin-original"></i></a>
                </div>
            </form>
        </div>
        <div class="form-container login-container">
            <form  class="form" action="#">
                <h1 class="dangnhap">Đăng Nhập</h1>
                <input class="input" type="email" name="emailLogin" placeholder="Email">
                <input class="input" type="password" name="passwordLogin" placeholder="Mật khẩu">
                <div class="content">
                    <div class="checkbox">
                        <input class="input" type="checkbox" name="" id="checkbox">
                        <label>Ghi nhớ</label>
                    </div>
                    <div class="pass-link">
                        <a href="#" class="iconMXH">Quên mật khẩu?</a>
                    </div>
                </div>
                <button class="danki" name="LoginButton">Đăng nhập</button>
                <span class="optionsaccount">hoặc sử dụng tài khoản của bạn</span>
                <div class="social-container">
                    <a href="#" class="social iconMXH"><i class="lni lni-facebook-fill"></i></a>
                    <a href="#" class="social iconMXH"><i class="lni lni-google"></i></a>
                    <a href="#" class="social iconMXH"><i class="lni lni-linkedin-original"></i></a>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title dangnhap">Chào bạn</h1>
                    <p class="para">Nếu bạn đã có tài khoản, hãy đăng nhập và hòa mình vào nhịp điệu vui vẻ!</p>
                    <button class="ghost danki" id="login">Đăng nhập
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title dangnhap">Bắt đầu <br> hành trình <br>ngay bây giờ</h1>
                    <p class="para">Nếu bạn chưa có tài khoản, hãy tham gia với chúng tôi và bắt đầu hành trình của bạn.</p>
                    <button class="ghost danki" id="register">Đăng kí
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/js/register_login.js"></script>
</body>
</html>