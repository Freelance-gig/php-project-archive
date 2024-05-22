CREATE TABLE IF NOT EXISTS `admins` (
    `admin_id`  INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `fullname`  VARCHAR(200)    NOT NULL,
    `email`     VARCHAR(150)    NOT NULL,
    `password`  VARCHAR(150)    NOT NULL
);

CREATE TABLE IF NOT EXISTS `recipeowners` (
    `recipeowner_id`    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `admin_id` INT DEFAULT 1,
    `fullname` VARCHAR(200),
    `email`     VARCHAR(150)    NOT NULL,
    `password`  VARCHAR(150)    NOT NULL,
    CONSTRAINT `fk_admin_id_recipeowners` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `recipes` (
    `recipe_id`         INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `admin_id`          INT,
    `recipeowner_id`    INT,
    `food_name`         VARCHAR(150),
    `food_description`  VARCHAR(150),
    `group`             ENUM('main', 'side', 'salad', 'soup') DEFAULT 'main',
    `preparations`      JSON NOT NULL,
    `preparation_time`  INT,
    `ingredients`       JSON NOT NULL,
    CONSTRAINT `fk_admin_id_recipe` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`) ON DELETE CASCADE,
    CONSTRAINT `fk_recipeowner_id_recipe` FOREIGN KEY (`recipeowner_id`) REFERENCES `recipeowners` (`recipeowner_id`) ON DELETE CASCADE
);


-- SUPER USER ADMIN -- Admin 1
INSERT INTO `admins` (`fullname`, `email`, `password`) VALUES ('akansekede', 'akan@gmail.com', 'password');