<?php
session_start();


$connection = new mysqli(
    "localhost",
    "wale",
    "password",
    "covevotedb"
);

if(!$connection) {
    die("Database server error".mysqli_connect_error());
};

?>