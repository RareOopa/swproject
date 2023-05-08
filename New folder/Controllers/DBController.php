<?php

class DB {
    public $dbHost="localhost";
    public $dbUser="root";
    public $dbPassword="";
    public $dbName="instagram";
    public $dbPort = "4306";
    public $connection;

    public function con()
    {
        $this->connection = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName, $this->dbPort);
        if ($this->connection->connect_error) {
            echo 'Error in Connection: ' . $this->connection->connect_error;
            return false;
        } else {
            return true;
        }
    }
    public function closecon()
    {
        if ($this->connection) {
            echo 'Connection has been closed';
            $this->connection->close();
        } else {
            echo 'Connection not established';
        }
    }
    public function insert($qry)
    {
        $result = $this->connection->query($qry);
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return $this->connection->insert_id; // for auto-incremented fields (PK)
        }

    }
    public function select($qry)
    {
        $result = $this->connection->query($qry); //result is the query statement sent by the user (usually the qry is the query statement string, result is for internal use)
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            return false;
        } else {
            return $result->fetch_all(MYSQLI_ASSOC); //returns all rows associated with the statement sent
        }
    }
    public function update($qry)
    {
        $result = $this->connection->query($qry); //result is the query statement sent by the user (usually the qry is the query statement string, result is for internal use)
        if (!$result) {
            echo "Error : " . mysqli_error($this->connection);
            echo 'Error (db.php/update function)';
            return false;
        } else {
            return true; //returns all rows associated with the statement sent
        }
    }

}

?>