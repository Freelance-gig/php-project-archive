<?php 
    // session_start();
    require('./server/server-config.php');
    if (isset($_SESSION['loggedIn'])) {
        header('Location: index.php');
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>Login-Signup | As a chef or A Foodie</title>
</head>
<body class="ff-montserat ">
    <!-- Header section--> 
    <header class="container">
        <?php 
            include('./assets/components/navbar.php')
        ?>
    </header>
     <!-- Main section--> 
     <main class="auth-wrapper flex ">
        <div class="tab-container">
            <ul class="tab-nav flex">
                <li class="tab-btn"> Login  </li>
                <li class="tab-btn"> Sign Up </li>
            </ul>
            <div class="content-box">
                <div class="content">
                    <h2 class="mg-1"> Login </h2>
                    <form class="auth-form">
                        <label> Email </label>
                        <input id="login-email" placeholder="Email" type="email" required class="input" />
                        <label> Password </label>
                        <input id="login-password" placeholder="Password" required type="password" class="input" />
                        <button type="button" id="login" class="btn mg-2"> Login </button>
                    </form>
                </div>
                <div class="content">
                    <h2 class="mg-1"> Sign Up </h2>
                    <form class="auth-form sign-up">
                        <div class="grid">
                            <label> First Name</label>
                            <input
                                id="firstname"
                                name="firstnane"
                                type="text"
                                required
                                placeholder="firstname"
                                class="input"/>    
                        </div>
                        <div class="grid">
                            <label> Last Name</label>
                            <input
                                id="lastname"
                                name="lastname"
                                placeholder="lastname"
                                required
                                class="input"/>    
                        </div>
                        <div class="grid">
                            <label> Email</label>
                            <input
                                id="email"
                                name="email"
                                placeholder="Email"
                                type="email"
                                class="input" />
                        </div>
                        <fieldset>
                            <legend> Select a User Type</legend>
                            <div> 
                                <input
                                    class="userType"
                                    type="radio"
                                    name="userType"
                                    value="foodie" checked/>
                                <label> Foodie </label>
                            </div>
                            <div>
                                <input
                                    class="userType"
                                    type="radio"
                                    name="userType"
                                    value="cook" />
                                <label> Cook </label>
                            </div>
                            <div>
                                <input
                                    class="userType"
                                    type="radio"
                                    name="userType"
                                    value="admin" />
                                <label> Admin </label>
                            </div>
                        </fieldset>
                        <div class="grid">
                            <label> Password </label>
                            <input
                                name="password"
                                id="password"
                                placeholder="Password"
                                type="password"
                                class="input"
                            />
                        </div>
                        <div class="grid">
                            <label> Confirm Password </label>
                            <input
                                id="confirm_password"
                                name="confirm_password"
                                placeholder="Confirm password" type="password" class="input" />
                        </div>
                        <button type="button" id="signup" class="btn mg-2 sign-up-btn"> Sign up </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include('./assets/components/footer.php');
    ?>
    <script src="./server/auth/auth.js"></script>
</body>
</html>