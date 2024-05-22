<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,  Access-Control-Allow-Methods, Content-Type, Access-Control-Allow-Origin, Authorization, X-Requested-With');

    // Intialize app
    include_once('../../models/initialize.php');
    $user = new UserModel($db->conn);
    $data = json_decode(file_get_contents("php://input"));
    // Get Data 

    $user->userRole =   acceptInput($data->userRole);
    $user->lastname =   acceptInput($data->lastname);
    $user->firstname =  acceptInput($data->firstname);
    $user->password =   acceptInput($data->password);
    $user->email =      acceptInput($data->email);

   // check if fields are missin 
    if (!$user->userRole || !$user->password || !$user->firstname || !$user->email || !$user->lastname ) {
        echo json_encode(array('message' => 'Missing Required credentials'));
        exit(0);
    }
    // check if user exists and return user already exits
    if ($user->checkIfUserExists()) {
        echo json_encode(array('message' => "user already exists"));
        exit(0);
    }

    // then check it password match
    if (acceptInput($data->password) != acceptInput($data->confirmPassword)) {
        echo json_encode(array('message' => 'Password Do not match'));
        exit(0);
    }
    // hash password 
    $user->password = password_hash($user->password, PASSWORD_DEFAULT);

    // register user
    
    if ($user->createUser()) {
        echo json_encode(array('message' => 'User created'));
    } else  {
        echo json_encode(array('message' => 'User not created'));
    };
    
?>