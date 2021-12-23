```

CREATE DATABASE notes;

USE notes;

DROP TABLE IF EXISTS users;

CREATE TABLE users (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, pseudo VARCHAR(30), pw VARCHAR(256), rang INT DEFAULT 0);

INSERT INTO users (pseudo, pw, rang) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 1);
INSERT INTO users (pseudo, pw) VALUES ('Mehdi', '4a7d1ed414474e4033ac29ccb8653d9b');

DROP TABLE IF EXISTS notes;

CREATE TABLE notes (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, titre VARCHAR(256), description VARCHAR(512), epingle INT, dateCreation DATE, dateRappel DATE);

INSERT INTO notes (titre, description, epingle, dateCreation, dateRappel) VALUES ('Courses', 'Acheter de la viande et des légumes', 1, NOW(), '2022-01-03');
INSERT INTO notes (titre, description, epingle, dateCreation, dateRappel) VALUES ('Remboursement', 'Rembourser le meuble', 0, NOW(), NULL);

```