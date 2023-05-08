<?php
require_once "../Controllers/AuthController.php";
require_once '../Models/Post.php';
//$errmsg="";
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $user = new user;
        $auth = new auth;
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        $login = $auth->login($user);
        if ($login) {
            session_start();
            $_SESSION['username'] = $user->username;
            $_SESSION['password'] = $user->password;
            //  echo $user->username;
            //   echo $user->password;
            header("Location: AddPost.php");
            //exit();
        }
    } else {
        echo 'Please fill all fields';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instapolaroid | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>

<body>

    <div class="container">
        <div class="main-container">
            <div class="main-content">
                <div class="slide-container" style="background-image: url('images/mobile-frame.png');">
                    <div class="slide-content" id="slide-content">
                        <img src="images/screen1.jpg" class="active" alt="screen1">
                        <img src="images/screen2.jpg" alt="screen2">
                        <img src="images/screen3.jpg" alt="screen3">
                        <img src="images/screen4.jpg" alt="screen4">
                        <img src="images/screen5.jpg" alt="screen5">
                    </div>
                </div>
                <div class="form-container">
                    <div class="form-content box">
                        <div class="logo">
                            <img src="images/logo.png" alt="logo" class="logo-img">
                        </div>

                        <form action="" class="login-form" id="login-form" method="post">
                            <p class="text-center alert-danger" id="error_message"></p>
                            <div class="form-group">
                                <div class="login-input">
                                    <input type="text" name="username" placeholder="Type your Username..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="login-input">
                                    <input type="password" id="password" name="password"
                                        placeholder="Type your password..." required>
                                </div>
                            </div>
                            <div class="btn-group">
                                <a class="login-btn" href=""><button class="login-btn" id="login_btn" type="submit">Log
                                        In</button></a>
                            </div>
                        </form>
                        <div class="or">
                            <hr />
                            <span>OR</span>
                            <hr />
                        </div>

                        <div class="goto">
                            <p class="">Don't have an account? <a href="signup.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer">
            <div class="links" id="links">
                <br>
                <a href="#">About</a>
                <a href="#">Blog</a>
                <a href="#">Jobs</a>
                <a href="#">Help</a>
                <a href="#">Privacy</a>
                <a href="#">API</a>
                <a href="#">Terms</a>
                <a href="#">Top Account</a>
                <a href="#">Hashtags</a>
                <a href="#" id="dark-btn">Dark</a>
            </div>
            <div class="copyright">@ 2023 Instapolaroid from Multiverse.</div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>