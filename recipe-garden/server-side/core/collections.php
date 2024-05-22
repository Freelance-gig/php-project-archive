<?php 

    class Collection {
        private $conn;
        private $table = 'collections';

        public $collection_id;
        public $user_id;
        public $collection_name;
        public $collection_image;

        public function __construct($db) {
            $this->conn = $db;
            $this->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        }

        public function createCollection () {
            $query = 'INSERT INTO collections (user_id, collection_name, collection_image) VALUES (:user_id, :collection_name, :collection_image)';

            $stmt = $this->conn->prepare($query);

            $this->collection_name = htmlspecialchars(strip_tags($this->collection_name));
            $this->collection_image = htmlspecialchars(strip_tags($this->collection_image));

            $stmt->bindParam(':collection_name', $this->collection_name);
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':collection_image', $this->collection_image);


                // execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        
        }

        public function readAllCollections () {
            $query = 'SELECT c.collection_id, collection_name, collection_image from collections c LEFT JOIN recipes r on c.collection_id = r.collection_id';
            
            $stmt = $this->conn->prepare($query);

            $stmt -> execute();
            return $stmt;
        }

        public function readSingleCollection () {
            $query = 'SELECT * from collections c LEFT JOIN recipes r on c.collection_id = r.collection_id WHERE collection_id = :collection_id ';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':collection_id', $this->collection_id);
            $stmt -> execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->collection_name = $row['collection_name'];
            $this->user_id =  $row['user_id'];
        }

        public function updateCollection () {
            $query = 'UPDATE collections SET collection_name = :collection_name WHERE collection_id = :collection_id';
            $stmt = $this->conn->prepare($query);
            $this->collection_name = htmlspecialchars(strip_tags($this->collection_name));
            
            $this->collection_id = htmlspecialchars(strip_tags($this->collection_id));
            $stmt->bindParam(':collection_id', $this->collection_id);
            
            $stmt->bindParam(':collection_name', $this->collection_name);       

            // execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }

        public function deleteCollection () {
            $query = 'DELETE FROM collections WHERE collection_id = :collection_id';

            $stmt = $this->conn->prepare($query);

            $this->collection_id = htmlspecialchars(strip_tags($this->collection_id));
            $stmt->bindParam(':collection_id', $this->collection_id);
            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;

        }

    }
?>