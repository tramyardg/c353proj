CREATE DATABASE IF NOT EXISTS bookstore353;
ALTER
  DATABASE bookstore353
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE bookstore353;

# copy from here if database already exists
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `authors`;
DROP TABLE IF EXISTS `employees`;
DROP TABLE IF EXISTS `customers`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `publishers`;
DROP TABLE IF EXISTS `books`;
DROP TABLE IF EXISTS `books_authors`;
DROP TABLE IF EXISTS `books_inventory`;
DROP TABLE IF EXISTS `order_items`;
DROP TABLE IF EXISTS `branches`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS `employees`
(
  `emp_id`       INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `emp_name`     VARCHAR(50)        NOT NULL,
  `ssn`          VARCHAR(10)        NOT NULL,
  `phone_number` VARCHAR(20),
  `email`        VARCHAR(50)        NOT NULL,
  `password`     VARCHAR(50)        NOT NULL,
  `address`      VARCHAR(100),
  `is_admin`     BOOL DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS `customers`
(
  `customer_id`   INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `customer_name` VARCHAR(50)        NOT NULL,
  `email`         VARCHAR(50)        NOT NULL,
  `password`      VARCHAR(50)        NOT NULL,
  `phone_number`  VARCHAR(20),
  `address`       VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS `authors`
(
  `author_id`   INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `first_name`  VARCHAR(50)        NOT NULL,
  `middle_name` VARCHAR(5)    DEFAULT NULL,
  `last_name`   VARCHAR(50)        NOT NULL,
  `bio`         VARCHAR(2000) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `publishers`
(
  `publisher_id` INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(50)        NOT NULL,
  `phone_number` VARCHAR(20),
  `email`        VARCHAR(50),
  `address`      VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS `books`
(
  `book_id`      INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `isbn`         VARCHAR(20)        NOT NULL,
  `title`        VARCHAR(250)       NOT NULL,
  `edition`      INT                                 DEFAULT 1,
  `price`        DOUBLE(8, 2),
  `publisher_id` INT(4)             NOT NULL,
  `image`        BLOB                                DEFAULT NULL,
  `category`     ENUM ('0', '1', '2', '3', '4', '5') DEFAULT NULL,
  FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`)
);

# a book can have many authors (one-to-many)
CREATE TABLE IF NOT EXISTS `books_authors`
(
  `book_authors_id` INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `book_id`         INT(4),
  `author_id`       INT(4)
);

# one-to-one relationship with books
CREATE TABLE IF NOT EXISTS `books_inventory`
(
  `book_inv_id` INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `book_id`     INT(4)             NOT NULL,
  `qty_on_hand` INT,
  `qty_sold`    INT,
  FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`)
);

CREATE TABLE IF NOT EXISTS `orders`
(
  `order_id`     INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `customer_id`  INT(4)             NOT NULL,
  `order_date`   TIMESTAMP          NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_date` TIMESTAMP,
  `status`       VARCHAR(20),
  FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
);

CREATE TABLE IF NOT EXISTS `order_items`
(
  `order_item_id` INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `order_id`      INT(4)             NOT NULL,
  `book_id`       INT(4)             NOT NULL,
  `quantity`      INT,
  `price`         DOUBLE(8, 2),
  FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`)
);

CREATE TABLE IF NOT EXISTS `branches`
(
  `branch_id`      INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `publisher_id`   INT(4)             NOT NULL,
  `branch_name`    VARCHAR(50)        NOT NULL,
  `branch_manager` VARCHAR(50),
  `phone_number`   VARCHAR(20),
  `email`          VARCHAR(50),
  `address`        VARCHAR(250),
  FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`)
);

ALTER TABLE authors
  AUTO_INCREMENT = 1;
ALTER TABLE books
  AUTO_INCREMENT = 1;
ALTER TABLE books_authors
  AUTO_INCREMENT = 1;
ALTER TABLE books_inventory
  AUTO_INCREMENT = 1;
ALTER TABLE branches
  AUTO_INCREMENT = 1;
ALTER TABLE employees
  AUTO_INCREMENT = 1;
ALTER TABLE order_items
  AUTO_INCREMENT = 1;
ALTER TABLE orders
  AUTO_INCREMENT = 1;
ALTER TABLE publishers
  AUTO_INCREMENT = 1;

