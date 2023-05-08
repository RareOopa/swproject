<?php 

    class Post {
        private $username;
        private $ID;
        private $Description;
        private $Hashtags;

        private $TimeOfPost;
        private $UploadedMedia;

        public function getUsername() {
            return $this->username;
        }
        public function getID() {
            return $this->ID;
        }
        public function getDescription() {
            return $this->Description;
        }
        public function getHashtags() {
            return $this->Hashtags;
        }
        public function getUloadedMedia() {
            return $this->UploadedMedia;
        }

        public function getTimeOfPost() {
            return $this->UploadedMedia;
        }

        public function setTimeOfPost($name) {
            $this->username = $name;
        }

        public function setUsername($name) {
            $this->username = $name;
        }

        public function setID($id) {
            $this->ID = $id;
        }

        public function setDescription($des) {
            $this->Description = $des;
        }

        public function setHashtags($hash) {
            $this->Hashtags = $hash;
        }

        public function setUploadedMedia($media) {
            $this->UploadedMedia = $media;
        }

    }

?>