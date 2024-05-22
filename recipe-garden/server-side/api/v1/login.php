<?php

    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin, Authorization, X-Requested-With');

    // Intialize app
    include_once('../../core/initialize.php');
    $user = new User($db_connection);

    $data = json_decode(file_get_contents("php://input"));

    $user->email = $data->email;
    $user->password = $data->password;

    if ($user->validateUser() ) {
        $user->readSingleUser();

        $user_arr = array (
            'id' => $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'user_role' => $user->user_role,

        );
        $_SESSION['id'] = $user->id;
        $_SESSION['email'] = $user->email;
        $_SESSION['user_role'] = $user->user_role;
        
        echo(json_encode($user_arr));
    } else {
        echo json_encode(array('message' => 'wrong login credentials'));
    }
?>