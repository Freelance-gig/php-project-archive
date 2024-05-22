<?php 
   require("../../server.php");
   if (!isset($_SESSION['isAuthenticated'])) {
       header('Location: ../../login.php');
       exit();
   }

   $result = $conn->query("SELECT * from recipelist l LEFT JOIN recipes r on l.recipe_list_id = r.recipe_list_id;");
   $result_array = [];

   if ($result->num_rows > 0) {
        while ($row=$result->fetch_assoc()) {
            array_push($result_array, $row);

        }
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        echo json_encode($result_array);
   }    else {
        echo json_encode(array('message' => "<h1> No record found </h1>"));

   }
?>