<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title>Ibile - Recipes </title>
</head>
<body class="ff-montserat flow">
    <!-- Header section--> 
    <header class="container">
        <?php 
            include('./assets/components/navbar.php')
        ?>
    </header>
      <!-- Main Section -->

      <main class=" container flow">
        <div class="grid recipe-search mg-2">
            <div>
                <div class="search-container">
                        <input class="search-input" placeholder="Search for your recipes" id="live-search"/>            
                        <button class="btn" id="live-search-button"> Search </button>
                        <select id="select-location" name="location" id="location">
                            <option value="east">East Africa </option>
                            <option value="southa">South Africa</option>
                            <option value="west">West Africa</option>
                            <option value="north">North Africa</option>
                        </select>
                </div>
                <div class="flex food-category">
                    <button class="category" data-id="meats"> Meat & Seafood</button>
                    <button class="category" data-id="soups"> Soup </button>
                    <button class="category" data-id="morsel"> Morsel </button>
                    <button class="category" data-id="grain"> Morsel </button>
                </div>
            </div>

        </div>
        <div class="grid recipe-container mg-2" id="recipe-container">
            <!-- <div class="recipe" >
                <img src="./assets/imgs/bg-2.jpg" class="recipe-img"/>
                <span class="recipe-cat"> South African Dish </span>
                <h3 class="recipe-name"> Bobotie </h3>
                <button class="btn" type="button" onclick="window.location.href='./recipe-detail.html'"> View </button>
            </div> -->

        </div>

    </main>


    <?php 
        include('./assets/components/footer.php');
    ?>
    <script src="./server/recipes/searchRecipe.js"> </script>
</body>
</html>