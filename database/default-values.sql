-- ----------------------------
-- DATOS DEFAULT
-- ----------------------------

INSERT INTO rol(rol_nombre) VALUES
('Administrador'),
('Estudiante');


INSERT INTO carrera(carrera_nombre, abreviacion) VALUES 
('Ingenieria en Software', 'ISW'),
('Ingenieria en Mecatronica', 'IMT');


INSERT INTO dia(dia_nombre) VALUES
('Lunes'),
('Martes'),
('Miercoles'),
('Jueves'),
('Viernes');


INSERT INTO materia(materia_nombre,semestre,carrera) VALUES
('Progra',		1,	1),
('Progra 2',	2, 1),
('SO',			2, 1),
('APDS',			3, 1),
('Diseño',		4, 1),
('Quimica',		1, 2),
('Materiales',	2, 2),
('Fluidos',		3, 2);


INSERT INTO usuario(username, password, correo, rol) VALUES
('root',		md5('root'),				'carlosrozuma@gmail.com', 		1),
('charly',	md5('freedom'),			'c_01_12@gmail.com', 			2),
('noriega',	md5('randoming'),			'cnoriegacazarez@gmail.com', 	2),
('lao',		md5('bobesponja2040'),	'enrikegl96@gmail.com', 		2);



INSERT INTO estudiante(IDestudiante, itsonID,Nombre,Apellido,Telefono,Facebook,Avatar,Carrera) VALUES 
(2,'00000162156','Carlos','Zuñiga',	 '644', 'fb', 'av1', 1),
(3,'00000126079','Carlos','Noriega', '644', 'fb', 'av2', 1),
(4,'00000133494','Enrique','Garcia', '644', 'fb', 'av3', 1);



-- ----------------------------
-- DATOS A PROBAR
-- ----------------------------

INSERT INTO horario(Hora, Dia, Asesor) VALUES
('08:00:00', 1,1),
('09:00:00', 1,1),
('13:00:00', 1,1),
('15:00:00', 1,1),
('08:00:00', 3,1),
('09:00:00', 3,1),
('13:00:00', 3,1),
('15:00:00', 3,1),
('08:00:00', 5,1),
('09:00:00', 5,1),
('13:00:00', 5,1),
('15:00:00', 5,1);

SELECT h.IDhorario, d.Dia, h.Hora, e.Nombre FROM horario h
INNER JOIN Dia d ON h.Dia = d.IDdia
INNER JOIN estudiante e ON h.Asesor = e.IDestudiante;


-- SELECT * FROM estudiante;
-- SELECT * FROM dia;


INSERT INTO asesor_materia(Asesor, Materia) VALUES
(1,1),
(1,2),
(1,3),
(1,4);


SELECT * FROM materia;
SELECT * FROM estudiante;


INSERT INTO asesoria(Fecha,Descripcion,Alumno,Horario,Asesor_Materia) VALUES
-- YYYY-MM-DD
('2017-02-05','Es sobre los arreglos', , ,),
('2017-02-05','Es sobre los arreglos', , ,),
('2017-02-05','Es sobre los arreglos', , ,),
('2017-02-05','Es sobre los arreglos', , ,),







-- Obtener Asesores, Sus horarios y materias registradas
SELECT am.IDasesor_materia, e.IDestudiante, e.Nombre, e.Apellido, m.Materia as 'Materia' FROM asesor_materia am
INNER JOIN estudiante e ON am.Asesor = e.IDestudiante
INNER JOIN materia m ON am.Materia = m.IDmateria
ORDER BY e.IDestudiante ASC;


SELECT am.IDasesor_materia, e.IDestudiante, e.Nombre, e.Apellido, m.Materia as 'Materia' FROM asesor_materia am
INNER JOIN estudiante e ON am.Asesor = e.IDestudiante
INNER JOIN materia m ON am.Materia = m.IDmateria
ORDER BY e.IDestudiante ASC;


SELECT * FROM materia m
INNER JOIN carrera c ON  m.Carrera = c.IDcarrera;


SELECT * FROM materia m INNER JOIN carrera c ON m.Carrera = c.IDcarrera
WHERE c.IDcarrera = 1;


SELECT * FROM estudiante e INNER JOIN carrera c ON e.Carrera = c.IDcarrera

SELECT * FROM materia m INNER JOIN carrera c ON m.Carrera = c.IDcarrera 
WHERE m.IDmateria = 1;