CREATE TABLE IF NOT EXISTS `users` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(150)    NOT NULL,
    `lastname`  VARCHAR(150)    NOT NULL,
    `email`     VARCHAR(150)    NOT NULL,
    `user-type` ENUM ('foodie', 'cook', 'admin') DEFAULT 'foodie',
    `password`  VARCHAR(150)    NOT NULL
);

CREATE TABLE IF NOT EXISTS `recipes` (
    `recipe_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id` INT NOT NULL,
    `name`  VARCHAR(150)    NOT NULL,
    `description` TEXT,
    `location` ENUM ('east', 'west', 'south', 'north') NOT NULL,
    `category`    ENUM('soups', 'morsel', 'meats', 'grain') NOT NULL,
    `ingredients` TEXT,
    `instructions` TEXT,
    `image` TEXT
);
ALTER TABLE `recipes`  ADD CONSTRAINT `recipes_user__fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
INSERT INTO `users` (`firstname`, `lastname`, `email`, `user-type`, `password`) VALUES 
('testuser', 'testuser', 'test@gmail.com', 'foodie', 'password');
 

-- ALTER TABLE `recipes` CHANGE COLUMN `categories` `category`  ENUM('soups', 'morsel', 'meats', 'grain') NOT NULL;

INSERT INTO `recipes` (`id` , `name`, `description`, `location`, `category`, `ingredients`,  `instructions`, `image`)
VALUES (2, 'Jollof Rice', 'Made with love', 'west', 'morsel', '["Flour", "Sugar"]','["Mix Dry ingredients", "Add wet ingridients"]', 'https://picsum.photos/id/4/200/300');


INSERT INTO `recipes` (`id` , `name`, `description`, `location`, `category`, `ingredients`,  `instructions`, `image`)
VALUES (2, 'Amala', 'Made with love', 'east', 'meats', '["Flour", "Sugar"]','["Mix Dry ingredients", "Add wet ingridients"]', 'https://picsum.photos/id/4/200/300');


INSERT INTO `recipes` (`id` , `name`, `description`, `location`, `category`, `ingredients`,  `instructions`, `image`)
VALUES (2, 'Eba', 'Made with love', 'north', 'grain', '["Flour", "Sugar"]','["Mix Dry ingredients", "Add wet ingridients"]', 'https://picsum.photos/id/4/200/300');


INSERT INTO `recipes` (`id` , `name`, `description`, `location`, `category`, `ingredients`,  `instructions`, `image`)
VALUES (2, 'East food', 'Made with love', 'south', 'morsel', '["Flour", "Sugar"]','["Mix Dry ingredients", "Add wet ingridients"]', 'https://picsum.photos/id/4/200/300');

