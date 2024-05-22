<?php 
   // headers 
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
    
    // Intialize app
    include_once('../../models/initialize.php');
    $recipe = new RecipeModel($db->conn);
    $recipe->user_id = isset($_GET['user_id']) ? $_GET['user_id']: die("ID Not found");
    
    $result = $recipe->getRecipeByUser();

    if ($result->columnCount() > 0) { 
        $recipe_arr = array();
        $recipe_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $array_item = array(
                'author' => $firstname, 
                'recipe_id' => $recipe_id,
                'recipe_name' => $recipe_name,
                'recipe_ingredients' => $recipe_ingredients,
                'recipe_images' => json_decode($recipe_images),
                'recipe_category' => $recipe_category,
                'recipe_description' => $recipe_description,
                'profile_image' => $profile_image,
                'recipe_instruction' => $recipe_instruction,
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