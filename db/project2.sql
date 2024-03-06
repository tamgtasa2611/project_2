CREATE DATABASE project2;
USE project2;

CREATE TABLE admins (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    level SMALLINT NOT NULL
);

CREATE TABLE guests (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    status INT NOT NULL,
    image TEXT
);

CREATE TABLE employees (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(20) NOT NULL,
    role VARCHAR(255) NOT NULL,
    image TEXT
);

CREATE TABLE roomTypes (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE rooms (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    capacity INT,
    description TEXT,
    image TEXT,
    roomType_id INT,
    FOREIGN KEY (roomType_id) REFERENCES roomTypes(id) ON DELETE SET NULL
);

CREATE TABLE images (
	id INT AUTO_INCREMENT PRIMARY KEY,
	path TEXT NOT NULL,
    room_id INT,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL
);

CREATE TABLE bookings (
	id INT AUTO_INCREMENT PRIMARY KEY,
    created_date DATETIME NOT NULL,
	status INT NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    number_of_guests INT,
    total_price DECIMAL(10,2),
    note TEXT,
    room_id INT,
    guest_id INT,
    admin_id INT,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL,
    FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL
);

CREATE TABLE ratings (
	id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT NOT NULL,
    review TEXT,
    date DATETIME,
    guest_id INT,
    room_id INT,
	FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE SET NULL,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE SET NULL
);

CREATE TABLE services (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image TEXT
);

CREATE TABLE bookingServices (
	id INT AUTO_INCREMENT PRIMARY KEY,
	booking_id INT,
    service_id INT,
    employee_id INT,
    date DATETIME,
    note TEXT,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE SET NULL,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE SET NULL,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE SET NULL
);


/*============TEST=============*/

INSERT INTO admins VALUES 
(1, 'Admin 1', 'admin1@gmail.com', '$2y$12$SfmNR/IjTz2B67dLQ4yk5eVwcBkJyP8Dxd/hr3dZ8AfyamPFreJUq', '+84123456789', 0);

SELECT * FROM guests;