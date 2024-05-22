<?php
   // headers 
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
    
    // Intialize app
    include_once('../../models/initialize.php');
    $recipe = new RecipeModel($db->conn);

    //get recipe by id
    $recipe->recipe_id = isset($_GET['id']) ? $_GET['id']: die("ID Not found");
    $action = isset($_GET['action']) ? $_GET['action']: "GET";
    
    $recipe->getRecipe();

    if ($action == "GET") {
        $recipe_array = array(
            'author' => $recipe->author,
            'recipe_name' => $recipe->recipe_name,
            "recipe_ingredients" => $recipe->recipe_ingredients,
            'recipe_images' => json_decode($recipe->recipe_images),
            'recipe_category' => $recipe->recipe_category,
            'recipe_description' => $recipe->recipe_description,
            'recipe_instructions' => $recipe->recipe_instructions,  
            'likes' => $recipe->likes,
            'time_to_cook' => $recipe->time_to_cook,
        );
    
        print_r(json_encode($recipe_array));
        exit(0);
    }

    if ($action == "delete") {

    }
    // delete recipe by id


?>