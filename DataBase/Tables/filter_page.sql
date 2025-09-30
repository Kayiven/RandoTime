-- Creation of Table Filter --
CREATE TABLE Filter (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,          -- Titre de la carte
description TEXT,                      -- Description
image_url VARCHAR(255),                -- URL de l'image
link VARCHAR(255),                      -- Lien vers la page détaillée
price DECIMAL(10,2) DEFAULT 0,         -- Prix
discount DECIMAL(10,2) DEFAULT 0,      -- Prix avec réduction
Star INT DEFAULT 0,                     -- Étoiles (1 à 5)
status ENUM('active', 'inactive') DEFAULT 'active', -- Statut carte
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);