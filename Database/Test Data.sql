INSERT INTO carrera(nombre, abreviacion) VALUES 
('Ingenieria en Software', 'ISW'),
('Ingenieria en Mecatronica', 'IMT');

-- ----------------------------
-- ESTUDIANTE
-- ----------------------------
INSERT INTO usuario(nombre_usuario, password, correo, FK_rol) VALUES
('charly',	md5('freedom'),			'carlosrozuma@gmail.com',		2),
('noriega',	md5('randoming'),		'cnoriegacazarez@gmail.com', 	2),
('lao',		md5('bobesponja2040'),	'enrikegl96@gmail.com', 		2);


INSERT INTO estudiante(id_itson, nombre, apellido, telefono, facebook, avatar, FK_usuario, FK_carrera) VALUES 
('00000162156', 'Carlos','Zuñiga',	'644', 'fb', 'avatar', 2, 1),
('00000126079', 'Carlos','Noriega',	'644', 'fb', 'avatar', 3, 1),
('00000133494', 'Enrique','Garcia',	'644', 'fb', 'avaar',  4, 1);

-- TODO: no crear periodos empalmados
INSERT INTO ciclo(fecha_inicio, fecha_fin) VALUES
('2016/01/10', '2016/05/19'), -- Pasado
('2017/01/10', '2017/05/19'), -- Pasado
('2017/08/01', '2017/12/01');
-- aaaa/mm/dd


-- ----------------------------
-- HORARIO Y MATERIAS
-- ----------------------------


INSERT INTO horario(FK_estudiante, FK_ciclo) VALUES
(1, 3);


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


INSERT INTO horario_materia(FK_horario, FK_materia) VALUES
(1,1),
(1,2),
(1,3),
(1,4);


-- ---------DIDN'T TESTED
INSERT INTO asesoria(asesoria_fecha, asesoria_descripcion, FK_alumno, FK_dia_hora, FK_materia) VALUES
-- YYYY-MM-DD
-- ('2017-08-20','ESTA ES LA DESCRIPCION', 1, 7, 2),
('2017-08-21','ESTA ES LA DESCRIPCION', 2, 1, 3);


-- --- VALIDANDO
INSERT INTO estado_asesoria(val_tipo, val_comentario, FK_asesoria) VALUES
(2, 'Ya le entendi jeje', 2);
