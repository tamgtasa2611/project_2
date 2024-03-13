CREATE DATABASE project2;
USE project2;

CREATE TABLE admins (
	id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
	last_name VARCHAR(255),
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    level INT(2) NOT NULL,
    image TEXT
);

CREATE TABLE guests (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(255),
	last_name VARCHAR(255),
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    status INT(2) NOT NULL,
    image TEXT
);

CREATE TABLE room_types (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
	base_price DECIMAL(10,2) NOT NULL
);

CREATE TABLE rooms (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    capacity INT(2),
    room_type_id INT,
    FOREIGN KEY (room_type_id) REFERENCES room_types(id) ON DELETE SET NULL
);

CREATE TABLE room_images (
	id INT AUTO_INCREMENT PRIMARY KEY,
	path TEXT NOT NULL,
    room_id INT,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL
);

CREATE TABLE payment_methods (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE bookings (
	id INT AUTO_INCREMENT PRIMARY KEY,
    created_date DATETIME,
	status INT,
    checkin_date DATETIME NOT NULL,
    checkout_date DATETIME NOT NULL,
    guest_num INT,
    total_price DECIMAL(10,2),
    room_id INT,
    guest_id INT,
    admin_id INT,
    method_id INT,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL,
    FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL,
	FOREIGN KEY (method_id) REFERENCES payment_methods(id) ON DELETE SET NULL
);

CREATE TABLE ratings (
	id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT NOT NULL,
    review TEXT,
    rate_date DATETIME,
    guest_id INT,
    room_id INT,
	FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL
);


/*============TEST=============*/

INSERT INTO admins VALUES 
(1, 'Cristiano', 'Ronaldo', 'admin1@gmail.com', '$2y$12$SfmNR/IjTz2B67dLQ4yk5eVwcBkJyP8Dxd/hr3dZ8AfyamPFreJUq', '+84123456789', 0, '');
