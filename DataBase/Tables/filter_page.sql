CREATE TABLE `filter` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `subtitle` VARCHAR(255) DEFAULT NULL,
    `image` VARCHAR(500) DEFAULT NULL,
    `stars` TINYINT UNSIGNED NOT NULL,       -- 1 to 5
    `adults` TINYINT UNSIGNED NOT NULL,      -- 1 to 6
    `children` TINYINT UNSIGNED NOT NULL,    -- 0 to 4
    `status` ENUM('online', 'offline') NOT NULL DEFAULT 'offline',
    `date` DATE NOT NULL,
    `price` DECIMAL(10,2) NOT NULL
);
