<?php

    class Users {
        private $server = "127.0.0.1";
        private $username = "root";
        private $password = "";
        private $database = "test";
        public $con;

        //Database Connection
        public function __construct() {
            $this->con = new mysqli($this->server, $this->username, $this->password, $this->database);
            if(mysqli_connect_error()) {
                trigger_error("Failed to connect to Database: " . mysqli_connect_error());   
            }else{
                return $this->con;
            }
        }

        public function create($post) {
            //Get values sent via User's POST Request
            $name = $this->con->real_escape_string($_POST['name']);
            $email = $this->con->real_escape_string($_POST['email']);
            $username = $this->con->real_escape_string($_POST['username']);
            $password = $this->con->real_escape_string(md5($_POST['password']));

            //Query
            $query = "INSERT INTO userstable(`name`, `email`, `username`, `password`) VALUES ('$name', '$email', '$username', '$password')";
            $sql = $this->con->query($query);
            if($sql==true) {
                header("Location: index.php?status=create");
            }else {
                echo "Registration failed";
            }
        }
    }
?>