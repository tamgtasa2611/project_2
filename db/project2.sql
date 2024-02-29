CREATE DATABASE project2;
USE project2;

CREATE TABLE users (
	id INT auto_increment,
    email VARCHAR(100) unique,
    password VARCHAR(100),
    PRIMARY KEY (id)
);