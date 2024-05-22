<?php 
    session_start();
    
    define('DB_HOST', 'localhost');
    define('DB_USER', 'nosa');
    define('DB_PASSWORD', 'password');
    define('DB_DATABASE', 'novara_food_db');
    // define('SITE_URL', 'http://localhost/novara-food/');
    define('SITE_URL', 'http://localhost:3000/');

    include_once('serverfiles/db.php');
    $db = new DatabaseConnection();


    function base_url($slug) {
        echo SITE_URL.$slug;
    }

    function validateInput($dbconn, $input) {
        return mysqli_real_escape_string($dbconn, $input);
    }

    function redirect($message, $page) {
        $redirectTo = SITE_URL.$page;
        $_SESSION['message'] = "$message";
        header("Location: $redirectTo");
        exit(0);
    }
?> 

