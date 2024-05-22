<?php 
    session_start();

    $config = parse_ini_file(__DIR__. "/backend-config.ini");
    
    define('DB_HOST', $config["db_host"]);
    define('DB_USER', $config["db_user"]);
    define('DB_PASSWORD', $config["db_password"]);
    define('DB_NAME', $config["db_name"]);
    define('DB_DSN', $config["db_dsn"]);
    define('SITE_URL', 'http://localhost:3000/');
    define('APP_NAME', 'Ezra');
    
    require_once('backend-database.php');
    $db = new DatabaseConnection();
    
    function base_url($slug) {
        echo SITE_URL.$slug;
    }

    // prevent XSS (cross-site-scripting)
    function acceptInput($input) {
        return htmlspecialchars(strip_tags($input));
    }

    function redirect($message, $page) {
        $redirectTo = SITE_URL.$page;
        $_SESSION['message'] = "$message";
        header("Location: $redirectTo");
        exit(0);
    }
?>