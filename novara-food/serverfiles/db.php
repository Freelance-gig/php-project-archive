<?php
    class DatabaseConnection {
        public $conn;
        public function __construct()
        {
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

            if (!$conn) {
                die ("<h1> Database Connection Failes </h1>");
            };
            return $this->conn = $conn;
        }
    }
?>