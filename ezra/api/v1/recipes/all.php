<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/javascript');

    // Intialize app
    include_once('../../models/initialize.php');
    $recipes = new RecipeModel($db->conn);

    // Query all recipes 
    $result = $recipes->getRecipes();
    if ($result->columnCount() > 0) { 
        $recipe_arr = array();
        $recipe_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $array_item = array(
                'author' => $firstname, 
                'recipe_id' => $recipe_id,
                'recipe_name' => $recipe_name,
                'recipe_ingredients' => json_decode($recipe_ingredients),
                'recipe_images' => json_decode($recipe_images),
                'recipe_category' => $recipe_category,
                'recipe_description' => $recipe_description,
                'recipe_instructions' => json_decode($recipe_instructions),
                'time_to_cook' => $time_to_cook,                
            );
            array_push($recipe_arr['data'], $array_item);
        }

        // convert to json and output
        echo json_encode($recipe_arr);
    }   else {
        echo json_encode(array('message' => 'No recipes found'));
    }
    
?>