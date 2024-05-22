<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Intialize app
    include_once('../../core/initialize.php');
    $user = new User($db_connection);

    // Query Singe users 

    $user->email = isset($_GET['email']) ? $_GET['email']: die("Email Not found");    
    $user->readSingleUser();

    $user_arr = array(
        'id'        =>  $user->id,
        'user_role' =>  $user->user_role,
        'firstname' =>  $user->firstname,
        'lastname'  =>  $user->lastname,
        'email'     =>  $user->email
    );
    
    print_r(json_encode($user_arr));
?>