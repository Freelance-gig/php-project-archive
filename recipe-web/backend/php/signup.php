<?php
    require("../../server.php");
    if (isset($_SESSION['isAuthenticated'])) {
        header('Location: ../../index.php');
        exit();
    }

    if (isset($_POST['signup'])) {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $conPassword = $conn->real_escape_string($_POST['conPassword']);
        $user_type = $conn->real_escape_string($_POST['user_type']);
        $fullname = $conn->real_escape_string($_POST['fullname']);
        $username = $conn->real_escape_string($_POST['username']);

        
        
        $result = $conn->query("SELECT email FROM users where email='$email'");

        if ($result->num_rows > 1) {
            exit("A user with this email exists");
        };

        if ($password === $conPassword) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $result_create = $conn->query("INSERT INTO users (fullname, email, username, user_type, password)
             VALUES ('$fullname', '$email', '$username', '$user_type', '$hash_password')");
        
            exit("success");
        } else {
            exit("Password do not match");
        }
    }
?>