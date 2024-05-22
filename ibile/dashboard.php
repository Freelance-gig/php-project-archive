<?php 
    session_start();
    if (!isset($_SESSION['loggedIn'])) {
        header('Location: auth.php');
        exit();
    };
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <title> Dashboard </title>
</head>
<body>
            <!-- Header section--> 
    <header class="container">
        <?php 
            include('./assets/components/navbar.php')
        ?>
    </header>
    <main class="container ">
        
        <?php 
         echo($_SESSION['userType'])
        ?>
        <h3> My Recipes </h3>
    
        <div id="recipe-container" class="grid recipe-container mg-2">
        </div>

    </main>
    <?php 
        include('./assets/components/footer.php');
    ?>

    <script src="./server/recipes/recipesByUser.js"></script>

</body>
</html>