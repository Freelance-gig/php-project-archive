<header id="header">
    <div id="logo">
        <span><a href="index.php">Novara FOOD PLANET</a></span>
    </div>
    <nav id="mainnav" class="fl_right">
        <ul class="">
            <!-- <li class="active"><a href="index.php">Home</a></li> -->
            <li class="active"><a href="<?= base_url("./index.php") ?>">Home</a></li>
            <!-- <li class="active"><a href="recipes.php">All Recipes</a></li> -->
            <li class="active"><a href="<?= base_url("./recipes.php") ?>">All Recipes</a></li>
            <li class="active"><a href="<?= base_url("./index.php#contact-us") ?>">Contact Us</a></li>

            <?php if(isset($_SESSION['authenticated']))  : ?>

            <li class="active"><a href="<?= base_url("./addrecipe.php") ?>">Add Recipe</a></li>
            <li class="active">
            <form method="POST">
                <button type="submit" name="logout-btn">Log Out</button>
            </form>
            </li>
            <?php else :?>
                <li class="active"><a href="<?= base_url("./signup.php") ?>">Sign up</a></li>
                <li class="active"><a href="<?= base_url("./login.php") ?>">Log In</a></li>
            <?php endif; ?>
            
            <li class="active"><a href="<?= base_url("./about-us.php") ?>">About Us</a></li>
            <!-- 
                <li class="active"><a href="index.php#contact-us">Contact Us</a></li>
                <li class="active"><a href="signup.php">Sign Up</a></li>
                <li class="active"><a href="login.php">Login In</a></li>
                <li class="active"><a href="about-us.php">About us</a></li>
            -->
        </ul>
    </nav>         
</header>
