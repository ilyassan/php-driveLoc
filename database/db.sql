
-- Dropping tables if they exist
DROP VIEW IF EXISTS vehiculesList;

DROP TABLE IF EXISTS reservations;
DROP TABLE IF EXISTS ratings;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS vehicles;
DROP TABLE IF EXISTS places;
DROP TABLE IF EXISTS categories;

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

CREATE TABLE vehicles(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    model VARCHAR(255),
    category_id INT,
    PRIMARY KEY(id),
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
    c.name AS category_name,
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
JOIN categories c ON v.id = c.id
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
('Admin', 'User', 'admin@example.com', 'hashed_admin_password', 2),
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
('Hicham', 'Lemrani', 'hicham.lemrani@example.com', 'hashed_password_11', 1),
('Salma', 'Naji', 'salma.naji@example.com', 'hashed_password_12', 1),
('Karim', 'Mezouar', 'karim.mezouar@example.com', 'hashed_password_13', 1),
('Rania', 'Alaoui', 'rania.alaoui@example.com', 'hashed_password_14', 1),
('Samir', 'Tahar', 'samir.tahar@example.com', 'hashed_password_15', 1),
('Lina', 'Kabbaj', 'lina.kabbaj@example.com', 'hashed_password_16', 1),
('Walid', 'Essafi', 'walid.essafi@example.com', 'hashed_password_17', 1),
('Sofia', 'Mekouar', 'sofia.mekouar@example.com', 'hashed_password_18', 1),
('Ismail', 'Haddadi', 'ismail.haddadi@example.com', 'hashed_password_19', 1),
('Nadia', 'Jabiri', 'nadia.jabiri@example.com', 'hashed_password_20', 1),
('Oussama', 'Farih', 'oussama.farih@example.com', 'hashed_password_21', 1),
('Layla', 'Rifi', 'layla.rifi@example.com', 'hashed_password_22', 1),
('Adil', 'Amrani', 'adil.amrani@example.com', 'hashed_password_23', 1),
('Zineb', 'Khair', 'zineb.khair@example.com', 'hashed_password_24', 1),
('Hassan', 'Aziz', 'hassan.aziz@example.com', 'hashed_password_25', 1),
('Malak', 'Aouad', 'malak.aouad@example.com', 'hashed_password_26', 1),
('Anas', 'Belkadi', 'anas.belkadi@example.com', 'hashed_password_27', 1),
('Ikram', 'Toumi', 'ikram.toumi@example.com', 'hashed_password_28', 1),
('Rachid', 'Fouad', 'rachid.fouad@example.com', 'hashed_password_29', 1),
('Saida', 'Hachimi', 'saida.hachimi@example.com', 'hashed_password_30', 1),
('Amine', 'Younes', 'amine.younes@example.com', 'hashed_password_31', 1),
('Rim', 'Mokhtar', 'rim.mokhtar@example.com', 'hashed_password_32', 1),
('Samia', 'Idrissi', 'samia.idrissi@example.com', 'hashed_password_33', 1),
('Khalid', 'Zaim', 'khalid.zaim@example.com', 'hashed_password_34', 1),
('Najib', 'El Morabit', 'najib.elmorabit@example.com', 'hashed_password_35', 1),
('Hiba', 'Serghini', 'hiba.serghini@example.com', 'hashed_password_36', 1),
('Adnane', 'Boussaid', 'adnane.boussaid@example.com', 'hashed_password_37', 1),
('Yassine', 'Hamid', 'yassine.hamid@example.com', 'hashed_password_38', 1),
('Samira', 'Bakkar', 'samira.bakkar@example.com', 'hashed_password_39', 1),
('Zouhair', 'Khayat', 'zouhair.khayat@example.com', 'hashed_password_40', 1),
('Fouzia', 'Oussama', 'fouzia.oussama@example.com', 'hashed_password_41', 1),
('Taha', 'Moulay', 'taha.moulay@example.com', 'hashed_password_42', 1),
('Meryem', 'Aarab', 'meryem.aarab@example.com', 'hashed_password_43', 1),
('Hamza', 'Ghali', 'hamza.ghali@example.com', 'hashed_password_44', 1),
('Latifa', 'El Masri', 'latifa.elmasri@example.com', 'hashed_password_45', 1),
('Mohamed', 'Oualid', 'mohamed.oualid@example.com', 'hashed_password_46', 1),
('Kenza', 'Haddadi', 'kenza.haddadi@example.com', 'hashed_password_47', 1),
('Zaki', 'Bennis', 'zaki.bennis@example.com', 'hashed_password_48', 1),
('Hind', 'Akrimi', 'hind.akrimi@example.com', 'hashed_password_49', 1);

-- Seeding places (Moroccan cities)
INSERT INTO places (name) VALUES
('Casablanca'), ('Rabat'), ('Marrakech'), ('Fes'), ('Tangier'),
('Agadir'), ('Oujda'), ('Kenitra'), ('Tetouan'), ('Safi'),
('Meknes'), ('Nador');

-- Seeding categories
INSERT INTO categories (name) VALUES
('Sedan'), ('SUV'), ('Truck'), ('Convertible'), ('Hatchback'), ('Van');

-- Seeding vehicles
INSERT INTO vehicles (name, model, category_id) VALUES
('Toyota Corolla', '2020', 1),
('Honda Civic', '2019', 1),
('Ford Mustang', '2021', 4),
('Chevrolet Tahoe', '2020', 2),
('Jeep Wrangler', '2021', 2),
('Tesla Model S', '2022', 1),
('Toyota Hilux', '2020', 3),
('Mercedes-Benz Sprinter', '2021', 6),
('Nissan Micra', '2018', 5),
('Peugeot 208', '2019', 5),
('Volkswagen Golf', '2020', 5),
('BMW 3 Series', '2021', 1),
('Audi Q5', '2020', 2),
('Mazda CX-5', '2019', 2),
('Renault Kangoo', '2020', 6);

-- Seeding reservations
INSERT INTO reservations (from_date, to_date, place_id, vehicle_id, client_id) VALUES
('2024-12-01', '2024-12-03', 1, 1, 1),
('2024-12-04', '2024-12-06', 2, 2, 2),
('2024-12-07', '2024-12-10', 3, 3, 3),
('2024-12-15', '2024-12-18', 4, 4, 4),
('2024-12-20', '2024-12-22', 5, 5, 5),
('2024-12-25', '2024-12-27', 6, 6, 6),
('2024-12-28', '2024-12-30', 7, 7, 7),
('2025-01-01', '2025-01-03', 8, 8, 8);

-- Seeding ratings
INSERT INTO ratings (rate, vehicle_id, client_id) VALUES
(5, 1, 1),
(4, 2, 2),
(3, 3, 3),
(5, 4, 4),
(4, 5, 5),
(5, 6, 6),
(3, 7, 7),
(4, 8, 8);