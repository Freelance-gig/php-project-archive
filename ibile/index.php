<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>Home Page</title>
</head>
<body class="ff-montserat flow">
    <!--Header Section-->
    <header class="header container flow">
        <?php 
            include('./assets/components/navbar.php')
        ?>
        <p class="text-dark bg-light">
            Your way to African foods   
        </p>
        <h1 class="mg-2">
            <span class="text-white header-span">
                A place to get all African dishes <br /> from Morocco, South African, <br /> Nigeria and many more
            </span> 
        </h1>       
        <div class="mg-2">
            <div>
                <h2 class="bold text-white">What African Dish would you like to cook ?</h2>
                <div>
                        <input class="input" id="home-search"/>            
                        <button class="btn text-white" id="home-search-button"> Search </button>
                </div>

            </div>
        </div>
    </header>
    <!-- Main Section -->
    <main class="container flow">
        <h1 class="main-title"> Popular Recipes </h1>
        <div id="recipe-container" class="grid recipe-container">
            <!-- <div class="recipe" >
                <img src="./assets/imgs/bg-2.jpg" class="recipe-img"/>
                <span class="recipe-cat"> South African Dish </span>
                <h3 class="recipe-name"> Bobotie </h3>
                <button class="btn" type="button" onclick="window.location.href='./recipe-detail.php'"> View </button>
            </div> -->
        </div>
        <a href="./recipes.php"> <button> View ALL  </button> </a>
    </main>
    <?php 
        include('./assets/components/footer.php');
    ?>

<script src="./server/recipes/getAllRecipes.js"></script>
<script src="./server/recipes/searchHome.js"></script>

</body>
</html>