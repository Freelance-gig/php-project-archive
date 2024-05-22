<?php 
    include_once('../../core/initialize.php');
    if (!isset($_SESSION['id'])) {
      header('Location: ./signin.php');
      exit();
    }
    $collection = new Collection($db_connection);
    $id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
    $file_name = $_FILES['collection_image']['name'];
    $file_tmp_name = $_FILES['collection_image']['tmp_name'];
    $file_error = $_FILES['collection_image']['error'];

    if (isset($_POST['collection_name'])) {
        $collection_name = htmlspecialchars(strip_tags($_POST['collection_name']));
        $user_id = $id;


        // echo json_encode(array('message' => 'No users found'));

        if ($file_error === 0) {
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $new_file_name = uniqid('', true) . '.' . $file_ext;
            $upload_path = '../../image/'. $new_file_name;
            
            if (move_uploaded_file($file_tmp_name, $upload_path)) {

                $collection->user_id = $user_id;
                $collection->collection_name = $collection_name;
                $collection->collection_image = $new_file_name;
                
                if($collection->createCollection()) {
                    echo json_encode(array('message' => 'collection created'));
                } else {
                    echo json_encode(array('message' => 'Collection not created'));
                }
            }  else {
            echo json_encode(array('message' => 'Error uploading image'));

            }

        }
    }
?>