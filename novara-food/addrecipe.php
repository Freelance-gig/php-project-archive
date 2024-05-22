<?php 
  include('./serverfiles/recipes.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./media/css/index.css">
    <link rel="stylesheet" href="./media/css/addrecipe.css">
    <title>Add Recipe </title>
</head>
<body>
    <!-- Start Navigation  -->
    <?php 
      include('./import/navbar.php')  
    ?>
    <!-- End Navigation-->
    <div class="form-container">
    <?php
                include('import/message.php')
            ?>
      <form method="POST" class="recipeform-container">
        
        <label> Recipe Name </label>
        <input 
        type="text"
        class="input"
        name="food_name"
        placeholder="Enter Recipe Name" />
        <label> Recipe Description </label>
        <input 
          type="text"
          class="input"
          name="food_description"
          placeholder="Enter Recipe Description" />
        <label> Recipe Group </label>

          <input 
          type="text"
          class="input"
          name="group"
          placeholder="Enter Recipe Group" />
          <label> Recipe Preparations </label>
        <textarea 
        name="preparations"
        
        placeholder="Enter Recipe preparations"
        >


        </textarea>
        <label> Recipe Preparaion Time </label>
        
        <input 
        type="number"
        class="input"
        name="preparation_time"
        placeholder="Prepation Time" />

        <label> Recipe Ingredients </label>

        <textarea 
        name="ingredients"
        placeholder="Enter Recipe Ingredients">

        </textarea>
        
    <button type="submit" name="save-recipe"> save Recipe </button>
      </form>
    </div>


</body>
</html>