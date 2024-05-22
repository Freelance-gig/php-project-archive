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
    <title> Sweet Recipes | Sign up </title>
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
            <h2>Signup</h2>
            <form id="login-form">
                <p>
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                <input type="text" id="username" name="username" placeholder="Username" required><i class="validation"><span></span><span></span></i>
                </p>
                <fieldset style="font-size: 1rem;">
                    <legend style="font-size: 1rem;">Select a User Type</legend>
                    <div class="d-flex justify-content-between">
                        <div>
                            <input type="radio" id="user_type" name="user_type" value="admin" />
                            <label for="admin">Admin</label>
                        </div>

                        <div>
                            <input type="radio" id="user_type" name="user_type" value="cook" />
                            <label for="cook">Cook</label>
                        </div>

                    </div>
                    </fieldset>

                <p>
                <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="password" id="conPassword" name="conPassword" placeholder="Confirm Password" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                <input type="button" id="signup-btn" value="Create Account" style="background-color: #910A67; color: #fff;">
                </p>
            </form>
            <div id="create-account-wrap">
                <p>Already a member? <a href="login.php">Sign In to Your Account</a><p>
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
    <script src="./backend/scripts/signup.js"> </script>
</body>
</html>
