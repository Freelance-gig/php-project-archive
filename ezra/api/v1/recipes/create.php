<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin, Authorization, X-Requested-With');

    // Intialize app
    include_once('../../models/initialize.php');
    $recipe = new RecipeModel($db->conn);
    $data = json_decode(file_get_contents("php://input"));
    $recipe->recipe_name =   acceptInput($data->recipe_name);

    
    $recipe->user_id = acceptInput($data->user_id);
    $recipe->recipe_ingredients =   json_encode($data->recipe_ingredients);
    $recipe->recipe_images =  json_encode($data->recipe_images);
    // $recipe->recipe_images =  json_encode($arrayToInsert);
    $recipe->recipe_category =   acceptInput($data->recipe_category);
    $recipe->recipe_description =   acceptInput($data->recipe_description);
    $recipe->recipe_instructions =  json_encode($data->recipe_instructions);
    // $recipe->recipe_instructions =  json_encode($arrayToInsert);

    $recipe->likes =      acceptInput($data->likes);
    $recipe->time_to_cook =  acceptInput($data->time_to_cook);

    if ($recipe->createRecipe()) {
        echo json_encode(array('message' => 'Recipe created Successfully'));
    } else  {
        echo json_encode(array('message' => 'Recipe Not created'));
    };
?>