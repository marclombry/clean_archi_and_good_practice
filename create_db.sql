CREATE TABLE IF NOT EXISTS customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255),
    city VARCHAR(100),
    postalCode VARCHAR(20),
    comment TEXT
);


CREATE TABLE IF NOT EXISTS reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_reservation VARCHAR(100)T NULL,
    timezone VARCHAR(100) NOT NULL,
    hours JSON NOT NULL
);

-- Insertion d'une entrée dans la table reservation
INSERT INTO reservation (id, dateCalendar, timezone, hours)
VALUES (1, '2000-01-01', 'Europe/Paris', '[6,30]');
