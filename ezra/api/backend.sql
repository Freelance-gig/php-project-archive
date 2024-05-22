CREATE TABLE users (
    user_id         INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_role       ENUM ('chef', 'recipe_seeker', 'admin') DEFAULT 'recipe_seeker',
    firstname       VARCHAR(150) NOT NULL,
    lastname        VARCHAR(150) NOT NULL,
    email           VARCHAR(150) NOT NULL,
    password        VARCHAR(200) NOT NULL,
    profile_image   VARCHAR(200)
);

CREATE TABLE reviews (
    review_id   INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id     INT NULL,
    recipe_id   INT NULL,
    review_text VARCHAR(300),
    CONSTRAINT fk_user_id_reviews FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
    CONSTRAINT fk_recipe_id_reviews FOREIGN KEY (recipe_id) REFERENCES recipes (recipe_id) ON DELETE CASCADE
);



CREATE TABLE recipes (
    recipe_id           INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id             INT NULL,
    recipe_name         VARCHAR(150) NOT NULL,
    recipe_ingredients  JSON,
    recipe_images       JSON,
    recipe_category     VARCHAR (150),
    recipe_description   TEXT,
    recipe_instructions JSON, 
    likes               INT,
    time_to_cook        INT,
    CONSTRAINT fk_user_id_recipes FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE
);

INSERT INTO `recipes` (user_id, recipe_name,
                    recipe_ingredients ,recipe_images,
                    recipe_category,recipe_description,
                    recipe_instructions, likes, time_to_cook)
 VALUES (1, 'Russian Salad',  '["Mix Dry ingredients", "Add wet ingridients"]', '["https://picsum.photos/id/63/200/300"]','dairy', 'made with ground melon seeds', '["Flour", "Sugar"]', 5, 40 );
