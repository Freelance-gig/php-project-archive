<?php
    require('./config.php');
    if (isset($_SESSION['loggedIn'])) {
        header('Location: ../election-list.php');
        exit();
    };

    if (isset($_POST['login'])) {
      $email = $connection->real_escape_string($_POST['email']);
      $password = $connection->real_escape_string($_POST['password']);
      $pathname = $connection->real_escape_string($_POST['pathname']);

      $res = $connection->query(query: "SELECT password from users WHERE email='$email'");

      if ($res->num_rows > 0 ) {
        $user_type_res = $connection->query(query: "SELECT `user_type` from `users` WHERE email='$email'");
        $user_type = $user_type_res->fetch_assoc()['user_type'];
      
        if (  $user_type != 'officer' && $pathname == '/officer-auth.php') {
          exit ('This user is not an election officer');
        }
  
        if ( $user_type != 'admin' && $pathname == '/admin-auth.php') {
          exit ('This user is not an admin');
        }

        if ( $user_type != 'voter' && $pathname == '/voter-auth.php') {
          exit ('This user is not a voter');
        }
          $hashed_password = $res->fetch_assoc()['password'];
          
        if(password_verify($password, $hashed_password)) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['email'] = $email;
          
            $_SESSION['userType'] = $user_type;
            $res = $connection->query(query: "SELECT `id` from `users` WHERE email='$email'");
            $id = $res->fetch_assoc()['id'];
            $_SESSION['id'] = $id;

            $res_firstname   = $connection->query(query: "SELECT `firstname` from `users` WHERE email='$email'");
            $firstname = $res_firstname->fetch_assoc()['firstname'];
            $_SESSION['firstname'] = $firstname;
            exit('success');
        } else {
            exit('failed to veriy password');
        }
    } else {
      exit('User does not exist');
    };
    exit($email . " = " . $password);
  }

  if (isset($_POST['signup_officer'])) {
    $firstname = $connection->real_escape_string($_POST['firstname']);
    $lastname = $connection->real_escape_string($_POST['lastname']);
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);
    $confirm_password = $connection->real_escape_string($_POST['confirm_password']);
    $user_type='officer';
    $res = $connection->query(query: "SELECT email FROM users where `email`='$email'");
    if ($res->num_rows == 1) {
      exit("User Already exists");
    }

    if ($password == $confirm_password) {
      $enc_password = password_hash($password, PASSWORD_DEFAULT);
      $createuser = $connection->query(query: "INSERT INTO users (`firstname`, `lastname`, `email`, `user_type`, `password`) VALUES
      ('$firstname', '$lastname', '$email', '$user_type', '$enc_password');");
      exit("success");
  } else {
      exit("Password do not match");
  }
  }

  if (isset($_POST['signup_voter'])) {
    $location = $connection->real_escape_string($_POST['location']);
    $nationality = $connection->real_escape_string($_POST['nationality']);
    $DOB = $connection->real_escape_string($_POST['DOB']);
    $firstname = $connection->real_escape_string($_POST['firstname']);
    $lastname = $connection->real_escape_string($_POST['lastname']);
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);
    $confirm_password = $connection->real_escape_string($_POST['confirm_password']);
    $user_type='voter';
    $res = $connection->query(query: "SELECT email FROM users where `email`='$email'");
    if ($res->num_rows == 1) {
      exit("User Already exists");
    }
    if ($password == $confirm_password) {
      $enc_password = password_hash($password, PASSWORD_DEFAULT);
      $createuser = $connection->query(query: "INSERT INTO users ( `location`,`nationality`, `DOB`, `firstname`, `lastname`, `email`, `user_type`, `password`) VALUES
      ('$location', '$nationality', '$DOB', '$firstname', '$lastname', '$email', '$user_type', '$enc_password');");
      exit("success");
    } else {
        exit("Password do not match");
    }
  }

  if (isset($_POST['login_admin'])) {
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);

    $res = $connection->query(query: "SELECT password from users WHERE email='$email'");

    if ($res->num_rows > 0 ) {
        $hashed_password = $res->fetch_assoc()['password'];
        $user_type = $res->fetch_assoc()['user_type'];

        if ( $user_type != 'admin') {
          exit ('This user is not an admin');
        }
      if(password_verify($password, $hashed_password)) {
          $_SESSION['loggedIn'] = true;
          $_SESSION['email'] = $email;
          $res = $connection->query(query: "SELECT `id` from `users` WHERE email='$email'");
          $id = $res->fetch_assoc()['id'];
          $_SESSION['userType'] = $user_type;
          $_SESSION['id'] = $id;
          exit('success');
      } else {
          exit('failed to veriy password');
      }
  } else {
    exit('User does not exist');
  };
  exit($email . " = " . $password);
}
  
  if (isset($_POST['signup_admin'])) {
    $firstname = $connection->real_escape_string($_POST['firstname']);
    $lastname = $connection->real_escape_string($_POST['lastname']);
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);
    $confirm_password = $connection->real_escape_string($_POST['confirm_password']);
    $user_type='admin';
    $res = $connection->query(query: "SELECT email FROM users where `email`='$email'");
    if ($res->num_rows == 1) {
      exit("User Already exists");
    }

    if ($password == $confirm_password) {
      $enc_password = password_hash($password, PASSWORD_DEFAULT);
      $createuser = $connection->query(query: "INSERT INTO users (`firstname`, `lastname`, `email`, `user_type`, `password`) VALUES
      ('$firstname', '$lastname', '$email', '$user_type', '$enc_password');");
      exit("success");
  } else {
      exit("Password do not match");
  }
  }
?>