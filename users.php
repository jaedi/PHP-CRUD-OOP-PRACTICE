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

        public function index() {
            $query = "SELECT * FROM userstable";
            $result = $this->con->query($query);
            $data = array();
            if($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            } else {
                echo "No record found.";
            }
            return $data;
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

        public function getUser($id) {
            $query = "SELECT * FROM userstable WHERE id='$id'";
            $result = $this->con->query($query);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            } else {
                echo "User record not found.";
            }
        }
        public function update($data) {
            $name = $this->con->real_escape_string($_POST['name']);
            $email = $this->con->real_escape_string($_POST['email']);
            $username = $this->con->real_escape_string($_POST['username']);
            $password = $this->con->real_escape_string(md5($_POST['password']));

            $id = $this->con->real_escape_string($_POST['id']);

            if(!empty($id) && !empty($data)) {
                $query = "UPDATE userstable SET name = '$name', email = '$email', username = '$username', password = '$password' WHERE id = '$id'";
                $sql = $this->con->query($query);
                if($sql==true) {
                    header("Location: index.php?status=updateSuccess");
                } else {
                    echo "Record update failed, please try again.";
                }
            }
        }
        public function delete($id) {
            $query = "DELETE FROM userstable WHERE id='$id'";
            $sql = $this->con->query($query);
            if($sql==true) {
                header("Location:index.php?status=deleteSuccess");
            } else {
                echo "Failure in deleting this user, please try again.";
            }
        }

    }
?>