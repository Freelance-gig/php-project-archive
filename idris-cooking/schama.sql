CREATE TABLE IF NOT EXISTS `users` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `user_role` ENUM ('cook', 'admin') DEFAULT 'cook',
    `firstname` VARCHAR(200) NOT NULL,
    `lastname`  VARCHAR(200) NOT NULL,
    `email`     VARCHAR(200) NOT NULL,
    `password`  VARCHAR(200) NOT NULL
);

CREATE TABLE IF NOT EXISTS `collections` (
    `collection_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `recipe_id` INT,
    `user_id` INT,
    `collection_name` VARCHAR(200)
);

CREATE TABLE IF NOT EXISTS `recipes` (
    `recipe_id`         INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `collection_id`     INT,
    `user_id`           INT,
    `food_name`         VARCHAR(200) NOT NULL,
    `food_description`  VARCHAR(200) NOT NULL,
    `food_instructions` JSON NOT NULL,
    `food_ingredients`  JSON NOT NULL,
    `food_time`         INT,
    `food_location`     VARCHAR(200),
    `food_nutrients`    JSON
);

-- Add a foreign key relationship between users and collections
ALTER TABLE collections ADD CONSTRAINT fk_user_id_collections FOREIGN KEY (user_id) REFERENCES users(id);

-- Add a foreign key relationship between users and recipes
ALTER TABLE recipes ADD CONSTRAINT fk_user_id_recipes FOREIGN KEY (user_id) REFERENCES users(id);

-- Add a foreign key relationship between collections and recipes
ALTER TABLE recipes ADD CONSTRAINT fk_collection_id_recipes FOREIGN KEY (collection_id) REFERENCES collections(collection_id);

fix idris check for cook
    $user->id = isset($_GET['id']) ? $_GET['id']: die();

$config = parse_ini_file(__DIR__. "/config.ini");

