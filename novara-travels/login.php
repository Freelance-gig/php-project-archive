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
      <?php require('inc/header.php')?>
      <title> Nova Travels - Book your next destination </title>
      <link rel="stylesheet" href="assets/css/auth.css">
  </head>
  <body>
    <?php require('inc/navbar.php') ?>
    <!-- login form section starts-->
    <section class="form-container">
          <form method="POST">
            <h2> Novara Travels </h2>
            <hr />
            <h3> Sign In </h3>
            <div class="d-flex flex-column"> 
                <span> Email </span>
                <input name="email" type="email" />
            </div>
            <div class="d-flex flex-column"> 
                <span> Password </span>
                <input name="password" type="password" />
            </div>
            <button name="login" type="submit"> Log In </button>
          </form>
          <?php 
            if(isset($_POST['login'])) {
              // collect data from from and sanitize inputs
              $from_data = filteration($_POST);
              $query = "SELECT * FROM customer where `email` =? AND `password` =? ";
              $values = [$from_data['email'], $from_data['password']];
              $res = select($query, $values, "ss");
              if($res->num_rows ==1 ) {
                $row = mysqli_fetch_assoc($res);
                session_start();
                $_SESSION['isAuthenticated'] = true;
                $_SESSION['customerId'] = $row['cid'];
                $_SESSION['firstname'] = $row['firstname'];
                redirect('dashboard.php');
              } else {
                echo ' 
                    <div class="alert alert-warning" role="alert">
                      Wrong user credentials
                    </div>
                  ';
              }
            }
          ?>
          <hr />
            <span> Forgot password </span>

          <div> Don't have an account ? <span><a href="./signup.php"> Sign up </a></span></div>
    </section>
    <!-- login from section ends-->
              <?php require('./inc/footer.php') ?>
  </body>
  <?php require('./inc/script.php') ?>
</html>