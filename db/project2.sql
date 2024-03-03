CREATE DATABASE project2;
USE project2;

CREATE TABLE admins (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL
);

CREATE TABLE guests (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    status INT NOT NULL
);

CREATE TABLE employees (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(20) NOT NULL,
    role VARCHAR(255) NOT NULL
);

CREATE TABLE roomTypes (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE rooms (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    price DECIMAL(10,2) NOT NULL,
    capacity INT,
    description TEXT,
    image TEXT,
    roomType_id INT NOT NULL,
    FOREIGN KEY (roomType_id) REFERENCES roomTypes(id)
);

CREATE TABLE bookings (
	id INT AUTO_INCREMENT PRIMARY KEY,
    created_date DATETIME NOT NULL,
	status INT NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    number_of_guests INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    note TEXT,
    room_id INT NOT NULL,
    guest_id INT NOT NULL,
    admin_id INT,
    FOREIGN KEY (room_id) REFERENCES rooms(id),
    FOREIGN KEY (guest_id) REFERENCES guests(id),
    FOREIGN KEY (admin_id) REFERENCES admins(id)
);

CREATE TABLE ratings (
	id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT NOT NULL,
    review TEXT,
    rate_date DATETIME NOT NULL,
    guest_id INT NOT NULL,
    room_id INT NOT NULL,
	FOREIGN KEY (guest_id) REFERENCES guests(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
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
	booking_id INT NOT NULL,
    service_id INT NOT NULL,
    employee_id INT,
    created_date DATETIME NOT NULL,
    note TEXT,
    FOREIGN KEY (booking_id) REFERENCES bookings(id),
    FOREIGN KEY (service_id) REFERENCES services(id),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);


/*============TEST=============*/
select * from guests;
INSERT INTO admins VALUES 
(1, 'Admin 1', 'admin1@gmail.com', '$2y$12$SfmNR/IjTz2B67dLQ4yk5eVwcBkJyP8Dxd/hr3dZ8AfyamPFreJUq', '+84123456789');