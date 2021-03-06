
-- ----------------
-- TABLAS
-- ----------------

-- show engines;
DROP DATABASE asesoriaspar;
CREATE DATABASE IF NOT EXISTS asesoriaspar CHARACTER SET utf8 COLLATE utf8_general_ci;
use asesoriaspar;



CREATE TABLE IF NOT EXISTS rol(
	PK_id 	BIGINT AUTO_INCREMENT PRIMARY KEY,
	nombre 	VARCHAR(50) NOT NULL UNIQUE
);


CREATE TABLE IF NOT EXISTS usuario(
	PK_id					BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre_usuario		VARCHAR(200) NOT NULL UNIQUE,
	password 			VARCHAR(200) NOT NULL,
	correo 				VARCHAR(200) NOT NULL UNIQUE,
	fecha_registro 	TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	estado				TINYINT NOT NULL DEFAULT 1, -- '0 = Inactivo, 1 = Activo,
	
	-- Foraneas
	FK_rol BIGINT NOT NULL,
	FOREIGN KEY (FK_rol) REFERENCES rol(PK_id) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS carrera (
	PK_id 			BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre 			VARCHAR(100) NOT NULL UNIQUE,
	abreviacion		VARCHAR(10) UNIQUE,
	estado			TINYINT NOT NULL DEFAULT 1, -- 0 OFF, 1 ON
	fecha_registro TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS ciclo(
	PK_id	 			INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fecha_inicio 	DATE NOT NULL,
	fecha_fin	 	DATE NOT NULL,
	fecha_registro TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);




CREATE TABLE IF NOT EXISTS materia(
	PK_id 			BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre 			VARCHAR(200) NOT NULL,
	abreviacion   	VARCHAR(10),
	descripcion		TEXT,
	semestre 		INT NOT NULL,
	plan				VARCHAR(4) NOT NULL,
	fecha_registro TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	estado			TINYINT NOT NULL DEFAULT 1, -- '0 = Inactivo, 1 = Activo,

	-- Foranea	
	FK_carrera BIGINT NOT NULL,
	FOREIGN KEY (FK_carrera) REFERENCES carrera(PK_id) ON UPDATE CASCADE ON DELETE CASCADE
);



CREATE TABLE IF NOT EXISTS estudiante(
	PK_id 				BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_itson 			VARCHAR(45) NOT NULL,
	nombre 				VARCHAR(100) NOT NULL,
	apellido 			VARCHAR(100) NOT NULL,
	telefono 			VARCHAR(45) NULL,
	avatar 				VARCHAR(255) NULL,
	facebook 			VARCHAR(45) NULL,
	fecha_registro 	TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	
	requiere_validar 	TINYINT NOT NULL DEFAULT 1, -- '0 = No, 1 = SI
	estado				TINYINT NOT NULL DEFAULT 1, -- '0 = Inactivo, 1 = Activo,
	
	-- llaves foraneas
	FK_usuario BIGINT NOT NULL UNIQUE,
	FOREIGN KEY (FK_usuario) REFERENCES usuario(PK_id) ON UPDATE CASCADE ON DELETE CASCADE,
	FK_carrera BIGINT NOT NULL,
	FOREIGN KEY (FK_carrera) REFERENCES carrera(PK_id) ON UPDATE CASCADE ON DELETE CASCADE
);




CREATE TABLE IF NOT EXISTS dia_hora (
  PK_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  hora 	TIME NOT NULL,
  dia 	VARCHAR(20) NOT NULL
);


CREATE TABLE IF NOT EXISTS horario(
	PK_id 			BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	validado			TINYINT NOT NULL DEFAULT 0, -- '0 = No, 1 = SI',
	estado			TINYINT NOT NULL DEFAULT 1, -- '0 = Inactivo, 1 = Activo,
	
	-- Foranea
	FK_estudiante 	BIGINT NOT NULL,
	FOREIGN KEY (FK_estudiante) REFERENCES estudiante(PK_id) ON UPDATE CASCADE ON DELETE CASCADE,
	FK_ciclo 		INT NOT NULL,
	FOREIGN KEY (FK_ciclo) REFERENCES ciclo(PK_id) ON UPDATE CASCADE ON DELETE CASCADE
);



CREATE TABLE IF NOT EXISTS horario_dia_hora(
	PK_id 	BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	estado	TINYINT NOT NULL DEFAULT 1, -- '0 = Inactivo, 1 = Activo,

	-- Foreaneas
	FK_dia_hora INT NOT NULL,
	FOREIGN KEY (FK_dia_hora) REFERENCES dia_hora(PK_id) ON UPDATE CASCADE ON DELETE CASCADE,
	FK_horario BIGINT NOT NULL,
	FOREIGN KEY (FK_horario) REFERENCES horario(PK_id) ON UPDATE CASCADE ON DELETE CASCADE
);




CREATE TABLE IF NOT EXISTS horario_materia(
	PK_id				BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	aprobado 		TINYINT NOT NULL DEFAULT 0 COMMENT '0 = NO, 1 = SI',
	fecha_registro TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	estado			TINYINT NOT NULL DEFAULT 1, -- '0 = Inactivo, 1 = Activo,
	
	-- Foranea	
	FK_horario BIGINT NOT NULL,
	FOREIGN KEY (FK_horario) REFERENCES horario(PK_id) ON UPDATE CASCADE ON DELETE CASCADE,
	FK_materia BIGINT NOT NULL,
	FOREIGN KEY (FK_materia) REFERENCES materia(PK_id) ON UPDATE CASCADE ON DELETE CASCADE
);



CREATE TABLE IF NOT EXISTS asesoria(
	PK_id 			BIGINT AUTO_INCREMENT PRIMARY KEY,
	-- Cuando se solicita
	fecha				DATE NOT NULL,
	hora 				TIME NOT NULL,
	descripcion		TEXT NOT NULL,
	
	-- Automaticos para primer registro
	fecha_solicitud		TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
-- 	estado_asesoria	TINYINT NOT NULL DEFAULT 1, -- 0 = cancelada, 1 = activa, 2 = pendiente validacion, 3 = validada
	
	-- Foranea	
	FK_alumno 	BIGINT NOT NULL, 
	FOREIGN KEY (FK_alumno) REFERENCES estudiante(PK_id) ON UPDATE CASCADE ON DELETE CASCADE,
	FK_asesor 	BIGINT NOT NULL, 
	FOREIGN KEY (FK_asesor) REFERENCES estudiante(PK_id) ON UPDATE CASCADE ON DELETE CASCADE,
	FK_materia 	BIGINT NOT NULL,
	FOREIGN KEY (FK_materia) REFERENCES horario_materia(PK_id) ON UPDATE CASCADE ON DELETE CASCADE
);


-- Cuando se valida asesoria (Realizado o No realizado)
CREATE TABLE IF NOT EXISTS estado_asesoria(
	PK_id 				BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tipo					VARCHAR(30) NOT NULL, -- Proximo, No validado, Validado: Cancelado / Realizado / No realizado

	-- Realizado | No realizado
	comentario			TEXT NOT NULL,
	fecha_validacon	TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- fecha validacion

	-- Realizado
	calificacion_asesor	TINYINT, -- 0 a 5
	tiempo				TIME, 
	
	-- Foraneo
	FK_asesoria BIGINT NOT NULL,
	FOREIGN KEY (FK_asesoria) REFERENCES asesoria(PK_id) ON UPDATE CASCADE ON DELETE CASCADE
);