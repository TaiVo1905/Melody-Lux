<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website With Login & Registration</title>
    <link rel="stylesheet" href="../../public/css/newLogin.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
        <nav class="navigation">
            <button class="btnlogin-popup">Login</button>
        </nav>
    </header>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" required>
                    <label >Password</label>
                </div>
                <div class="remember-forgot">
                    <label ><input type="checkbox" >
                    Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Log in</button>
                <div class="login-register">
                    <p>Don't Have an account ?
                        <a href="#" class="register-link">Register</a></p>
                    </p>
                </div>
            </form>
        </div> 

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <input type="text" required>
                    <label >Username</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" required>
                    <label >Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <button class="send">Send code</button>
                    </span>
                    <input type="text" required>
                    <label >Authentication code</label>
                </div>
                <div class="remember-forgot">
                    <label ><input type="checkbox" >
                    I agree to the terms & conditions</label>
                    
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <div class="login-register">
                    <p>Already have an account ?
                        <a href="#" class="login-link">Login</a></p>
                    </p>
                </div>
            </form>
        </div> 
    </div>
    <script src="../../public/js/newLogin.js"></script>
</body>
</html>