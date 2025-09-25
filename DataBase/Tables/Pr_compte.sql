-- Creation SEASION --
CREATE TABLE IF NOT EXISTS compte (
nb INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id VARCHAR(16) NOT NULL UNIQUE,    -- ID unique hexadécimal
token VARCHAR(64) NOT NULL UNIQUE, -- token unique pour sécuriser la session
nom VARCHAR(100) NOT NULL,
prenom VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL UNIQUE,
birthday date NOT NULL,
telephone VARCHAR(12) NOT NULL UNIQUE,
gender VARCHAR(5) NOT NULL,
role VARCHAR(20) NOT NULL DEFAULT 'Member',
motpass VARCHAR(255) NOT NULL, -- mot de passe hashé
profile_pic VARCHAR(255) NOT NULL DEFAULT '../../../Asset/Uploads',
created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);