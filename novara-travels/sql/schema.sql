CREATE TABLE IF NOT EXISTS `customer` (
    `cid`    int PRIMARY KEY   NOT NULL AUTO_INCREMENT,
    `firstname` varchar(100)        NOT NULL,
    `lastname`  varchar(100)        NOT NULL,
    `email` varchar(100)            NOT NULL,
    `password` varchar(150)         NOT NULL
);

CREATE TABLE IF NOT EXISTS `booking` (
    `booking_id`    int(11)     PRIMARY KEY     NOT NULL    AUTO_INCREMENT,
    `cid` int NOT NULL,
    `destination` varchar(100) NOT NULL,
    `origin`    varchar(100) NOT NULL,
    `depature_date`  DATE NOT NULL,
    `arrival_date`  DATE NOT NULL,
    `booking_type` ENUM ('ONE-WAY') DEFAULT 'ONE-WAY',
    `transportation_means` ENUM ('FLIGHT', 'TRAIN') DEFAULT 'FLIGHT',
    `firstname` varchar(100)        NOT NULL,
    `lastname`  varchar(100)        NOT NULL,
    `dob`       DATE                NULL,
    `nationality`   varchar(100)    NULL
);

--
-- Add foreign key to booking to create one to many relationship between customer and booking
--
ALTER TABLE `booking` ADD CONSTRAINT `booking_customer__fk` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE;


--
-- Test Data for customer
--

INSERT INTO `customer` ( `lastname`, `firstname`, `dob`, `nationality`, `email`, `password`) VALUES
('testlastname', 'testFirstname', '2017-06-18 10:03:07', 'Nigerian', 'test@gmai.com', 'password');