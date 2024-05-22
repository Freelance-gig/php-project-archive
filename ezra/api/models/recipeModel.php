<?php
    class RecipeModel {
        private $conn;
        private $tables = 'recipes';

        public $recipe_id;
        public $user_id;
        public $author;
        public $recipe_name;
        public $recipe_ingredients;  
        public $recipe_images;
        public $recipe_category;
        public $recipe_description;
        public $recipe_instructions;  
        public $likes;
        public $time_to_cook;        

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getRecipes() {
        // create query 
        $query  = 'SELECT recipe_id, recipe_name,
                    recipe_ingredients ,recipe_images,
                    recipe_category,recipe_description,
                    recipe_instructions, likes, time_to_cook, u.firstname
                    FROM '. $this->tables . 
                    ' INNER JOIN users u ON recipes.user_id = u.user_id';

        // prepare statement 
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt -> execute();
        return $stmt;
        }

        public function getRecipe() {
            $query  = 'SELECT recipe_id, recipe_name,
            recipe_ingredients ,recipe_images,
            recipe_category,recipe_description,
            recipe_instructions, likes, time_to_cook, u.firstname
            FROM '. $this->tables . 
            ' INNER JOIN users u ON recipes.user_id = u.user_id
            WHERE recipe_id=:recipe_id LIMIT 1';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam("recipe_id", $this->recipe_id);

            $stmt -> execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->author = $row["firstname"];
            $this->recipe_name = $row["recipe_name"];
            $this->recipe_ingredients = $row["recipe_ingredients"];
            $this->recipe_images = $row['recipe_images'];
            $this->recipe_category = $row['recipe_category'];
            $this->recipe_description = $row['recipe_description'];
            $this->recipe_instructions = $row['recipe_instructions'];  
            $this->likes = $row['likes'];
            $this->time_to_cook = $row['time_to_cook'];
        }

        public function getRecipeByUser() {
            $query  = 'SELECT recipe_id, recipe_name,
            recipe_ingredients ,recipe_images,
            recipe_category,recipe_description,
            recipe_instructions, likes, time_to_cook, u.firstname
            FROM '. $this->tables . 
            ' INNER JOIN users u ON recipes.user_id = u.user_id
            WHERE u.user_id=:user_id';

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam("user_id", $this->user_id);
            // execute query
            $stmt -> execute();
            return $stmt;
        }

        public function createRecipe() {
          $query = 'INSERT INTO recipes (
            user_id,
            recipe_name,
            recipe_ingredients,
            recipe_images,
            recipe_category,
            recipe_description,
            recipe_instructions,  
            likes,
            time_to_cook
          )
            VALUES (
                :user_id,
                :recipe_name,
                :recipe_ingredients,  
                :recipe_images,
                :recipe_category,
                :recipe_description,
                :recipe_instructions,  
                :likes,
                :time_to_cook
            )';

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':recipe_name', $this->recipe_name);
            $stmt->bindParam(':recipe_ingredients', $this->recipe_ingredients);
            $stmt->bindParam(':recipe_images', $this->recipe_images);
            $stmt->bindParam(':recipe_category', $this->recipe_category);
            $stmt->bindParam(':recipe_description', $this->recipe_description);
            $stmt->bindParam(':recipe_instructions', $this->recipe_instructions);
            $stmt->bindParam(':likes', $this->likes);
            $stmt->bindParam(':time_to_cook', $this->time_to_cook);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }
    }
?>