<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Intialize app
    include_once('../../core/initialize.php');
    $recipes = new Recipe($db_connection);

    $result = $recipes->readAllRecipes();
    if ( $row = $result->fetch()) {
        $recipe_arr = array();
        $recipe_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $recipe_item = array(
                'food_name' => $food_name,
                'food_description' => $food_description,
                'food_instructions' => $food_instructions,
                'food_ingredients' => $food_ingredients,
                'food_time' => $food_time,
                'food_location' => $food_location,
                'food_nutrients' => $food_nutrients,
                'food_image' => $food_image
            );
            array_push($recipe_arr['data'], $recipe_item);
        }

        // convert to json and output
        echo json_encode($recipe_arr);
    }   else {
        echo json_encode(array('message' => 'No recipes found'));
    }
    
?>