<?php
class dbConnection
{
    private $servername = "127.0.0.1:3306";
    private $username = "root";
    private $password = "eldl";
    private $dbname = "users";

    public function __construct()
    {
    }

    public function getConnection()
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "Connected successfully";

        return $conn;
    }
}