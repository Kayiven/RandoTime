-- Creation of Galarie_activité --
CREATE TABLE IF NOT EXISTS Galarie_activité (
id INT AUTO_INCREMENT PRIMARY KEY,
image VARCHAR(255) NOT NULL, -- Nom du fichier image
titre VARCHAR(100) NOT NULL, -- Titre à afficher au hover
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);