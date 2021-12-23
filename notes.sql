```

create database notes;

use notes;

drop table if exists users;

create table users (id int primary key not null auto_increment, pseudo varchar(30), pw varchar(256), rang int default 0);

insert into users (pseudo, pw, rang) values ('admin', 'admin', 1);
insert into users (pseudo, pw) values ('Mehdi', '0000');

drop table if exists notes;

create table notes (id int primary key not null auto_increment, titre varchar(256), description varchar(512), epingle int, dateCreation date, dateRappel date);

insert into notes (titre, description, epingle, dateCreation, dateRappel) values ('Courses', 'Acheter de la viande et des légumes', 1, NOW(), '2022-01-03');
insert into notes (titre, description, epingle, dateCreation, dateRappel) values ('Remboursement', 'Rembourser le meuble', 0, NOW(), NULL);

```