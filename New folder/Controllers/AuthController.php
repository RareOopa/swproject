<?php

require_once '../Models/UserModel.php';
require_once '../Controllers/DBController.php';
//$errmsg='';
class auth
{

    public $db;
    public $user;
    public function Register(user $user)
    {
        $this->db = new DB;
        $this->user = new User;

        if ($this->db->con()) {
            $user->email = $_POST['email'];
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $sql = "SELECT email,username FROM user where email = '{$user->email}' OR username = '{$user->username}'";
            $result1 = mysqli_query($this->db->connection, $sql);
            if (mysqli_num_rows($result1) > 0) {

                echo 'Username/Email exists';
                return false;
            } else {
                $query = "insert into user values ('{$user->username}','{$user->password}', '{$user->email}',now(),'changethis.jpg','changeme','0','0')";
                $result = $this->db->insert($query);
                return true;


                if ($result != false) {
                    $this->db->closecon();
                    echo 'User registered successfully';
                    return true;
                } else {
                    echo 'Error (AuthContoller.php)';
                    return false;
                }
            }

        } else {
            echo 'Error in connection' . $this->db->connection->connect_error;
        }

    }
    public function login(user $user)
    {
        $this->db = new db;
        $this->user = new user;
        $this->user->username = $_POST['username'];
        $this->user->password = $_POST['password'];
        if ($this->db->con()) {
            $check = "select username from user where username = '{$user->username}'";
            $r1 = $this->db->select($check);
            if (count($r1) == 0) {
                echo 'Username does not exist';
                return false;
            } else {
                $query = "select username,password from user where username = '{$user->username}' and password = '{$user->password}'";
                $result = $this->db->select($query);
                if (count($result) == 0) {
                    echo 'Username and password combination is incorrect';
                    return false;
                } else {
                    $this->db->closecon();
                    return true;
                }
            }
        } else {
            echo 'Error in connection (auth.php,login)';
        }
    }


}

?>