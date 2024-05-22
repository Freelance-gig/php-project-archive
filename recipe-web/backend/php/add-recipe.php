<?php
    require("../../server.php");
    if (!isset($_SESSION['isAuthenticated'])) {
        header('Location: ../../login.php');
        exit();
    }
      
        $user_id = isset($_SESSION["id"]) ? $_SESSION["id"]: '';
        $file_name = $_FILES['recipe_image']['name'];
        $file_tmp_name = $_FILES['recipe_image']['tmp_name'];
        $file_size = $_FILES['recipe_image']['size'];
        $file_error = $_FILES['recipe_image']['error'];

        if (isset($_POST['recipe_name'])) {
            $recipe_name = $conn->real_escape_string($_POST['recipe_name']);
            $recipe_description = $conn->real_escape_string($_POST['recipe_description']);
            $recipe_ingredients = $conn->real_escape_string($_POST['recipe_ingredients']);
            $recipe_time = $conn->real_escape_string($_POST['recipe_time']);
            $recipe_list_id = $conn->real_escape_string($_POST['recipe_list_id']);

    
            if ($file_error === 0) {
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new_file_name = uniqid('', true) . '.' . $file_ext;
    
                $upload_path = '../../image-uploads/' . $new_file_name;
                if (move_uploaded_file($file_tmp_name, $upload_path)){
                    $result_create = $conn->query("INSERT INTO recipes (user_id, recipe_list_id, recipe_name, recipe_description, recipe_ingredients, recipe_time ,recipe_image)
                    VALUES ('$user_id','$recipe_list_id', '$recipe_name', '$recipe_description', '$recipe_ingredients', '$recipe_time' ,'$new_file_name')");
                    if ($result_create) {
                        $response = array('success' => true, 'message' => 'Image uploaded successfully');
                        echo json_encode($response);
                    
                    } else {
                        $response = array('success' => false, 'message' => 'Error saving image');
                        echo json_encode($response);
                    }
                }             
            }
            
        }
?>