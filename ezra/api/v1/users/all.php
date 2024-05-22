<?php
    // headers 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Intialize app
    require_once('../../models/initialize.php');
    $users = new UserModel($db->conn);

    // Query all users 
    $result = $users->getUsers();
    if ($result->columnCount() > 0) { 
        $user_arr = array();
        $user_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $user_item = array(
                'user_id' => $user_id,
                'user_role' => $user_role,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'profile_image' => $profile_image
            );
            array_push($user_arr['data'], $user_item);
        }
        // convert to json and output
        echo json_encode($user_arr);
    }   else {
        echo json_encode(array('message' => 'No users found'));
    }
    
?>