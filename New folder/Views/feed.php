<?PHP

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../Controllers/PostController.php";
require_once "../Models/Post.php";
require_once '../Models/PostComment.php';

$postCon = new PostController;
$posts = $postCon->getPostsWithLikes();
$errMsg = "";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instapolaroid</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>

<body> 
    <!-- navigation -->
    <!-- <nav class="navbar">
        <div class="nav-wrapper">
            <img class="brand-img" src="images/logo.png" alt="logo">
            <form class="search-form">
                <input type="text" class="search-box" placeholder="search..">
            </form>
            <div class="nav-items">
                <a href="#"><i class="icon fas fa-home"></i></a>
                <a href="camera.html"><i class="icon fas fa-plus"></i></a>
                <i class="icon fas fa-heart"></i>
                <div class="icon user-profile">
                    <a href="profile.html"><i class="fas fa-user"></i></a>
                </div>
            </div>
        </div>
    </nav> -->

    <!-- section -->
    <section class="main">
        <div class="wrapper">
            <div class="left-col">

                <!--STATUS-->

                <!-- <div class="status-wrapper">
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                      
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                        
                    <div class="status-card">
                        <div class="profile-pic">
                            <img src="https://mimo.app/r/lori.png" alt="profile-pic" />
                        </div>
                        <p class="username">username</p>
                    </div>
                </div> -->

                <!-- POST -->

                <div class="post">
                    <?PHP
                    foreach ($posts as $post) {
                        ?>
                        <div class="info">
                            <div class="user">
                                <div class="profile-pic">
                                    <img src="images/lori.png" alt="profile-pic">
                                </div>
                                <p class="username"><?PHP echo $post['username'];?></p>
                            </div>
                            <i class="fas fa-ellipsis-h options"></i>
                        </div>
                        <img src="<?PHP echo $post['UploadedMedia'] ?>" alt="post-image" class="post-image">
                        <div class="post-content">
                            <div class="reaction-wrapper">
                                <!-- <i class="icon fas fa-heart"></i>
                                <i class="icon fas fa-comment"></i> -->
                                <!-- <input type="submit" value="Love"> -->
                            </div>
                            <p class="likes"><?PHP echo $post['likes']; ?> Likes</p>
                            <p class="description"><span><?PHP echo $post['username'];?></span><?PHP echo $post['Description'];?></p>
                            <p class="post-time"><?PHP echo $post['TimeOfPost'];?></p>
                        </div>
                        <?PHP
                    }
                    ?>
                </div>

            </div>
            <div class="right-col">

                <!--profile-card-->

                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="images/lori.png" alt="profile-pic">
                    </div>
                    <div>
                        <p class="username">username</p>
                        <p class="sub-text">sub-text</p>
                    </div>
                    <button class="logout-btn">logout</button>
                </div>

                <!--suggestion-card-->

                <p class="suggestion-text">Suggestions For You</p>
                
                <div class="suggestion-card">
                    <div class="suggestion-pic">
                        <img src="images/lori.png" alt="profile-pic">
                    </div>
                    <div>
                        <p class="username">username</p>
                        <p class="sub-text">sub-text</p>
                    </div>
                    <button class="follow-btn">follow</button>
                </div>

            </div>
        </div>
    </section>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>