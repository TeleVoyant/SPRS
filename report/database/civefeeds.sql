CREATE DATABASE civefeeds;
USE civefeeds;
CREATE TABLE feedback (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `full_name` VARCHAR(255) NOT NULL,
    `student_id` VARCHAR(10) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `department` VARCHAR(100) NOT NULL,
    `feedback_category` VARCHAR(100) NOT NULL,
    `rating` INT NOT NULL,
    `comments` TEXT,
    `is_anonymous` TINYINT NOT NULL,
    `submission_timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `additional_comments` TEXT,
    `recaptcha_response` VARCHAR(255) NOT NULL
);


CREATE TABLE registration (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(100) NOT NULL,
    `registration_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

