<?php 
    session_start();

    $db_user = 'idris';
    $db_password = 'password';
    $db_name = 'recipe_gardendb';
    $db_server = 'localhost';
    $dsn="mysql:host=localhost;dbname=recipe_gardendb";


    $db_connection = new PDO($dsn, $db_user, $db_password);

    $db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db_connection->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
    $db_connection->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);

    define('APP_NAME', 'RECIPE_GARDEN')
    
?>