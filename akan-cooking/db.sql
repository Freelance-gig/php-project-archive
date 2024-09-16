CREATE TABLE `RECIPES` (
  `recipe_id` INT NOT NULL ,
  `admin_id` INT,
  `recipeowner_id` INT,
  `food_name` VARCHAR (150),
  `picture` JSON,
  `preparations` JSON NOT NULL,
  `preparation_time` INT,
  `ingredients` VARCHAR (550),
  PRIMARY KEY (`recipe_id`)
);

CREATE TABLE `ADMINS` (
  `admin_id` INT NOT NULL,
  `fullname` VARCHAR (150),
  `email` VARCHAR (150),
  `password` VARCHAR (150),
  PRIMARY KEY (`admin_id`)
);

CREATE TABLE `RECIPEOWNERS` (
  `recipeowner_id` INT NOT NULL,
  `admin_id` INT,
  `firstname` VARCHAR (150),
  `email` VARCHAR (150),
  `password` VARCHAR (150),
  PRIMARY KEY (`recipeowner_id`)
);

