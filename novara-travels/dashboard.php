<?php
  require('./inc/db_config.php');
  if(!isset($_SESSION['isAuthenticated'])) {
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('./inc/header.php')?>
    <title>View all your tickets</title>
</head>
<body>
    <?php require('inc/navbar.php') ?>

    <?php 
            $firstname = $_SESSION['firstname'];
            $cid = $_SESSION['customerId'];
            //   if(isset($_SESSION['isAuthenticated'])) {
                echo "<p class='nav-item'>
                    welcome, $firstname
                  </p>";
            //   }
    ?>
    <div> You are logged In </div>
    <a href="index.php#book"> Book Now</a>
</body>
</html>