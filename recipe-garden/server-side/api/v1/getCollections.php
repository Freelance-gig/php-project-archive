<?php
   // headers 
   header('Access-Control-Allow-Origin: *');
   header('Content-Type: application/json');
    
   include_once('../../core/initialize.php');
   $collections = new Collection($db_connection);

   $result = $collections->readAllCollections();
   if ($row = $result->fetch()) {
    $collection_arr = array();
    $collection_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $collection_item = array(
            'collection_id' => $collection_id,
            'collection_name' => $collection_name,
            'collection_image' => $collection_image,
            
        );
        
        array_push($collection_arr['data'], $collection_item);
    }
     echo json_encode($collection_arr);
    } else {
        echo json_encode(array('message' => 'No Collection found'));
    }
?>