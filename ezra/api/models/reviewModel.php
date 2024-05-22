<?php
    class ReviewModel {
        private $conn;
        private $tables = 'reviews';

        public $review_id;
        public $user_id;
        public $recipe_id;
        public $review_text;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getReviews() {
            // create query 
            $query  = 'SELECT user_id, user_role, firstname, lastname, email, profile_image FROM '.$this->tables;

            // prepare statement 
            $stmt = $this->conn->prepare($query);

            // execute query
            $stmt -> execute();
            return $stmt;
        }
    }
?>