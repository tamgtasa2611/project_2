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
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL,
    FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
);

CREATE TABLE payments (
	id INT AUTO_INCREMENT PRIMARY KEY,
    date DATETIME,
    amount DECIMAL(10,2),
    method VARCHAR(255),
    status INT,
    guest_id INT,
    booking_id INT,
	FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
	FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE SET NULL
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

CREATE TABLE activities (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date DATETIME,
    detail TEXT,
    admin_id INT,
	FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
);
/*============TEST=============*/

INSERT INTO admins VALUES 
(1, 'OWNER', 'OWNER', 'ductamvstn@gmail.com', '$2y$10$A/750cSQNbGRx3fn4wJ1WOzguMbCK.3uS9g6USAJSlGr7c6Fy1ERi', '+84123456789', 0, '');
select * from admins;

delete from activities;


USE project2;

select room_types.*, count(rooms.room_type_id) from room_types
inner join rooms on room_types.id = rooms.room_type_id
group by id;

delete from room_images;
select * from room_images;

