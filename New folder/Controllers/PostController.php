<?php

require_once '../Models/Post.php';
require_once '../Controllers/DBController.php';
class PostController
{
    private $db;

    public function addPost(Post $post)
    {
        $this->db = new DB;
        if ($this->db->con()) {
            $name = $post->getUsername();
            $des = $post->getDescription();
            $hash = $post->getHashtags();
            $image = $post->getUloadedMedia();
            $query = "insert into post values('$name', '', '$des', '$hash', now(), '$image')";
            //if($this->db->insert($query)) echo 'succ';
            return $this->db->insert($query);
        } else {
            echo 'error connection';
            return false;
        }
    }

    public function addComment(PostComment $comment)
    {
        $this->db = new DB;
        if ($this->db->con()) {
            $name = $comment->getUsername();
            $comm = $comment->getComment();
            $pid = $comment->getPostID();
            $query = "insert into comments_post values('', '$name', now(), '$pid', '$comm')";
            //if($this->db->insert($query)) echo 'succ';
            return $this->db->insert($query);
        } else {
            echo 'error connection';
            return false;
        }
    }

    public function getPostsWithLikes()
    {
        $this->db = new DB;
        if($this->db->con()) {
            $query = "SELECT post.ID, post.username, post.Description, post.Hashtags, post.TimeOfPost, post.UploadedMedia, COUNT(likes_post.username) AS likes 
            FROM post 
            LEFT JOIN likes_post ON post.ID = likes_post.PostID 
            GROUP BY post.ID";
            return $this->db->select($query);
        }
        else {
            echo 'error connection';
            return false;
        }
    }


}

?>