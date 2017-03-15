DROP DATABASE asesoriaspar;

CREATE DATABASE asesoriaspar CHARACTER SET utf8 COLLATE utf8_general_ci;

use asesoriaspar;


CREATE TABLE carrera(
	IDcarrera 	INT AUTO_INCREMENT PRIMARY KEY,
	Nombre 		VARCHAR(100) NOT NULL,
	Registrada	TIMESTAMP
);


CREATE TABLE materia(
	IDmateria INT AUTO_INCREMENT PRIMARY KEY,
	Nombre varchar(100) NOT NULL,

	-- Foranea	
	Carrera INT, FOREIGN KEY (Carrera) REFERENCES carrera(IDcarrera) ON UPDATE CASCADE
);


CREATE TABLE (

);