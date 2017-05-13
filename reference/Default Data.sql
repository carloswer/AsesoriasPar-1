-- ----------------------------
-- DATOS DEFAULT
-- ----------------------------

INSERT INTO rol(rol_nombre) VALUES
('Administrador'),
('Estudiante');


INSERT INTO carrera(ca_nombre, ca_nomAbre) VALUES 
('Ingenieria en Software', 'ISW'),
('Ingenieria en Mecatronica', 'IMT');


INSERT INTO dia(dia_nombre) VALUES
('Lunes'),
('Martes'),
('Miercoles'),
('Jueves'),
('Viernes');

INSERT INTO hora(hora) VALUES
('08:00:00'),
('09:00:00'),
('10:00:00'),
('11:00:00'),
('12:00:00'),
('13:00:00'),
('14:00:00'),
('15:00:00'),
('16:00:00'),
('17:00:00'),
('18:00:00');


-- TODO: no crear ciclos empalmados
INSERT INTO ciclo(ciclo_inicio, ciclo_fin) VALUES
('2017/01/10', '2017/05/19');



INSERT INTO materia(mat_nombre, mat_semestre, FK_mat_carrera) VALUES
('Progra',		1,	1),
('Progra 2',	2, 1),
('SO',			2, 1),
('APDS',			3, 1),
('Diseño',		4, 1),
('Quimica',		1, 2),
('Materiales',	2, 2),
('Fluidos',		3, 2);


INSERT INTO usuario(usu_username, usu_password, usu_correo, FK_rol) VALUES
('root',		md5('root'),				'carlosrozuma@gmail.com', 		1),
('charly',	md5('freedom'),			'c_01_12@gmail.com', 			2),
('noriega',	md5('randoming'),			'cnoriegacazarez@gmail.com', 	2),
('lao',		md5('bobesponja2040'),	'enrikegl96@gmail.com', 		2);



INSERT INTO estudiante(est_idItson, est_nombre, est_apellido, est_telefono, est_facebook, est_avatar, FK_usuario, FK_carrera) VALUES 
('00000162156', 'Carlos','Zuñiga',	'644', 'fb', 'av1', 2, 1),
('00000126079', 'Carlos','Noriega',	'644', 'fb', 'av2', 3, 1),
('00000133494', 'Enrique','Garcia',	'644', 'fb', 'av3', 4, 1);



-- ----------------------------
-- HORARIO Y MATERIAS
-- ----------------------------

INSERT INTO horario(FK_asesor, FK_ciclo) VALUES
(1, 1);


INSERT INTO dia_hora(FK_horario, FK_dia, FK_hora) VALUES
-- -----Lunes 1, Martes 2, Miercoles 3, Jueves 4, Viernes 5
-- -----8:00 1, 9:00 2, 10:00 3, 11:00 4, 12:00 5, 1:00 6, 2:00 7, 3:00 8, 4:00 9, 5:00 10, 6:00 11
-- Lunes
(1, 1, 1),
(1, 1, 2),
(1, 1, 5),
(1, 1, 8),
-- Miercoles
(1, 3, 1),
(1, 3, 2),
(1, 3, 5),
(1, 3, 8),
-- Viernes
(1, 5, 1),
(1, 5, 2),
(1, 5, 5),
(1, 5, 8);




-- ---------DIDN'T TESTED
INSERT INTO horario_materia(FK_horario, FK_materia) VALUES
(1,1),
(1,2),
(1,3),
(1,4);


INSERT INTO asesoria(Fecha,Descripcion,Alumno,Horario,Asesor_Materia) VALUES
-- YYYY-MM-DD
('2017-02-05','Es sobre los arreglos', , ,),
('2017-02-05','Es sobre los arreglos', , ,),
('2017-02-05','Es sobre los arreglos', , ,),
('2017-02-05','Es sobre los arreglos', , ,),
