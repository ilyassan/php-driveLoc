-- Dropping tables if they exist
DROP VIEW IF EXISTS vehiculesList;
DROP PROCEDURE IF EXISTS AddReservation;

DROP TABLE IF EXISTS reservations;
DROP TABLE IF EXISTS ratings;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS vehicles;
DROP TABLE IF EXISTS places;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS types;

-- Creating tables
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

CREATE TABLE types(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE vehicles(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    model VARCHAR(4),
    seats INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    type_id INT,
    category_id INT,
    PRIMARY KEY(id),
    FOREIGN KEY(type_id) REFERENCES types(id),
    FOREIGN KEY(category_id) REFERENCES categories(id)
);

CREATE TABLE reservations(
    id INT AUTO_INCREMENT,
    from_date DATE NOT NULL,
    to_date DATE NOT NULL,
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

CREATE VIEW vehiculesList AS
SELECT 
    v.id AS vehicle_id,
    v.name AS vehicle_name,
    v.model AS vehicle_model,
    v.seats AS vehicle_seats,
    v.price AS daily_price,
    c.name AS category_name,
    t.name AS vehicle_type,
    AVG(r.rate) AS average_rating,
    CASE WHEN EXISTS (
            SELECT *
            FROM reservations res
            WHERE res.vehicle_id = v.id 
              AND CURRENT_DATE BETWEEN res.from_date AND res.to_date
        )
        THEN 'Not Available'
        ELSE 'Available'
    END AS availability_status
FROM 
    vehicles v
JOIN categories c ON v.category_id = c.id
JOIN types t ON v.type_id = t.id
LEFT JOIN ratings r ON v.id = r.vehicle_id
GROUP BY 
    v.id;

CREATE PROCEDURE AddReservation (
    IN p_from_date DATE,
    IN p_to_date DATE,
    IN p_place_id INT,
    IN p_vehicle_id INT,
    IN p_client_id INT
)
BEGIN
    INSERT INTO reservations (from_date, to_date, place_id, vehicle_id, client_id)
    VALUES (p_from_date, p_to_date, p_place_id, p_vehicle_id, p_client_id);
END;

-- Seeding roles
INSERT INTO roles (name) VALUES ('client'), ('admin');

-- Seeding users
INSERT INTO users (first_name, last_name, email, password_hash, role_id) VALUES
('Admin', 'User', 'admin@example.com', '$2y$10$aAhj2MDgUweotrurnsCMGeh8PQJ26E0N2l2MnOxAUR5nxpUt3J5yu', 2),
('Ali', 'El Idrissi', 'ali.elidrissi@example.com', 'hashed_password_1', 1),
('Sara', 'Benzakour', 'sara.benzakour@example.com', 'hashed_password_2', 1),
('Kamal', 'El Mouden', 'kamal.elmouden@example.com', 'hashed_password_3', 1),
('Amina', 'Oukili', 'amina.oukili@example.com', 'hashed_password_4', 1),
('Youssef', 'Lahlou', 'youssef.lahlou@example.com', 'hashed_password_5', 1),
('Fatima', 'Boumehdi', 'fatima.boumehdi@example.com', 'hashed_password_6', 1),
('Mohammed', 'El Fassi', 'mohammed.elfassi@example.com', 'hashed_password_7', 1),
('Noura', 'Zaidi', 'noura.zaidi@example.com', 'hashed_password_8', 1),
('Omar', 'Chakib', 'omar.chakib@example.com', 'hashed_password_9', 1),
('Imane', 'Tazi', 'imane.tazi@example.com', 'hashed_password_10', 1),
('Karim', 'Mezouar', 'karim.mezouar@example.com', 'hashed_password_11', 1),
('Ilyass', 'Anida', 'x@gmail.com', '$2y$10$aAhj2MDgUweotrurnsCMGeh8PQJ26E0N2l2MnOxAUR5nxpUt3J5yu', 1);

-- Seeding places (Moroccan cities)
INSERT INTO places (name) VALUES
('Casablanca'), ('Rabat'), ('Marrakech'), ('Fes'), ('Tangier'),
('Agadir'), ('Oujda'), ('Kenitra'), ('Tetouan'), ('Safi'),
('Meknes'), ('Nador');

-- Seeding categories
INSERT INTO categories (name) VALUES
('Sports Cars'), 
('Luxury Cars'), 
('Economy Cars'), 
('Off-Road Cars'),
('Compact Cars'), 
('Family Cars');

-- Seeding types
INSERT INTO types (name) VALUES
('Gas'), ('Electric');

-- Seeding vehicles
INSERT INTO vehicles (name, model, seats, price, type_id, category_id) VALUES
('Toyota Corolla', '2020', 5, 50.00, 1, 1),
('Tesla Model S', '2022', 5, 120.00, 2, 1),
('Ford Mustang', '2021', 4, 150.00, 1, 4),
('Chevrolet Tahoe', '2020', 7, 100.00, 1, 2),
('Jeep Wrangler', '2021', 5, 90.00, 1, 2),
('Toyota Hilux', '2020', 2, 80.00, 1, 3),
('Mercedes-Benz Sprinter', '2021', 15, 200.00, 1, 6),
('Volkswagen Golf', '2020', 5, 70.00, 1, 5),
('Mazda CX-5', '2019', 5, 85.00, 1, 2),
('Audi Q5', '2020', 5, 95.00, 1, 2);

-- Seeding reservations
INSERT INTO reservations (from_date, to_date, place_id, vehicle_id, client_id) VALUES
('2024-12-01', '2024-12-03', 1, 1, 1),
('2024-12-04', '2024-12-06', 2, 2, 2),
('2024-12-07', '2024-12-10', 3, 3, 3),
('2025-01-11', '2025-01-15', 4, 4, 13),
('2024-12-14', '2024-12-16', 5, 5, 5),
('2024-12-17', '2024-12-19', 6, 6, 6),
('2024-12-20', '2024-12-22', 7, 7, 7),
('2024-12-23', '2024-12-25', 8, 8, 13),
('2024-12-26', '2024-12-28', 9, 9, 9),
('2024-12-29', '2025-01-05', 10, 10, 13);

-- Seeding ratings
INSERT INTO ratings (rate, vehicle_id, client_id) VALUES
(5, 1, 1),
(4, 2, 2),
(3, 3, 3),
(5, 4, 4),
(4, 5, 5),
(5, 6, 6),
(3, 7, 7),
(4, 8, 8),
(5, 9, 9),
(3, 10, 10);