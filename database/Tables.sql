DROP DATABASE asesoriaspar;

CREATE DATABASE IF NOT EXISTS asesoriaspar CHARACTER SET utf8 COLLATE utf8_general_ci;
use asesoriaspar;


CREATE TABLE IF NOT EXISTS rol(
	PK_rol_id INT AUTO_INCREMENT PRIMARY KEY,
	rol_nombre varchar(50) NOT NULL UNIQUE
);


CREATE TABLE IF NOT EXISTS usuario(
	PK_usu_id		INT AUTO_INCREMENT PRIMARY KEY,
	usu_username	varchar(200) not null unique,
	usu_password 	varchar(200) not null,
	usu_correo 		varchar(200) not null unique,
	usu_status 		TINYINT NOT NULL DEFAULT 1, -- 0 = Inactivo, 1 = Activo
	usu_registro 	TIMESTAMP,
	
	-- Foraneas
	FK_rol int not null, FOREIGN KEY (FK_Rol) REFERENCES rol(PK_rol_id) ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS carrera (
	PK_ca_id 	INT AUTO_INCREMENT PRIMARY KEY,
	ca_nombre 	VARCHAR(100) NOT NULL,
	ca_nomAbre	VARCHAR(10)
);



CREATE TABLE IF NOT EXISTS dia(
	PK_dia_id 		INT AUTO_INCREMENT PRIMARY KEY,
	dia_nombre 	varchar(100) NOT NULL
);



CREATE TABLE IF NOT EXISTS materia(
	PK_mat_id 		INT AUTO_INCREMENT PRIMARY KEY,
	mat_nombre 		varchar(100) NOT NULL,
	mat_Semestre 	int NOT NULL,

	-- Foranea	
	FK_mat_carrera INT, FOREIGN KEY (FK_mat_carrera) REFERENCES carrera(PK_ca_id) ON UPDATE CASCADE
);



CREATE TABLE IF NOT EXISTS estudiante(
	PK_est_id		INT AUTO_INCREMENT PRIMARY KEY,
	est_idItson 	varchar(20) NOT NULL unique,
	est_nombre 		varchar(50) NOT NULL,
	est_apellido 	varchar(50) NOT NULL,
	est_telefono 	varchar(30),
	est_facebook 	varchar(30),
	est_avatar 		varchar(30),
	est_ReqValidar	TINYINT NOT NULL DEFAULT 0, -- 0 = NO, 1 = SI
	
	-- llaves foraneas
	FK_usuario int not null unique,
	FOREIGN KEY (FK_usuario) REFERENCES usuario(PK_usu_id) ON UPDATE CASCADE,
	FK_carrera int not null,
	FOREIGN KEY (FK_carrera) REFERENCES carrera(PK_ca_id) ON UPDATE CASCADE
);


-- TABLAS DE HORARIO Y ASESORIAS


CREATE TABLE IF NOT EXISTS horario(
	PK_horario_id 	INT AUTO_INCREMENT PRIMARY KEY,
	horario_fecha 	TIME not null,
	
	-- Foranea
	FK_dia INT not null,
	FOREIGN KEY (FK_dia) REFERENCES dia(PK_dia_id) ON UPDATE CASCADE,
	FK_asesor INT not null,
	FOREIGN KEY (FK_asesor) REFERENCES estudiante(PK_est_id) ON UPDATE CASCADE
);




CREATE TABLE IF NOT EXISTS asesor_materia(
	IDasesor_materia 	INT AUTO_INCREMENT PRIMARY KEY,
	Aprobado 			TINYINT NOT NULL DEFAULT 0, -- 0 = NO, 1 = SI
	
	-- Foranea	
	Asesor int not null,
	FOREIGN KEY (Asesor) REFERENCES estudiante(PK_est_id) ON UPDATE CASCADE,
	Materia int not null,
	FOREIGN KEY (Materia) REFERENCES materia(PK_mat_id) ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS asesoria(
	PK_asesoria_id 	INT AUTO_INCREMENT PRIMARY KEY,
	-- Cuando se solicita
	Fecha 			DATE NOT NULL,
	Descripcion 	text,
	
	-- Automaticos para primer registro
	FechaRegistro	TIMESTAMP not null,
	Estado 			TINYINT NOT NULL DEFAULT 0, -- 0 = Pendiente, 1 = Cancelado, 2 = Realizado
	
	-- Foranea	
	Alumno INT not null, 
	FOREIGN KEY (Alumno) REFERENCES estudiante(PK_est_id) ON UPDATE CASCADE,
	Horario int NOT NULL,
	FOREIGN KEY (Horario) REFERENCES horario(PK_horario_id) ON UPDATE CASCADE,
	Asesor_Materia INT not null, 
	FOREIGN KEY (Asesor_Materia) REFERENCES asesor_materia(IDasesor_materia) ON UPDATE CASCADE
);


	-- Cuando se valida asesoria
CREATE TABLE IF NOT EXISTS validacion(
	IDvalidacion 	INT AUTO_INCREMENT PRIMARY KEY,
	Comentario 		text not null,
	Calificacion 	int not null, -- 0 a 5
	
	-- Foraneo
	Asesoria int NOT NULL,
	FOREIGN KEY (Asesoria) REFERENCES asesoria(PK_asesoria_id) ON UPDATE CASCADE
	
);