-- Creation of Table Avis_participants --
CREATE TABLE IF NOT EXISTS Avis_participants (
id INT AUTO_INCREMENT PRIMARY KEY,
prenom VARCHAR(50) NOT NULL,
photo VARCHAR(255) NOT NULL,
commentaire TEXT NOT NULL,
date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
