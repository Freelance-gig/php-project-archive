<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin, Authorization, X-Requested-With');

    // Intialize app
    include_once('../../core/initialize.php');
    $user = new User($db_connection);

    $data = json_decode(file_get_contents("php://input"));

    $user->id = $data->id;
    $user->userRole = $data->userRole;
    $user->lastname = $data->lastname;
    $user->firstname = $data->firstname;
    $user->password = $data->password;
    $user->email = $data->email;

    if ($user->updateUser()) {
        echo json_encode(array('message' => 'User updated'));
    } else  {
        echo json_encode(array('message' => 'User not updated'));
    };
?>