<?php 
    session_start();
    if (!isset($_SESSION['isAuthenticated'])) {
        header('Location: ../../login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Recipe | Add your own Recipe</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"</head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<body>
      <!-- BODY HEADER -->
      <header id="nav-head" style="background-color: #F1EAFF">
            <?php 
                    include('./shared/nav.php')
                ?>
        </header>

        <main>
        <div id="login-form-wrap" style="margin-top: 100px;">
            <h2> Add Recipe</h2>
            <form id="add-recipe-form"  enctype="multipart/form-data" method="POST">
                <p class="feedback"> </p>

                <p>
                    <input type="text" id="recipe_name" name="recipe_name" placeholder="Recipe Name" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="text" id="recipe_description" name="recipe_description" placeholder="Recipe Description" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="recipe_ingredients" id="recipe_ingredients" name="recipe_ingredients" placeholder="Recipe Ingredients" required><i class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input type="number" id="recipe_time" name="recipe_time" placeholder="recipe_time" required><i class="validation"><span></span><span></span></i>
                </p>
                
                <label for="recipe_list_id">Choose a Recipe Collection:</label>
                <select class='mb-2' name="recipe_list_id" id="recipe_list_id">
                    <option value="">--Please choose an option--</option>
                </select>
                <p>
                <input class='mb-2'  type="file" id="recipe_image" name="recipe_image" required><i class="validation"><span></span><span></span></i>

                </p>
                <input type="submit" id="add-recipe" value="Add Recipe"  style="background-color: #910A67; color: #fff;"/>
            </form>
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
    <script src="./backend/scripts/add-recipe.js"> </script>
    <script src="./backend/scripts/view-recipelist.js"> </script>

</body>
</html>