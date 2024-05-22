<?php 
  include('serverfiles/app.php');

  class RecipeController {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function createRecipe($inputData, $user_role) {
        $data = "'". implode ("','", $inputData) . "'";

        echo($data);
        if ($user_role == 'admin') {
        $query = "INSERT INTO recipes ( admin_id, food_name, food_description, group , preparations, preparation_time, ingredients ) VALUES ($data)";
      } else {
        $query = "INSERT INTO recipes (
          recipeowner_id, food_name,
          food_description, group,
          preparations, preparation_time,
          ingredients
          ) VALUES ($data)";
      
      }
      $result = $this->conn->query($query);
      $result;
      if($result) {
        return true;
      } else  {
        return false;
      }
  }

  }
?>