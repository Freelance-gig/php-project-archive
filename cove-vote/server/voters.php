<?php 
    require('./config.php');
       if (!isset($_SESSION['loggedIn'])) {
        header('Location: ../index.php');
        exit();
    }
    if (isset($_GET['get_voter'])) {
        $res = $connection->query(query: "SELECT `firstname`, `lastname` FROM users WHERE user_type = 'voter';");
        $result_array = [];
    
        if ( $res->num_rows > 0 ) {
            while($row=$res->fetch_assoc()) {
                array_push($result_array, $row);
            }
            header('Access-Control-Allow-Origin: *');
            header('Content-type: application/json');
            echo json_encode($result_array);
        } else {
            echo json_encode(array('mesage' =>  "<h1> No Record Found </h1>"));
        }
    }
    if (isset($_GET['get_officers'])) {
        $res = $connection->query(query: "SELECT `firstname`, `lastname` FROM users WHERE user_type = 'officer';");
        $result_array = [];
    
        if ( $res->num_rows > 0 ) {
            while($row=$res->fetch_assoc()) {
                array_push($result_array, $row);
            }
            header('Access-Control-Allow-Origin: *');
            header('Content-type: application/json');
            echo json_encode($result_array);
        } else {
            echo json_encode(array('mesage' =>  "<h1> No Record Found </h1>"));
        }
    }
    if (isset($_POST['input'])) {
        $input = $_POST['input'];
        $res = $connection->query(query: "SELECT `firstname`, `lastname` FROM users WHERE user_type = 'voter' AND  `firstname` like '${input}%' ;");

        $result_array = [];
        if ($res->num_rows > 0 ) {
            while($row=$res->fetch_assoc()) {
                array_push($result_array, $row);
            }
            header('Access-Control-Allow-Origin: *');
            header('Content-type: application/json');
            echo json_encode($result_array);
        } else {
            echo $return = "No record";
        }
    }
?>