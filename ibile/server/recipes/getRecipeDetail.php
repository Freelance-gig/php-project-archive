<?php
    require_once('../server-config.php');
    
    $recipe_id = isset($_GET['recipe_id']) ? $_GET['recipe_id'] : "null";
    $res = $connection->query(query: "SELECT recipe_id, name, description, image, location, category, ingredients, instructions from recipes WHERE recipe_id='$recipe_id'");

    if ($res->num_rows > 0 ) {
        $row=$res->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('mesage' => $recipe_id));
    }
?>