<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Intialize app
    include_once('../../core/initialize.php');
    $users = new User($db_connection);

    // Query all users 
    $result = $users->readAllUsers();
    if ( $row = $result->fetch()) {
        $user_arr = array();
        $user_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $user_item = array(
                'id' => $id,
                'user_role' => $user_role,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email
            );
            array_push($user_arr['data'], $user_item);
        }

        // convert to json and output
        echo json_encode($user_arr);
    }   else {
        echo json_encode(array('message' => 'No users found'));
    }
    
?>