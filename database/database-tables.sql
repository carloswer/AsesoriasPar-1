 -- DROP DATABASE asesoriaspar;

CREATE DATABASE asesoriaspar CHARACTER SET utf8 COLLATE utf8_general_ci;

use asesoriaspar;


CREATE TABLE administrador(
	IDadmin	INT AUTO_INCREMENT PRIMARY KEY,
	username	varchar(200) not null unique,
	password varchar(200) not null,
	correo 	varchar(200) not null unique
);


CREATE TABLE carrera (
	IDcarrera 	INT AUTO_INCREMENT PRIMARY KEY,
	Carrera 		VARCHAR(100) NOT NULL,
	Abreviacion	VARCHAR(10),
	Registrada	TIMESTAMP
);


-- CREATE TABLE rol(
-- IDrol INT AUTO_INCREMENT PRIMARY KEY,
-- Nombre varchar(50) NOT NULL UNIQUE
-- );

CREATE TABLE dia(
	IDdia 	INT AUTO_INCREMENT PRIMARY KEY,
	Dia 	varchar(100) NOT NULL
);



CREATE TABLE materia(
	IDmateria INT AUTO_INCREMENT PRIMARY KEY,
	Materia varchar(100) NOT NULL,
	Semestre int NOT NULL,

	-- Foranea	
	Carrera INT, FOREIGN KEY (Carrera) REFERENCES carrera(IDcarrera) ON UPDATE CASCADE
);



CREATE TABLE estudiante(
	IDestudiante		INT AUTO_INCREMENT PRIMARY KEY,
	itsonID 				varchar(20) NOT NULL unique,
	Nombre 				varchar(50) NOT NULL,
	Apellido 			varchar(50) NOT NULL,
	Correo 				varchar(50) NOT NULL unique,
	Password	 			varchar(50) NOT NULL,
	Telefono 			varchar(30),
	Facebook 			varchar(30),
	Avatar 				varchar(30),
	ReqValidar			TINYINT NOT NULL DEFAULT 0, -- 0 = NO, 1 = SI
	
	FechaRegistro 		TIMESTAMP,
	Estado 				TINYINT NOT NULL DEFAULT 1, -- 0 = Inactivo, 1 = Activo

	
	-- llaves foraneas
-- Rol int NOT NULL,
-- 	FOREIGN KEY (Rol) REFERENCES rol(IDrol) ON UPDATE CASCADE,
	Carrera int not null, 
	FOREIGN KEY (Carrera) REFERENCES carrera(IDcarrera) ON UPDATE CASCADE
);


CREATE TABLE horario(
	IDhorario 	INT AUTO_INCREMENT PRIMARY KEY,
	Hora 			TIME not null,
	
	-- Foranea
	Dia INT not null, 
	FOREIGN KEY (Dia) REFERENCES dia(IDdia) ON UPDATE CASCADE,
	Asesor INT not null, 
	FOREIGN KEY (Asesor) REFERENCES estudiante(IDestudiante) ON UPDATE CASCADE
);




CREATE TABLE asesor_materia(
	IDasesor_materia 	INT AUTO_INCREMENT PRIMARY KEY,
	Aprobado 			TINYINT NOT NULL DEFAULT 0, -- 0 = NO, 1 = SI
	
	-- Foranea	
	Asesor int not null,
	FOREIGN KEY (Asesor) REFERENCES estudiante(IDestudiante) ON UPDATE CASCADE,
	Materia int not null,
	FOREIGN KEY (Materia) REFERENCES materia(IDmateria) ON UPDATE CASCADE
);


CREATE TABLE asesoria(
	IDasesoria 	INT AUTO_INCREMENT PRIMARY KEY,
	-- Cuando se colicita
	Fecha 			DATE NOT NULL,
	Descripcion 	text,
	
	-- Automaticos para primer registro
	FechaRegistro	TIMESTAMP not null,
	Estado 			TINYINT NOT NULL DEFAULT 0, -- 0 = Pendiente, 1 = Cancelado, 2 = Realizado
	
	-- Foranea	
	Alumno INT not null, 
	FOREIGN KEY (Alumno) REFERENCES estudiante(IDestudiante) ON UPDATE CASCADE,
	Horario int NOT NULL,
	FOREIGN KEY (Horario) REFERENCES horario(IDhorario) ON UPDATE CASCADE,
	Asesor_Materia INT not null, 
	FOREIGN KEY (Asesor_Materia) REFERENCES asesor_materia(IDasesor_materia) ON UPDATE CASCADE
);


	-- Cuando se valida asesoria
CREATE TABLE validacion(
	IDvalidacion 	INT AUTO_INCREMENT PRIMARY KEY,
	Comentario 		text not null,
	Calificacion 	int not null, -- 0 a 5
	
	-- Foraneo
	Asesoria int NOT NULL,
	FOREIGN KEY (Asesoria) REFERENCES asesoria(IDasesoria) ON UPDATE CASCADE
	
);