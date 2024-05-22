<?php 
    require('../server-config.php');
    if (isset($_SESSION['loggedIn'])) {
        header('Location: ../../index.php');
        exit();
    };
    if (isset($_POST['login'])) {
        $email = $connection->real_escape_string($_POST['email']);
        $password = $connection->real_escape_string($_POST['password']);

        // search for email and get encrypted password
        // compare with raw input password using
        // $data = $connection->query(query: "SELECT id FROM users WHERE email='$email' AND password='$password'");
        $res = $connection->query(query: "SELECT password from users WHERE email='$email'");
        $hashed_password = $res->fetch_assoc()['password'];
        if ($res->num_rows > 0 ) {
            if(password_verify($password, $hashed_password)) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['email'] = $email;
                $res = $connection->query(query: "SELECT `user-type` from `users` WHERE email='$email'");
                $user_type = $res->fetch_assoc()['user-type'];
                $res = $connection->query(query: "SELECT `id` from `users` WHERE email='$email'");
                $id = $res->fetch_assoc()['id'];
                $_SESSION['userType'] = $user_type;
                $_SESSION['id'] = $id;
                exit('success'); 
            } else {
                exit('failed to veriy password');
            }
        } else {
            exit('failed');
        };

        exit($email . " = " . $password);
    }
    
    if (isset($_POST['signup'])) {
        $firstname = $connection->real_escape_string($_POST['firstname']);
        $lastname = $connection->real_escape_string($_POST['lastname']);
        $email = $connection->real_escape_string($_POST['email']);
        $user_type = $connection->real_escape_string($_POST['userType']);
        $password = $connection->real_escape_string($_POST['password']);
        $confirm_password = $connection->real_escape_string($_POST['confirm_password']);
        
        $res = $connection->query(query: "SELECT email FROM users where `email`='$email'");
        echo($res->num_row);
        if ($res->num_rows == 1) {
            exit("User Already exists");
        }
        if ($password == $confirm_password) {
            $enc_password = password_hash($password, PASSWORD_DEFAULT);
            $createuser = $connection->query(query: "INSERT INTO users (`firstname`, `lastname`, `email`, `user-type`, `password`) VALUES 
            ('$firstname', '$lastname', '$email', '$user_type', '$enc_password');");
            exit("success");
        } else {
            exit("Password do not match");
        }
    }
?>