<?PHP
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../Controllers/PostController.php";
require_once '../Models/PostComment.php';

$postCon = new PostController;
$errMsg = "";

if(isset($_POST['comment'])) {
    if(!empty($_POST['comment'])) {
      $comment = new PostComment;
      
      $comment->setUsername($_SESSION['username']);
      $comment->setComment($_POST['comment']);
      $comment->setPostID(27); //think about this one
      // not: id auto incremented and the username from session.
      if($postCon->addComment($comment)) {
        echo 'yup';
      }
      else {
        $errMsg = 'error db';
      }

    }
    else {
        $errMsg = 'please fill all the data';
    }
  }
  else $errMsg = "error ";

  echo $errMsg;
?>

<form class="post" method="POST">
    

    <div class="comment-wrapper">
        <!-- <img src="https://mimo.app/r/lori.png" class="icon" alt="profile-pic"> -->
        <input name = 'comment' type="text" class="comment-box" placeholder="Add a comment" />
        <!-- <input type="submit" value="post"> -->
        <button type="submit" class="comment-btn">post</button>
    </div>

</form>