CREATE DATABASE project2;
USE project2;

CREATE TABLE users (
	id INT auto_increment,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    email VARCHAR(100) unique,
    password VARCHAR(100),
    phone_number VARCHAR(13),
    PRIMARY KEY (id)
);

select * from users;
delete from users;