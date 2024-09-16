mysql -u root -p
CREATE USER 'wale'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'wale'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
mysql -u wale -p
CREATE DATABASE IF NOT EXISTS covevotedb;

use covevotedb
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(150)    NOT NULL,
    `lastname`  VARCHAR(150)    NOT NULL,
    `email`     VARCHAR(150)    NOT NULL,
    `user_type` ENUM ('voter', 'officer', 'admin') DEFAULT 'voter' NOT NULL,
    `password`  VARCHAR(150)    NOT NULL,
    `location`  ENUM ('england', 'scotland', 'wales', 'ireland', 'outside'),
    `Nationality` ENUM ('irish', 'british'),
    `DOB` DATE
);

CREATE TABLE IF NOT EXISTS `election` (
    `election_id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`  VARCHAR(150) NOT NULL,
    `description` TEXT,
    `user_id`     INT NULL,
    `votes` INT NULL DEFAULT 0,
    `candidates` JSON,
    `location` ENUM ('england', 'scotland', 'wales', 'ireland', 'outside'),
    `polling_unit` ENUM ('polling_unit_A', 'polling_unit_b', 'polling_unit_c'),
    CONSTRAINT fk_user_id_elections FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);

