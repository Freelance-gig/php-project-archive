<?php 
    session_start();
    unset($_SESSION['isAuthenticated']);
    session_destroy();
    header('Location: /login.php');
    exit();
?>