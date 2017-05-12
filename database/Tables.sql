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
	ca_nomAbre	VARCHAR(10) unique
);


CREATE TABLE IF NOT EXISTS hora(
	PK_hora_id	INT AUTO_INCREMENT PRIMARY KEY,
	hora			TIME not null unique
);


CREATE TABLE IF NOT EXISTS dia(
	PK_dia_id 	INT AUTO_INCREMENT PRIMARY KEY,
	dia_nombre 	varchar(100) NOT NULL unique
);


CREATE TABLE IF NOT EXISTS ciclo(
	PK_ciclo_id	 INT AUTO_INCREMENT PRIMARY KEY,
	ciclo_inicio DATE not null,
	ciclo_fin	 DATE not null
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
	PK_horario_id 		INT AUTO_INCREMENT PRIMARY KEY,
	horario_registro 	TIMESTAMP not null,
	
	-- Foranea

	FK_asesor INT not null,
	FOREIGN KEY (FK_asesor) REFERENCES estudiante(PK_est_id) ON UPDATE CASCADE,
	FK_ciclo INT not null,
	FOREIGN KEY (FK_ciclo) REFERENCES ciclo(PK_ciclo_id) ON UPDATE CASCADE
);



CREATE TABLE IF NOT EXISTS dia_hora(
	PK_dia_hora	INT AUTO_INCREMENT PRIMARY KEY,
	
	FK_horario int not null,
	FOREIGN KEY (FK_horario) REFERENCES horario(PK_horario_id) ON UPDATE CASCADE,
	
	FK_hora int not null,
	FOREIGN KEY (FK_hora) REFERENCES hora(PK_hora_id) ON UPDATE CASCADE,
	FK_dia int not null,
	FOREIGN KEY (FK_dia) REFERENCES dia(PK_dia_id) ON UPDATE CASCADE
);




CREATE TABLE IF NOT EXISTS asesor_materia(
	PK_ase_mat_id		INT AUTO_INCREMENT PRIMARY KEY,
	ase_mat_aprobado 	TINYINT NOT NULL DEFAULT 0, -- 0 = NO, 1 = SI
	
	-- Foranea	
	FK_asesor int not null,
	FOREIGN KEY (FK_asesor) REFERENCES estudiante(PK_est_id) ON UPDATE CASCADE,
	FK_materia int not null,
	FOREIGN KEY (FK_materia) REFERENCES materia(PK_mat_id) ON UPDATE CASCADE
);



CREATE TABLE IF NOT EXISTS asesoria(
	PK_asesoria_id 	INT AUTO_INCREMENT PRIMARY KEY,
	-- Cuando se solicita
	asesoria_fecha		DATE NOT NULL,
	asesoria_desc 		text,
	
	-- Automaticos para primer registro
	asesoria_registro	TIMESTAMP not null,
	asesoria_estado 	TINYINT NOT NULL DEFAULT 0, -- 0 = Pendiente, 1 = Cancelado, 2 = Realizado
	
	-- Foranea	
	FK_alumno INT not null, 
	FOREIGN KEY (FK_alumno) REFERENCES estudiante(PK_est_id) ON UPDATE CASCADE,
	FK_horario int NOT NULL,
	FOREIGN KEY (FK_horario) REFERENCES horario(PK_horario_id) ON UPDATE CASCADE,
	FK_asesor_materia INT not null, 
	FOREIGN KEY (FK_asesor_materia) REFERENCES asesor_materia(PK_ase_mat_id) ON UPDATE CASCADE
);


	-- Cuando se valida asesoria
CREATE TABLE IF NOT EXISTS validacion(
	PK_val_id 		INT AUTO_INCREMENT PRIMARY KEY,
	val_comentario	text not null,
	val_califacion	int not null, -- 0 a 5
	
	-- Foraneo
	FK_asesoria int NOT NULL,
	FOREIGN KEY (FK_asesoria) REFERENCES asesoria(PK_asesoria_id) ON UPDATE CASCADE
	
);