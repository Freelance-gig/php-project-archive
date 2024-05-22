<?php
    class DatabaseConnection {
        public $conn;
        public function __construct()
        {
            $db_connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

            $db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db_connection->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
            $db_connection->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
            if (!$db_connection) {
                die ("<h1> Database Connection Failed </h1>");
            };
            return $this->conn = $db_connection;
        }
    }
?>