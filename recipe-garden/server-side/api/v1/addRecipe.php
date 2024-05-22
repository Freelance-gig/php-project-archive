<?php 
    include_once('../../core/initialize.php');
    if (!isset($_SESSION['id'])) {
      header('Location: signin.php');
      exit();
    }

    $recipe = new Recipe($db_connection);
    $id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
    $file_name = $_FILES['food_image']['name'];
    $file_tmp_name = $_FILES['food_image']['tmp_name'];
    $file_error = $_FILES['food_image']['error'];
    
    if (isset($_POST['food_name'])) {
        $food_name = htmlspecialchars(strip_tags($_POST['food_name']));
        $food_description = htmlspecialchars(strip_tags($_POST['food_description']));
        $food_ingredients = htmlspecialchars(strip_tags($_POST['food_ingredients']));
        $food_instructions = htmlspecialchars(strip_tags($_POST['food_instructions']));
        $food_location = htmlspecialchars(strip_tags($_POST['food_location']));;


        $user_id = $id;

        if ($file_error === 0) {
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $upload_path = '../../upload/'. $new_file_name;
                if (move_uploaded_file($file_tmp_name, $upload_path)) {
                        $recipe->user_id = $user_id;
                        $recipe->food_name = $food_name;
                        $recipe->food_description = $food_description;
                        $recipe->food_ingredients = $food_ingredients;
                        $recipe->food_instructions = $food_instructions;
                        $recipe->food_location = $food_location;
  
                        if($recipe->createRecipe()) {
                                echo json_encode(array('message' => 'collection created'));
                            } else {
                                echo json_encode(array('message' => 'Collection not created'));
                            }

                        }
        }    
}
?>
