<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin, Authorization, X-Requested-With');

    // Intialize app
    include_once('../../core/initialize.php');
    $user = new User($db_connection);

    $user->id = isset($_GET['id']) ? $_GET['id']: die("ID Not found");
   

    if ($user-> deleteUser()) {
        echo json_encode(array('message' => 'User deleted'));
    } else  {
        echo json_encode(array('message' => 'User not deleted'));
    };
?>