<?php 
  require('./inc/db_config.php');
  require('./inc/utils.php');
  if(isset($_SESSION['isAuthenticated'])) {
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible"content="IE=edge">
      <meta name="viewport"content="width=device-width,initial-scale=1.0">
      <?php require('./inc/header.php')?>
      <title> Nova Travels - Book your next destination </title>
      <link rel="stylesheet" href="./assets/css/auth.css">
  </head>
  <body>
      <?php require('./inc/navbar.php') ?>
        <!-- signin form section starts-->
        <section class="form-container">
            <form method="POST">
              <h2> Novara Travels </h2>
              <hr />
              <h3> Sign Up </h3>
                <div class="d-flex flex-column"> 
                <span> First Name </span>
                <input type="text" name="firstname" />
                </div>
                <div class="d-flex flex-column"> 
                    <span> Last Name </span>
                    <input type="text" name="lastname" />
                </div>
              <div class="d-flex flex-column"> 
                  <span> Email </span>
                  <input type="email" name="email" />
              </div>
              <div class="d-flex flex-column"> 
                  <span> Password </span>
                  <input type="password" name="password" />
              </div>
              <div class="d-flex flex-column"> 
                <span> Confirm Password </span>
                <input type="password" name="confirm-password" />
              </div>
              <button name="signup" type="submit"> Sign Up </button> 
              <hr />
              <span> Forgot password </span>
  
            </form>
            <?php
              if(isset($_POST['signup'])) {
                // collect data from from and sanitize inputs
                $from_data = filteration($_POST);
                //  verify if user email is unique
                $verify_query = "SELECT email FROM customer WHERE `email` =?";
                $res = select($verify_query , [$from_data['email']], "s");
                if($res->num_rows==1) {
                  echo '
                    <div class="alert alert-warning" role="alert">
                      user already exists
                    </div>
                    ';
                } else {
                  // run query to create users
                  $values = [
                    $from_data['email'],
                    $from_data['firstname'],
                    $from_data['lastname'],
                    $from_data['password']
                  ];
                  $register_query  = "INSERT INTO customer (`email`,`lastname`, `firstname`, `password`) VALUES
                  (?, ?, ?, ?)";
                  $res = select($register_query, $values, "ssss");
                  redirect('login.php');
                }
              }
            ?>
            <div> Already Have an account? <span><a href="./login.php"> Login </a></span></div>
      </section>
      <!-- login from section ends-->
    <?php require('./inc/footer.php') ?>
  </body>
  <?php require('./inc/script.php') ?>
</html>