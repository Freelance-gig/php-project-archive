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

    $user->user_role = $data->userRole;
    $user->lastname = $data->lastname;
    $user->firstname = $data->firstname;
    $user->password = $data->password;
    $user->email = $data->email;
    // check if user exists and return user already exits
    if ($user->checkIfUserExists()) {
        echo json_encode(array('message' => "user already exists"));
    }
     // then check it password match
     if (htmlspecialchars(strip_tags($data->password)) != htmlspecialchars(strip_tags($data->con_password))) {
        echo json_encode(array('message' => 'Password Do not match'));
    }
    // hash password 
    $user->password = password_hash($user->password, PASSWORD_DEFAULT);
    if ($user->createUser()) {
        echo json_encode(array('message' => 'User created successfully'));
    } else  {
        echo json_encode(array('message' => 'User not created'));
    };
?>