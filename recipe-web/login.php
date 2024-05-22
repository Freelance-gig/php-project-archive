<?php 
    session_start();
    if (isset($_SESSION['isAuthenticated'])) {
        header('Location: ../../index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Recipes | Login </title>
    <?php 
        include('./shared/header_links.php')
    ?>
    <link rel="stylesheet" href="css/login.css">

<body>
    <!-- BODY HEADER -->
    <header id="nav-head" style="background-color: #F1EAFF">
        <?php
            include('./shared/sign-nav.php')
        ?>
    </header>

      
    <!-- BODY MAIN SECTION -->
    <main>
        <div id="login-form-wrap" style="margin-top: 100px;">
            <h2>Login</h2>
            <form id="login-form">
                <p>
                    <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
                </p>
                <input type="button" id="login-btn" value="Login" style="background-color: #910A67; color: #fff;">

                    <!-- <button type="button" id="login-btn" value="Login" style="background-color: #910A67; color: #fff;"> Signup </button> -->
            </form>
            <div id="create-account-wrap">
                <p>Not a member? <a href="./signup.php">Create Account</a><p>
            </div><!--create-account-wrap-->
        </div>
    </main>

    <!-- FOOTER -->
    <?php 
            include('./shared/footer.php')
        ?>
        <!-- JAVA SCRIPT LINK -->
        <?php 
            include('./shared/footer_links.php')
        ?>
        <script src="./backend/scripts/login.js"> </script>
      
</body>