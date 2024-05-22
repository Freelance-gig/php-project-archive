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
    <main>
    <div class="content">
        <h2 class="mg-1"> Sign Up </h2>
        <form method="POST" enctype="multipart/form-data" id="add-recipe-form">
            <div class="grid">
                <label> Recipe Name</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    required
                    placeholder="name"
                    class="input"/>    
            </div>
            <div class="grid">
                <label> Recipe Description</label>
                <input
                    id="description"
                    name="description"
                    type="text"
                    required
                    placeholder="description"
                    class="input"/>    
            </div>
            <div class="grid"> 
                <label for="location">Choose a location:</label>

                <select name="location" id="location">
                    <option value="">--Please choose an option--</option>
                    <option value="east"> East Africa</option>
                    <option value="west"> West Africa</option>
                    <option value="south"> South Africa</option>
                    <option value="north">North Africa</option>

                </select>
            </div>
            <div class="grid">

            <label for="category">Choose a category:</label>
                <select name="category" id="category">
                    <option value="">--Please choose an option--</option>
                    <option value="soups">Soups</option>
                    <option value="morsel">Morsel</option>
                    <option value="meats">Meats</option>
                    <option value="grain">Grains</option>
                </select>
            </div>
            <!-- <div class="grid">
                <label> Recipe Category</label>
                <input
                    id="category"
                    name="category"
                    type="text"
                    required
                    placeholder="category"
                    class="input"/>    
            </div> -->
            <div class="grid">
                <label> Ingredients </label>
                <input
                    id="ingredients"
                    name="ingredients"
                    type="text"
                    required
                    placeholder="ingredients"
                    class="input"/>    
            </div>
            <div class="grid">
                <label> Instructions </label>
                <input
                    id="instructions"
                    name="instructions"
                    type="text"
                    required
                    placeholder="instructions"
                
                    class="input"/>    
            </div>
            <div class="grid">
                <label> Image </label>
                <input
                    id="image"
                    name="image"
                    type="file"
                    required
                    placeholder="image"
                    class="input"/>    
            </div>
            <button type="submit" class="btn mg-2 sign-up-btn"> Add Recipe </button>
            
        </form>
    </div>

    </main>
    <?php 
        include('./assets/components/footer.php');
    ?>

    <script src="./server/recipes/addNewRecipe.js"></script>

</body>
</html>