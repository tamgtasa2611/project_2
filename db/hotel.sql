CREATE DATABASE project2;
USE project2;

CREATE TABLE admins (
	id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    level INT(2) NOT NULL NOT NULL,
    image TEXT
);

CREATE TABLE guests (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
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
    capacity INT(2) NOT NULL,
    room_type_id INT,
    FOREIGN KEY (room_type_id) REFERENCES room_types(id) ON DELETE SET NULL
);

CREATE TABLE room_images (
	id INT AUTO_INCREMENT PRIMARY KEY,
	path TEXT NOT NULL,
    room_id INT,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL
);

CREATE TABLE bookings (
	id INT AUTO_INCREMENT PRIMARY KEY,
    created_date DATETIME NOT NULL,
	status INT NOT NULL,
    checkin_date DATE NOT NULL,
    checkout_date DATE NOT NULL,
    guest_num INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    room_id INT,
    guest_id INT,
    admin_id INT,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL,
    FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
);

CREATE TABLE payments (
	id INT AUTO_INCREMENT PRIMARY KEY,
    date DATETIME NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    method VARCHAR(255),
    status INT NOT NULL,
    guest_id INT,
    booking_id INT,
	FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
	FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE SET NULL
);

CREATE TABLE ratings (
	id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT NOT NULL,
    review TEXT,
    rate_date DATE NOT NULL,
    guest_id INT,
    room_id INT,
	FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL
);

CREATE TABLE activities (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date DATETIME NOT NULL,
    detail TEXT NOT NULL,
    admin_id INT,
	FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
);
/*============TEST=============*/

INSERT INTO admins VALUES 
(1, 'OWNER', 'OWNER', 'ductamvstn@gmail.com', '$2y$10$A/750cSQNbGRx3fn4wJ1WOzguMbCK.3uS9g6USAJSlGr7c6Fy1ERi', '+84123456789', 0, '');

USE project2;
delete from rooms;
select * from bookings;

delete from bookings;

select * from room_images;