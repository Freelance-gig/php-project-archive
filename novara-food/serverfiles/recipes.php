<?php
    include_once('./controllers/recipe.php');

    if(isset($_POST['save-recipe'])) {
        $user_data = $_SESSION['auth_user'];
        $data = [
            'user_id' => $user_data['user_id'],
            'food_name' => validateInput($db->conn, $_POST['food_name']),
            'food_description' => validateInput($db->conn, $_POST['food_description']),
            'group' => validateInput($db->conn, $_POST['group']),
            'preparations' => validateInput($db->conn, $_POST['preparations']),
            'preparation_time' => validateInput($db->conn, $_POST['preparation_time']),
            'ingredients' => validateInput($db->conn, $_POST['ingredients'])
        ];

        $recipe = new RecipeController;
        $result = $recipe->createRecipe($data, $user_data['user_role']);
        echo($result);
        // if ($result) {
        //     redirect("Succesfully added recipe", "add-recipe.php");

        // } else {
        //     redirect("Something went wrong", "add-recipe.php");

        // }
    }
?>