CREATE DATABASE IF NOT EXISTS your_database_name;
USE your_database_name;CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('doctor', 'user') NOT NULL
);