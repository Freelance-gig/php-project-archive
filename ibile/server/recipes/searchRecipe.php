
<?php
    require_once('../server-config.php');

    if(isset($_POST['input'])) {
        $input = $_POST['input'];
     
        $res = $connection->query(query: "SELECT * FROM recipes WHERE name LIKE '${input}%' OR location like '${input}%' OR `category` like '${input}%' ");

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