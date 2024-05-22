<?php 
    session_start();

    $conn = new mysqli(
        "localhost",
        "nosa",
        "password",
        "armeciadb"
    );

    if(!$conn) {
        die("Failed to connect to Database".mysqli_connect_error());
    };
?>