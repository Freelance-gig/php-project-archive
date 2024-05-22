<?php 
    class User {
        private $conn;
        private $tables = 'users';

        public $id;
        public $user_role;
        public $firstname;
        public $lastname;
        public $email;
        public $password;

        // constructore with db connection
        public function __construct($db) {
            $this->conn = $db;
        }

        public function checkIfUserExists () {
            $checkUserQuery = 'SELECT email FROM ' .$this->tables. " WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($checkUserQuery);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            if ($stmt->fetchColumn()) {
                return true;
            } else {
                return false;
            }
        }
        // gettting users from database 
        public function readAllUsers () {
            // create query 
            $query  = 'SELECT `id`,
                `user_role`,
                `firstname`,
                `lastname`,
                `email`,
                `password` FROM '.$this->tables;

            // prepare statement 
            $stmt = $this->conn->prepare($query);

            // execute query
            $stmt -> execute();
            return $stmt;
        }

       // gettting users from database 
        public function readSingleUser () {
            $query  = 'SELECT id, user_role, firstname, lastname, email FROM '.$this->tables. ' WHERE email=:email LIMIT 1';
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->user_role = $row['user_role'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->email = $row['email'];
            $this->id = $row['id'];
        }

        // create user from database 
        public function createUser() {
            //  create query
            $query = 'INSERT INTO `users` (`user_role`, `firstname`, `lastname`, `email`, `password`) VALUES (:user_role, :firstname, :lastname, :email, :passwrd)';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->user_role = htmlspecialchars(strip_tags($this->user_role));
            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->password = htmlspecialchars(strip_tags($this->password));
            // bind parameter

            $stmt->bindParam(':user_role', $this->user_role);
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':passwrd', $this->password);

            // execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;

        }

        // update user in database
        public function updateUser() {
            //  create query
            $query = 'UPDATE `users` 
            SET user_role   = :user_role, 
                firstname   = :firstname,
                lastname    = :lastname,
                email       = :email, 
                password    = :passwrd
            WHERE id = :userid';

            // prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->user_role = htmlspecialchars(strip_tags($this->user_role));
            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->id =  htmlspecialchars(strip_tags($this->id));
    
            // bind parameter

            $stmt->bindParam(':user_role', $this->user_role);
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':passwrd', $this->password);
            $stmt->bindParam(':userid', $this->id);
            

            // execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;

        }

        // delete user from table
        public function deleteUser () {
            // query 
            $query = 'DELETE FROM users WHERE id = ?';
            
            // prepare statment
            $stmt = $this->conn->prepare($query);

            // clean data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // $stmt->bindParam(':userId', $this->id);
            $stmt->bindParam(1, $this->id);
            // execute query 
            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;

        }

        public function validateUser() {
            $passwordQuery = "SELECT password from users WHERE email = :email";
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
    }
?>