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
            //Fetch All Data from Users Table
            $stmt = $this->con->prepare("SELECT * FROM userstable");
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }  else {
                echo "User record not found.";
            }
            return $data;
        }

        public function create($post) {
            //Get values sent via User's POST Request
            $name = $this->con->real_escape_string($_POST['name']);
            $email = $this->con->real_escape_string($_POST['email']);
            $username = $this->con->real_escape_string($_POST['username']);
            $password = $this->con->real_escape_string(md5($_POST['password']));

            //Prepared Statements (Avoid SQL Injection)
            $stmt = $this->con->prepare("INSERT INTO userstable(`name`, `email`, `username`, `password`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssss', $name, $email, $username, $password);
            if($stmt->execute()) {
                header("Location: index.php?status=create");
            }  else {
                echo "Registration failed";
            }
        }

        public function getUser($id) {
            $stmt = $this->con->prepare("SELECT * FROM userstable WHERE id=?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result) {
                $row = $result->fetch_assoc();
                return $row;
            }  else {
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

                //Update Prepared Statements (Avoid SQL Injection)
                $stmt = $this->con->prepare("UPDATE userstable SET name=?, email=?, username=?, password=? WHERE id=?");
                $stmt->bind_param('ssssi', $name, $email, $username, $password, $id);
                if($stmt->execute()) {
                    header("Location: index.php?status=updateSuccess");
                }  else {
                    echo "Record update failed, please try again.";
                }
            }
        }
        public function delete($id) {
            //Delete Prepared Statements (Avoid SQL Injection)
            $stmt = $this->con->prepare("DELETE FROM userstable WHERE id=?");
            $stmt->bind_param('i', $id);
            if($stmt->execute()) {
                header("Location:index.php?status=deleteSuccess");
            }  else {
                echo "Failure in deleting this user, please try again.";
            }
        }

    }
?>