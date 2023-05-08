<?php
require_once "../Controllers/AuthController.php";
require_once '../Models/UserModel.php';

//$errmsg='';
if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $user = new User;
        $auth = new auth;
        $user->email = $_POST['email'];
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];
        if ($auth->Register($user)) {
            session_start();
            $_SESSION['email'] = $user->email;
            $_SESSION['username'] = $user->password;
            $_SESSION['password'] = $user->password;
            echo 'Registered Successfully';
            header("location: index.php");
            exit();
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
    <title>Instapolaroid | SignUp</title>
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
                        <form action="" class="login-form" id="signup-form" method="post">
                            <p class="text-center alert-danger" id="error_message"></p>
                            <div class="form-group">
                                <div class="login-input">
                                    <input type="text" name="email" placeholder="Type a email..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="login-input">
                                    <input type="text" name="username" placeholder="Type a username..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="login-input">
                                    <input type="password" name="password" id="password"
                                        placeholder="Type a password..." required>
                                </div>
                            </div>


                            <div class="btn-group">
                                <button class="login-btn" id="signup_btn" type="submit">
                                    Sign Up
                                </button>
                            </div>
                        </form>
                        <div class="or">
                            <hr />
                            <span>OR</span>
                            <hr />
                        </div>

                        <div class="goto">
                            <p class="">Already have an account? <a href="login.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="footer">
        <div class="links" id="links">
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

    <!-- script -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>