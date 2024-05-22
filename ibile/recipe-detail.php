<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title> Recipe Deetail Page</title>
    <title>Document</title>
</head>
<body class="ff-montserat flow">
        <!-- Header section--> 
    <header class="container">
        <?php 
            include('./assets/components/navbar.php')
        ?>
    </header>
    <!-- Main Section -->
    <main class="grid recipe-detail flow">
            <!-- Recipe Info Section -->
            <section id="recipe-info" class="grid recipe-detail-info">
                    <!-- <h2> Chicken Cury </h2>
                    <span class="recipe-cat"> South African Dish </span>
                    <div class="flex recipe-time">
                        <span> Total </span> <span class="time"> 30mins </span>
                    </div> -->
            </section>
            <secion class="recipe-detail-image"> 
                <!-- <div class="image-slider"> -->
                    <!-- <img src="./assets/imgs/bg-2.jpg" class="active" /> -->
                    <img src="./assets/imgs/healthy-food.png" />
                    <!-- <img src="./assets/imgs/bg-2.jpg" /> -->

                <!-- </div> -->
                
                <!-- <button class="navicon left"> <img src="./assets/imgs/left-icon.png" /> </button>
                <button class="navicon right"> <img src="./assets/imgs/right-icon.png" class="righticon-img"/> </button>
                 -->
            </secion>
            <!-- Nutrition Section -->
            <section class="recipe-nutrition flow">
                <h2> Nutrition per Serving</h2>
                <div class="flex">
                    <div class="grid">
                        <span class="name">
                            Calories
                        </span>
                        <span class="value">
                            224
                        </span>
                    </div>
                    <div class="grid">
                        <span  class="name"> 
                            Protein
                        </span>
                        <span class="value">
                            16.9kg 
                        </span>
                    </div>
                </div>
            </section>
            <!-- Ingridients Section -->
            <section class="recipe-ingridient">
                <h2> Ingridients </h2>
                <ul>
                    <li> <span> Chopped Tomatoes </span> <span> 400g </span></li>
                    <li> <span> Chopped Tomatoes </span> <span> 400g </span></li>
                    <li> <span> Chopped Tomatoes </span> <span> 400g </span></li>
                    <li> <span> Chopped Tomatoes </span> <span> 400g </span></li>
                </ul>
            </section>
            <section class="recipe-instuctions"> 
                <h2> Instructions </h2>
                <ul>
                    <li> <span> 1 </span> <span> Heat coconut oil in a medium heat </span> </li>
                    <li> <span> 1 </span> <span> Heat coconut oil in a medium heat </span> </li>
                    <li> <span> 1 </span> <span> Heat coconut oil in a medium heat </span> </li>
                    <li> <span> 1 </span> <span> Heat coconut oil in a medium heat </span> </li>

                </ul>
            </section>
        </main>
        <?php 
        include('./assets/components/footer.php');
        ?>


<script src="./server/recipes/getRecipeDetail.js"></script>

</body>
</html>