<nav class="navbar fixed-top navbar-expand-lg" style="background-color: #F1EAFF"> <!-- bg-body-tertiary -->
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="./index.php">Armercia Recipe</a>
                    <ul class="navbar-nav me-auto d-flex justify-content-center mb-2 mb-lg-0" id="nav-ul">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="./list_recipes.php">Recipe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./index.php#footer">Contact</a>
                        </li>
                        <?php
                            if (isset($_SESSION['isAuthenticated'])) {
                                echo '

                                <li class="nav-item">
                                    <a class="nav-link active" href="./add_recipe.php">Add Recipe</a>
                                </li>
                                ';
                            } 
                        ?>
                    </ul>
              
                    <div class="search-bar">
                        <form class="d-flex gap-2" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <?php
                                if (!isset($_SESSION['isAuthenticated'])) {
                            echo '                 <a id="login-button" class="btn btn-secondary me-2 nav-button" role="button" aria-disabled="false" href="login.php">Login</a>
                                            <a id="signup-button" class="btn btn-secondary nav-button" role="button" aria-disabled="false" href="signup.php">Signup</a>
                            ';
                                        }  else {
                                            echo '  <a id="login-button" class="btn btn-secondary me-2 nav-button" role="button" aria-disabled="false" href="./backend/php/logout.php">Logout</a>';
                                        }
                            ?>

                        </form>
                        
                    </div>
                    
            </div>
        </nav>