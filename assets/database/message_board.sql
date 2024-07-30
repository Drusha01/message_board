DROP DATABASE IF EXISTS `message_board`;
CREATE DATABASE message_board;

use message_board;


DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);

INSERT INTO genders (id,name) VALUES
(
    NULL,
    'Male'
),
(
    NULL,
    'Female'
);

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_active BOOLEAN DEFAULT 1,

    img_url VARCHAR(50) DEFAULT 'default.png',
    gender_id INT DEFAULT NULL, 
    birthdate DATE,
    last_login DATE,
    hobby VARCHAR(2048),
    date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE INDEX idx_users_email ON users(email(10));
CREATE INDEX idx_users_password ON users(password(10));
CREATE INDEX idx_users_img_url ON users(img_url(10));
