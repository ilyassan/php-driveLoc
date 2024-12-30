DROP TABLE IF EXISTS reservations;
DROP TABLE IF EXISTS ratings;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS vehicles;
DROP TABLE IF EXISTS places;
DROP TABLE IF EXISTS categories;


CREATE TABLE roles(
    id INT AUTO_INCREMENT,
    name ENUM('client', 'admin') NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE users(
    id INT AUTO_INCREMENT,
    first_name VARCHAR(25),
    last_name VARCHAR(25),
    email VARCHAR(255),
    password_hash VARCHAR(255),
    role_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(role_id) REFERENCES roles(id)
);

CREATE TABLE places(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE categories(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE vehicles(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    model VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE reservations(
    id INT AUTO_INCREMENT,
    from_date DATETIME NOT NULL,
    to_date DATETIME NOT NULL,
    place_id INT NOT NULL,
    vehicle_id INT NOT NULL,
    client_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(place_id) REFERENCES places(id),
    FOREIGN KEY(vehicle_id) REFERENCES vehicles(id),
    FOREIGN KEY(client_id) REFERENCES users(id)
);

CREATE TABLE ratings(
    id INT AUTO_INCREMENT,
    rate INT,
    vehicle_id INT NOT NULL,
    client_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(vehicle_id) REFERENCES vehicles(id),
    FOREIGN KEY(client_id) REFERENCES users(id)
);