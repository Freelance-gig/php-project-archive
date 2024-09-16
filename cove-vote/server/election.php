<?php 
    require('./config.php');
    // if (isset($_SESSION['loggedIn'])) {
    //     header('Location: ../index.php');
    //     exit();
    // }

    if (isset($_POST['add_election'])) {
        $name = $connection->real_escape_string($_POST['name']);
        $description = $connection->real_escape_string($_POST['description']);
        $candidates = $connection->real_escape_string($_POST['candidates']);
        $location = $connection->real_escape_string($_POST['location']);
        $polling_unit = $connection->real_escape_string($_POST['polling_unit']);
        $user_id = $_SESSION['id'];
        $res = $connection->query(query: "SELECT 'name' FROM election where `name`='$name'");
        if ($res->num_rows == 1) {
            exit('Election Already Exists');
        }
        $createElection = $connection->query(query: "INSERT INTO election (`user_id`, `name`, `description`, `candidates`, `location`, `polling_unit`) VALUES
        ('$user_id','$name', '$description', '$candidates', '$location', '$polling_unit');");
        
        if ($createElection) {
            exit("success");
        } else {
            exit(" There was an error creating election");
        }
        
    } 
    if (isset($_GET['get_election'])) {
        $res = $connection->query(query: "SELECT `name`, `polling_unit`, `election_id`, `votes` FROM election;");
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

        $res = $connection->query(query: "SELECT * FROM election WHERE name LIKE '${input}%' ");

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
    if (isset($_POST['formQuery'])) {
        $location = $_POST['location'];
        $polling_unit = $_POST['polling_unit'];

        $res = $connection->query(query: "SELECT * FROM election WHERE location LIKE '${location}%'  OR `polling_unit` like '${polling_unit}%' ");

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