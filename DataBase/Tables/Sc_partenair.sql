-- Creation of Table Plus Visités --
CREATE TABLE IF NOT EXISTS Partenair (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(255) NOT NULL,
logo_url VARCHAR(255) NOT NULL, -- chemin du logo
site_web VARCHAR(255) NULL,  -- lien cliquable
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);