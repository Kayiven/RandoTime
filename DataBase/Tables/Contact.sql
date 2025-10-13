-- Creation of Table Contact --
CREATE TABLE IF NOT EXISTS Contact (
id INT AUTO_INCREMENT PRIMARY KEY,
nom Varchar(50),
email Varchar(50),
Title Varchar(30),
telephone int(8),
sujet TEXT NOT NULL,
date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);