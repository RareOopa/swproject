<?PHP
//if(array_key_exists('upfile', $_FILES) && array_key_exists('error', $_FILES['upfile'])

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../Controllers/PostController.php";
require_once '../Models/Post.php';

$postCon = new PostController;
$errMsg = "";

if(isset($_POST['Description']) && isset($_POST['Hashtags']) && isset($_FILES['image'])) {
    if(!empty($_POST['Description']) && !empty($_POST['Hashtags']) && !empty($_FILES['image'])) {
      $post = new Post;
      
      $post->setUsername($_SESSION['username']);
      $post->setDescription($_POST['Description']);
      $post->setHashtags($_POST['Hashtags']);
      // not: id auto incremented and the username from session.
      $id = 5;
      $imgLocation = "../images/".date('h-i-s').$_FILES['image']['name'];
      if(move_uploaded_file($_FILES['image']['tmp_name'], $imgLocation)) {
        $post->setUploadedMedia($imgLocation);

        if($postCon->addPost($post)) header("location: feed.php");
        else $errMsg = "Something went wrong";
      }
      else $errMsg = "error upload";
  
  
    }
    else {
        $errMsg = 'please fill all the data';
    }
  }
  else $errMsg = "error ";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instapolaroid | addpost</title>
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    />
    <link rel="stylesheet" href="style.css" />
    <link 
        rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    />
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
                <a href="index.html"><i class="icon fas fa-home"></i></a>
                <a href="#"><i class="icon fas fa-plus"></i></a>
                <i class="icon fas fa-heart"></i>
                <div class="icon user-profile">
                    <a href="profile.html"><i class="fas fa-user"></i></a>
                </div>
            </div>
        </div>
    </nav> -->

    <div class="camera-container">
        <div class="camera">
            <div class="camera-image">
                <form method="POST" action = "AddPost.php"  class="camera-form" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <input type="text" name="Description" class="form-control" placeholder="Type caption..">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Hashtags" class="form-control" placeholder="Type hashtags..">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name = "image">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login">
                        <!-- <button type="submit" name="" class="upload-btn">Post</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</body>
</html>