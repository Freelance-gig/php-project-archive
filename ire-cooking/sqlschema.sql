CREATE TABLE `RECIPE_SEEKERS` (
  `seeker_id` INT NOT NULL,
  `admin_id` INT,
  `firstname` VARCHAR (150),
  `lastname` VARCHAR (150),
  `username` VARCHAR (150),
  `profile_image` VARCHAR (150),
  `password` VARCHAR (150),
  PRIMARY KEY (`seeker_id`)
);

CREATE TABLE `REVIEWS` (
  `review_id` INT NOT NULL,
  `seeker_id` INT,
  `chef_id` INT,
  `cook_id` INT,
  `recipe_id` INT,
  `review` VARCHAR (200),
  PRIMARY KEY (`review_id`)
);

CREATE TABLE `ADMINS` (
  `admin_id` INT NOT NULL,
  `firstname` VARCHAR (150),
  `lastname` VARCHAR (150),
  `username` VARCHAR (150),
  `profile_image` VARCHAR  (150),
  `password` VARCHAR (150),
  PRIMARY KEY (`admin_id`)
);

CREATE TABLE `COOKS` (
  `cook_id` INT NOT NULL,
  `admin_id` INT,
  `firstname` VARCHAR (150),
  `lastname` VARCHAR (150),
  `username` VARCHAR (150),
  `profile_image` VARCHAR (150),
  `password` VARCHAR (150),
  PRIMARY KEY (`cook_id`)
);

CREATE TABLE `RECIPES` (
  `recipe_id` INT NOT NULL ,
  `admin_id` INT,
  `cook_id` INT,
  `recipe_name` VARCHAR (150),
  `recipe_images` JSON,
  `recipe_ingredients` JSON NOT NULL,
  `likes` INT,
  `time_to_cook` INT,
  `recipe_description` VARCHAR (550),
  PRIMARY KEY (`recipe_id`)
);

