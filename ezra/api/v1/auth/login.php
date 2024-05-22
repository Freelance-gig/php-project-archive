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

    $user->email =   acceptInput($data->email);
    $user->password =   acceptInput($data->password);

    if ($user->checkLoginCredentials()){
        $user->getUser();
        $user_arr = array(
            'user_id'        =>  $user->user_id,
            'user_role' =>  $user->user_role,
            'firstname' =>  $user->firstname,
            'lastname'  =>  $user->lastname,
            'email'     =>  $user->email
        );
        echo(json_encode($user_arr));
    } else {
        echo json_encode(array('message' => "wrong login credentials"));
    }

?>