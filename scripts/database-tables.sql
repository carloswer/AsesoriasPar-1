-- DROP DATABASE asesoriaspar;

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
	Semestre tinyint NOT NULL,

	-- Foranea	
	Carrera INT, FOREIGN KEY (Carrera) REFERENCES carrera(IDcarrera) ON UPDATE CASCADE
);


CREATE TABLE usuario(
	IDusuario INT AUTO_INCREMENT PRIMARY KEY,
	Nombre varchar(50) NOT NULL,
	IDitson varchar (15) NOT NULL,
	Apellido varchar(50) NOT NULL,
	Contrasenia varchar (50) NOT NULL,
	Telefono varchar (30) NOT NULL,
	Correo varchar (50) NOT NULL,
	Facebook varchar (30) NOT NULL,
	Avatar varchar (30),
	Estado bit NOT NULL,
	ReqValidarHorario bit NOT NULL,
	FechaRegistro DATE NOT NULL,
	Rol varchar(15) NOT NULL,
	
	-- llaves foraneas
	Carrera int, FOREIGN KEY (Carrera) REFERENCES carrera(IDcarrera) ON UPDATE CASCADE
);


CREATE TABLE horario(
	IDdia INT AUTO_INCREMENT PRIMARY KEY,
	Nombre varchar(10) NOT NULL,
	Hora TIME not null,
	Aprobado bit NOT NULL,
	
	-- Foranea	
	Usuario INT, FOREIGN KEY (Usuario) REFERENCES usuario(IDusuario) ON UPDATE CASCADE
);


CREATE TABLE asesoria(
	IDasesoria INT AUTO_INCREMENT PRIMARY KEY,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	validacion bit NOT NULL,
	descripcion text,
	
	-- Foranea	
	Usuario INT, FOREIGN KEY (Usuario) REFERENCES usuario(IDusuario) ON UPDATE CASCADE,
	Materia INT, FOREIGN KEY (Materia) REFERENCES materia(IDmateria) ON UPDATE CASCADE
);

