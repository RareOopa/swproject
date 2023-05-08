<?php 

    class PostComment {
        private $username;
        private $ID;
        private $PostID;
        private $Date;
        private $Comment;

        public function getUsername() {
            return $this->username;
        }
        public function getID() {
            return $this->ID;
        }
        public function getPostID() {
            return $this->PostID;
        }
        public function getDate() {
            return $this->Date;
        }
        public function getComment() {
            return $this->Comment;
        }

        public function setUsername($name) {
            $this->username = $name;
        }

        public function setID($id) {
            $this->ID = $id;
        }

        public function setPostID($PID) {
            $this->PostID = $PID;
        }

        public function setDate($date) {
            $this->Date = $date;
        }

        public function setComment($comment) {
            $this->Comment = $comment;
        }

    }

?>