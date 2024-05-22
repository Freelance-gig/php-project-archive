<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Intialize app
    include_once('../../core/initialize.php');
    $recipes = new Recipe($db_connection);

    $result = $recipes->readAllRecipes();
    if ( $row = $result->fetch()) {
        $recipes_arr = array();
        $recipes_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $recipe_item = array(
                'food_name' => $food_name,
                'food_description' => $food_description,
                'food_image' => $food_image
            );
            array_push($recipes_arr['data'], $recipe_item);
        }

        // convert to json and output
        echo json_encode($recipes_arr);
    }   else {
        echo json_encode(array('message' => 'No users found'));
    }
    
?>