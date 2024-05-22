<?php 
  include('./serverfiles/auth.php');
  $login->isLoggedIn();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Novara FOOD_PLANET Registration</title>
    <link rel="stylesheet" href="./media/css/index.css" />
    <link rel="stylesheet" href="./media/css/signup.css" />
  </head>

  <body>
      <!-- Start Navigation  -->
      <?php 
        include('import/navbar.php')  
      ?>
      <!-- End Navigation-->
      <!--Login Section-->
      <div class="bg-wrapper">
        <div class="auth-container">
            <?php
                include('import/message.php')
            ?>
            <form class="form-container" method="POST">
                <h1 class="form-header">Log In</h1>
                <input 
                    type="text"
                    class="input"
                    name="email"
                    placeholder="Email" />
                <input 
                    type="password"
                    class="input"
                    name="password"
                    placeholder="Password" />
                <button
                    type="submit"
                    name="login-btn"
                    class="form-button"
                >Login</button>
            </form>

            <div class="auth-nav">
                Don't have an account?
                <a class="" href="signup.html">
                    Sign Up
                </a>.
            </div>
        </div>
    </div>

    </body>
</html>
