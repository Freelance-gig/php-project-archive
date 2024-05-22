<header class="text-center flex items-center justify-between p-8">
    <a href="index.php">
        <span class="inter-noto">
            Recipe Garden
        </span>
    </a>
   
    <ul class="hidden  md:flex gap-3 items-center">
        <!-- <li> <a href="index.html#about-us"> About Us </a></li> -->
        <li> <a href="index.php#contact-us"> Contact Us </a></li>
        
        <?php
            if (!isset($_SESSION['id'])) {
                echo '
                <li> <a href="signin.php"> Sign In </a></li>
                <li> <a href="register.php"> Register </a></li>
                ';
            } 
            if (isset($_SESSION['user_role'])) {
                if ($_SESSION['user_role'] === 'cook' || $_SESSION['user_role'] === 'admin') {
                   echo(' <li> <a href="add-recipe.php"> Add Recipe </a></li> ');
                }
                if ($_SESSION['user_role'] === 'admin') {
                    echo(' <li> <a href="add-collection.php"> Add Collection </a></li> ');
                 }
            }
        ?>
    </ul>
    <div class="flex gap-4 justify-between items-center">
        <div class="flex gap-2 bg-gray-200 p-4 rounded-full items-center">
            <span class="material-symbols-outlined"> 
                search
            </span>
            <input type="text" class="bg-gray-200 h-[29px] w-[100%]"/>
        </div>
        <?php 
        if (isset($_SESSION['id'])) {
                echo '
                <a href="./user-profile.php">
                    <span class="material-symbols-outlined">
                    account_circle
                    </span>
                </a>                
                ';}
        ?>

        <span class="material-symbols-outlined md:hidden">
            menu
        </span>
    </div>
</header>