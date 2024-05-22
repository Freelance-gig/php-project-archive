<?php
    require_once('../server-config.php');
    

    $id = isset($_SESSION['id']) && $_SESSION['id'];
    
    $res = $connection->query(query: "SELECT recipe_id, name, description, image, location, category, ingredients, instructions from recipes INNER JOIN users u on recipes.id = u.id WHERE u.id='$id' ");
    $result_array = [];  
    if ($res->num_rows > 0 ) {
        while($row=$res->fetch_assoc()) {
            array_push($result_array, $row);
        }
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        echo json_encode($result_array);
    } else {
        echo json_encode(array('mesage' => "No Record Found"));
    }
?>