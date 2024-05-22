<?php 

    class Recipe {
        private $conn;
        private $table = 'recipes';

        public $recipe_id;
        public $collection_id;
        public $collection_name;
        public $email;
        public $user_id;
        public $food_name;
        public $food_description;
        public $food_instructions;
        public $food_ingredients;
        public $food_time;
        public $food_image;
        public $food_location;
        public $food_nutritents;

        public function __construct($db) {
            $this -> conn = $db;
            $this->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        }

        public function createRecipe () {
            $query = 'INSERT INTO collections (user_id,
                collection_id, food_name, food_description,
                food_instructions, food_ingredients, food_time,
                food_location, food_nutrients
                ) VALUES (:user_id, 
                :collection_name, :food_name, :food_description,
                :food_instructions, :food_ingredients, :food_time,
                :food_location, :food_nutrients
                )';

                $stmt = $this->conn->prepare($query);

                $this->collection_id = htmlspecialchars(strip_tags($this->collection_id));
                $this->food_name = htmlspecialchars(strip_tags($this->food_name));
                $this->food_description = htmlspecialchars(strip_tags($this->food_description));
                $this->food_instructions = htmlspecialchars(strip_tags($this->food_instructions));
                $this->food_ingredients = htmlspecialchars(strip_tags($this->food_ingredients));
                $this->food_time = htmlspecialchars(strip_tags($this->food_time));
                $this->food_location = htmlspecialchars(strip_tags($this->food_location));
                // $this->food_nutrients = htmlspecialchars(strip_tags($this->food_nutrients));
                $this->food_image = htmlspecialchars(strip_tags($this->food_image));

                $stmt->bindParam(':collection_id', $this->collection_id);
                $stmt->bindParam(':food_name', $this->food_name);
                $stmt->bindParam(':food_description', $this->food_description);
                $stmt->bindParam(':food_instructions', $this->food_instructions);
                $stmt->bindParam(':food_ingredients', $this->food_ingredients);
                $stmt->bindParam(':food_time', $this->food_time);
                $stmt->bindParam(':food_location', $this->food_location);
                // $stmt->bindParam(':food_nutrients', $this->food_nutrients);


                    // execute query
                if ($stmt->execute()) {
                    return true;
                }

                printf("Error %s. \n", $stmt->error);
                return false;
        

        }

        public function readAllRecipes () {
            $query = 'SELECT recipe_id, c.collection_name, u.email, food_name,
                food_description, food_instructions, food_ingredients, food_time,
                food_location, food_nutrients FROM recipes INNER JOIN collection c on recipes.collection_id = c.collection_id 
                INNER JOIN users u on recipes.user_id =  u.id
            ';

            $stmt = $this->conn->prepare($query);

            // execute query
            $stmt -> execute();
            return $stmt;
        }

        public function readSingleRecipe () {
            $query = 'SELECT recipe_id, c.collection_name, u.email, food_name,
                food_description, food_instructions, food_ingredients, food_time,
                food_location, food_nutrients FROM recipes INNER JOIN collection c on recipes.collection_id = c.collection_id 
                INNER JOIN users u on recipes.user_id =  u.id
                WHERE recipe_id = :recipe_id LIMIT 1
            ';


            // prepare statement 
            $stmt = $this->conn->prepare($query);
            // binding param
            $stmt->bindParam(':recipe_id', $this->recipe_id);
            $stmt -> execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->collection_name = $row['collection_name'];
            $this->email = $row['email'];
            $this->food_name = $row['food_name'];
            $this->food_description = $row['food_description'];
            $this->food_ingredients = $row['food_ingredients'];
            $this->food_instructions = $row['food_instructions'];
            $this->food_time = $row['food_time'];
            $this->food_location = $row['food_location'];
            $this->food_image = $row['food_image'];

            // $this->food_nutrients = $row['food_nutrients'];
            $this->recipe_id = $row['recipe_id'];
        }

        public function updateRecipe () {
            $query = 'UPDATE recipes SET 
                food_name = :food_name,
                food_description = :food_description,
                food_ingredients = :food_ingredients,
                food_time = :food_time,
                food_instructions = :food_instructions,
                food_location = :food_location,
                food_nutrients = :food_nutrients,
                WHERE recipe_id = :recipe_id';

            $stmt = $this->conn->prepare($query);

            $this->food_name = htmlspecialchars(strip_tags($this->food_name));
            $stmt->bindParam(':food_name', $this->food_name);

            $this->food_description = htmlspecialchars(strip_tags($this->food_description));
            $stmt->bindParam(':food_description', $this->food_description);

            $this->food_ingredients = htmlspecialchars(strip_tags($this->food_ingredients));
            $stmt->bindParam(':food_ingredients', $this->food_ingredients);
            
            $this->food_time = htmlspecialchars(strip_tags($this->food_time));
            $stmt->bindParam(':food_time', $this->food_time);

            $this->food_instructions = htmlspecialchars(strip_tags($this->food_instructions));
            $stmt->bindParam(':food_instructions', $this->food_instructions);

            $this->food_location = htmlspecialchars(strip_tags($this->food_location));
            $stmt->bindParam(':food_location', $this->food_location);

            // $this->food_nutrients = htmlspecialchars(strip_tags($this->food_nutrients));
            // $stmt->bindParam(':food_nutrients', $this->food_nutrients);

            $this->recipe_id = htmlspecialchars(strip_tags($this->recipe_id));
            $stmt->bindParam(':recipe_id', $this->recipe_id);

            // execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }

        public function deleteRecipe () {
            $query = 'DELETE FROM recipes WHERE recipe_id = :recipe_id';
            $stmt = $this->conn->prepare($query);

            $this->recipe_id = htmlspecialchars(strip_tags($this->recipe_id));
            $stmt->bindParam(':recipe_id', $this->recipe_id);

            // execute query
            if ($stmt->execute()) {
                return true;
            }

            printf("Error %s. \n", $stmt->error);
            return false;
        }
    }
?>