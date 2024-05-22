<?php
    require_once('../server-config.php');
    if (!isset($_SESSION['loggedIn'])) {
        header('Location: auth.php');
        exit();
    };
    
    $id = isset($_SESSION["id"]) ? $_SESSION["id"] : '';
    $file_name = $_FILES['image']['name'];
    $file_tmp_name = $_FILES['image']['tmp_name'];
    $file_error = $_FILES['image']['error'];

    if (isset($_POST['name'])) {
        $name = $connection->real_escape_string($_POST['name']);
        $description = $connection->real_escape_string($_POST['description']);
        $location = $connection->real_escape_string($_POST['location']);
        $category = $connection->real_escape_string($_POST['category']);
        $ingredients = $connection->real_escape_string($_POST['ingredients']);
        $instructions = $connection->real_escape_string($_POST['instructions']);
        $image = $connection->real_escape_string($_POST['image']);
        $id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";

        if ($file_error === 0) {
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $new_file_name = uniqid('', true) . '.' . $file_ext;

            $upload_path = '../image-upload/'. $new_file_name;

            if (move_uploaded_file($file_tmp_name, $upload_path)) {
                $res = $connection->query(query: "INSERT INTO recipes (
                     id, name, description, location, category, ingredients, instructions, image
                ) VALUES ('2', '$name', '$description', '$location', '$category', '$ingredients', '$instructions', '$new_file_name')");
                if ($res) {
                    // $response = array('success' => true, 'message' => 'Successcully created recipe');
                    // echo json_encode($response);
                    exit('success');
                } else {
                    $response = array('success' => false, 'message' => 'Error saving time');
                    echo json_encode($response);
                }
            }
        }
    }
?>