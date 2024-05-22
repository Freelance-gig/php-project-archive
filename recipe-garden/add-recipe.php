<?php 
    session_start();
    if (!isset($_SESSION['id'])) {
      header('Location: signin.php');
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Recipe Garden User Profile </title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="./static/input.css">
        <link rel="stylesheet" href="./static/output.css">
    </head>
 
    <body>
        <?php 
            include_once("./static/modules/header.php")
        ?>
            <main class="flex justify-center items-center">
    
            <main class="flex justify-center items-center">
                <form method="POST" enctype="multipart/form-data" id="add-recipe-form">
                    <h2> Add Recipe </h2>
                    <div class="grid">
                        <label> Food Name </label>
                        <input type="text" class="bg-gray-200 h-[29px] w-[100%]" name="food_name" id="food_name" />
                    </div>
                    <div class="grid">
                        <label> Food Description </label>
                        <input type="text" class="bg-gray-200 h-[29px] w-[100%]" name="food_description" id="food_description" />
                    </div>
                    <div class="grid">
                        <label> Food Ingredients </label>
                        <textarea
                        name="food_ingredients" id="food_ingredients"
                        class="bg-gray-200 h-[29px] w-[100%]"> 

                        </textarea>
                    </div>
                    <div class="grid">
                        <label> Food Collection </label>
                        <select name="collection_id" id="collection_id">
                            <option value="">--Please choose an option--</option>

                         </select>
                    </div>

                    <div class="grid">
                        <label> Food Instructions </label>
                        <textarea
                        name="food_description" id="food_description"
                        class="bg-gray-200 h-[29px] w-[100%]"> 

                        </textarea>
                    </div>
                    <div class="grid">
                        <label> Food Location </label>
                        <input type="text" class="bg-gray-200 h-[29px] w-[100%]" name="food_location" id="food_location" />
                        
                    </div>
                    <div class="grid">
                        <label> Food Image  </label>
                        <input type="file" name="food_image" id="food_image" />
         
                    </div>
                    <button type="submit" class="rounded-full border px-4 py-2"  > Add Collection </button>
                </form>
            </main>>
            </main>
        <?php 
        include_once("./static/modules/footer.php")
        ?>
    </body>
    <script src="./server-side/api/v1/scripts/add-recipe.js"> </script>
    <script src="./server-side/api/v1/scripts/get-collection.js"> </script>
</html>
