<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website With Login & Registration</title>
    <link rel="stylesheet" href="./public/css/register_login.css?v=<?php echo time()?>">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
        <nav class="navigation">
            <button class="backToDiscover">Back</button>
        </nav>
    </header>
    <div class="wrapper active-popup">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" name="emailLogin" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="passwordLogin" required>
                    <label >Password</label>
                </div>
                <div class="remember-forgot">
                    <label ><input type="checkbox" >
                    Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn" name="loginbtn">Log in</button>
                <div class="login-register">
                    <p>Don't Have an account ?
                        <a href="#" class="register-link">Register</a></p>
                    </p>
                </div>
            </form>
        </div> 

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <input type="text" name="username" required>
                    <label >Username</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" name ="email" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name ="password" required>
                    <label >Password</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <button type="button" class="sendCodebtn">Send code</button>
                    </span>
                    <input type="number" name ="otpCode" required>
                    <label >Authentication code</label>
                </div>
                <div class="remember-forgot">
                    <label ><input type="checkbox" >
                    I agree to the terms & conditions</label>
                    
                </div>
                <button type="submit" class="btn" name ="registersub">Sign Up</button>
                <div class="login-register">
                    <p>Already have an account ?
                        <a href="#" class="login-link">Login</a></p>
                    </p>
                </div>
            </form>
        </div> 
    </div>
    <script src="./public/js/register_login.js?v=<?php echo time()?>"></script>
</body>
</html>