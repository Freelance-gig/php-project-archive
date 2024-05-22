<?php
    require("../../server.php");
    if (isset($_SESSION['isAuthenticated'])) {
        header('Location: ../../index.php');
        exit();
    }

    if (isset($_POST['login'])) {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $result = $conn->query("SELECT * from users WHERE email='$email'");
        $hashed_password = $result->fetch_assoc()['password'];
        if($result->num_rows > 0) {
            if(password_verify($password, $hashed_password)) {
                $_SESSION['isAuthenticated'] = true;
                $_SESSION['email']= $email;
                $result = $conn->query("SELECT user_type from users WHERE email='$email'");
                $user_type = $result->fetch_assoc()['user_type'];
                $result = $conn->query("SELECT id from users WHERE email='$email'");
                $id = $result->fetch_assoc()['id'];

                // $username = $result->fetch_assoc()['username'];
                // $fullname = $result->fetch_assoc()['fullname'];

                // $_SESSION['fullname']= $fullname;
                // $_SESSION['username']= $username;
                $_SESSION['id']= $id;
                $_SESSION['user_type']= $user_type;


                exit ('success');

            } else {
                exit ('Failed to verify password');
            }
        } else {
            exit ('User Does not exist');
        };
    }
?>