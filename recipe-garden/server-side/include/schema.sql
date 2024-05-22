CREATE USER 'idris'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'idris'@'localhost';

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
    `user_id` INT,
    `collection_name` VARCHAR(200),
    `collection_image` VARCHAR(200)
);

CREATE TABLE IF NOT EXISTS `recipes` (
    `recipe_id`         INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `collection_id`     INT,
    `user_id`           INT,
    `food_name`         VARCHAR(200) NOT NULL,
    `food_description`  VARCHAR(200) NOT NULL,
    `food_instructions` TEXT,                                                                                                                                                                                                                   
    `food_ingredients`  TEXT,
    `food_time`         INT,
    `food_location`     VARCHAR(200),
    `food_nutrients`    TEXT,
    `food_image`        VARCHAR(200)  
);


-- Add a foreign key relationship between users and collections
ALTER TABLE collections ADD CONSTRAINT fk_user_id_collections FOREIGN KEY (user_id) REFERENCES users(id);

-- Add a foreign key relationship between users and recipes
ALTER TABLE recipes ADD CONSTRAINT fk_user_id_recipes FOREIGN KEY (user_id) REFERENCES users(id);

-- Add a foreign key relationship between collections and recipes
ALTER TABLE recipes ADD CONSTRAINT fk_collection_id_recipes FOREIGN KEY (collection_id) REFERENCES collections(collection_id);

-- Add Test Data to users table
INSERT INTO users (firstname, lastname, user_role, email, password)  VALUES 
('John', 'Doe', 'cook', 'john.doe@example.com', 'password123');
INSERT INTO users (firstname, lastname, user_role, email, password)  VALUES 
('John', 'Admin', 'admin', 'john.admin@example.com', 'password123');