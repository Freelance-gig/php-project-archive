CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(200) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(200) NOT NULL,
    user_type ENUM ('admin', 'cook') DEFAULT 'cook';
    password VARCHAR(200) NOT NULL
);

CREATE TABLE recipelist (
    recipe_list_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT,
    list_name VARCHAR(200),
    CONSTRAINT fk_user_id_recipelist FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE recipes (
    recipe_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    recipe_list_id INT,
    user_id INT,
    recipe_name VARCHAR(200),
    recipe_description TEXT,
    recipe_instructions TEXT,
    recipe_ingredients TEXT,
    recipe_time INT,
    recipe_image VARCHAR(400),
    CONSTRAINT fk_user_id_recipes FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_recipe_list_id_recipes FOREIGN KEY (user_id) REFERENCES recipelist(recipe_list_id) ON DELETE CASCADE
);