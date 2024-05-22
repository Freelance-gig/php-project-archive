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

    <!-- End Navigation -->
    <div class="bg-wrapper">
        <div class="auth-container">
            <?php
                include('import/message.php')
            ?>
            <form class="form-container" method="POST">
                <h1 class="form-header">Sign up</h1>
                <input 
                    type="text"
                    class="input"
                    name="fullname"
                    placeholder="Full Name" />

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
                <input 
                    type="password"
                    class="input"
                    name="confirm_password"
                    placeholder="Confirm Password" />

                <button
                    type="submit"
                    name="register-btn"
                    class="form-button"
                >Create Account</button>

                <div class="form-terms">
                    By signing up, you agree to the 
                    <a class="" href="#">
                        Terms of Service
                    </a> and 
                    <a class="" href="#">
                        Privacy Policy
                    </a>
                </div>
            </form>

            <div class="auth-nav">
                Already have an account? 
                <a class="" href="login.html">
                    Log in
                </a>.
            </div>
        </div>
    </div>

  </body>
</html>
