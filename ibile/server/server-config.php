<?php 
session_start();


$connection = new mysqli(
    "localhost", 
    "mayowa",
    "password",
    "ibiledb"
);

if(!$connection) {
    die("Database server error".mysqli_connect_error());
};

?>