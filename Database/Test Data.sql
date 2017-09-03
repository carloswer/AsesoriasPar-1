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

-- SELECT * FROM horario;

INSERT INTO horario_dia_hora(FK_horario, FK_dia_hora) VALUES
-- Lunes
(1, 1),
(1, 5),
(1, 7),
(1, 20);

-- SELECT * FROM horario_dia_hora;

INSERT INTO horario_materia(FK_horario, FK_materia) VALUES
(1,1),
(1,2),
(1,3),
(1,4);

-- SELECT * FROM horario_materia;


-- ----------------------------
-- ASESORIAS Y VALIDACIONES
-- ----------------------------

INSERT INTO asesoria(fecha, hora, descripcion, FK_alumno, FK_asesor, FK_materia) VALUES
-- YYYY-MM-DD, HH:ii:mm
-- ('2017-08-22', '10:00:00', 'ESTA ES LA DESCRIPCION', 3, 1, 3);
-- ('2017-08-21', '08:00:00', 'ESTA ES LA DESCRIPCION', 2, 1, 3);
('2017-09-01', '14:00:00', 'ESTA ES LA DESCRIPCION', 1, 2, 6);
SELECT * FROM horario_materia;



-- --- VALIDANDO
INSERT INTO estado_asesoria(tipo, comentario, FK_asesoria) VALUES
(3, 'Ya le entendi jeje', 2);


