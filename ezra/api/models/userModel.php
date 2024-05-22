<?php
    class UserModel {
        private $conn;
        private $tables = 'users';

        public $user_id;
        public $user_role;
        public $firstname;
        public $lastname;
        public $email;
        public $password;
        public $profile_image;

        // constructore with db connection
        public function __construct($db) {
            $this->conn = $db;
        }

        public function getUsers () {
            // create query 
            $query  = 'SELECT user_id, user_role, firstname, lastname, email, profile_image FROM users';

            // prepare statement 
            $stmt = $this->conn->prepare($query);

            // execute query
            $stmt->execute();
            return $stmt;
        }
        public function checkIfUserExists () {
            $checkUserQuery = 'SELECT email FROM ' .$this->tables. " WHERE email=:email LIMIT 1";
            $stmt = $this->conn->prepare($checkUserQuery);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            if ($stmt->fetchColumn()) {
                return true;
            } else {
                return false;
            }
        }
        public function createUser () {
            $query = 'INSERT INTO users (user_role, firstname, lastname, email, password) VALUES (:userRole, :firstname, :lastname, :email, :passwd)';
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':userRole', $this->userRole);
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':passwd', $this->password);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }
        public function checkLoginCredentials() {
            // fetch hashed password from database
            $passwordQuery = "SELECT password from users WHERE email=:email";
            $stmt = $this->conn->prepare($passwordQuery);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $row['password'];
            
            // verify password
            if(password_verify($this->password, $hashed_password)) {
                return true;
            } else {
                return false;
            }
        }
        public function getUser() {
            $query  = 'SELECT user_id, user_role, firstname, lastname, email, profile_image FROM '.$this->tables. ' WHERE email=:email LIMIT 1';
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->user_role = $row['user_role'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->email = $row['email'];
            $this->user_id = $row['user_id'];
        }
    }
?>