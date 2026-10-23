CREATE DATABASE IF NOT EXISTS carnet_adresses
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE carnet_adresses;

DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO contacts (nom, email, phone_number) VALUES
    ('John Doe', 'john.doe@example.com', '1234567890'),
    ('Jane Smith', 'jane.smith@example.com', '0987654321'),
    ('Alice Johnson', 'alice.johnson@example.com', '5551234567');