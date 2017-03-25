-- ----------------------------
-- DATOS DEFAULT
-- ----------------------------


INSERT INTO carrera(carrera, abreviacion) VALUES 
('Ingenieria en Software', 'ISW'),
('Ingenieria en Mecatronica', 'IMT');

-- INSERT INTO rol(nombre) VALUES
-- ('Administrador'),
-- ('Estudiante');

-- INSERT INTO rol(nombre) VALUES
-- ('Asesor'),
-- ('Alumno');

INSERT INTO dia(dia) VALUES
('Lunes'),
('Martes'),
('Miercoles'),
('Jueves'),
('Viernes');


INSERT INTO materia(materia,semestre,carrera) VALUES
('Progra',		1,	1),
('Progra 2',	2, 1),
('SO',			2, 1),
('APDS',			3, 1),
('Diseño',		4, 1),
('Quimica',		1, 2),
('Materiales',	2, 2),
('Fluidos',		3, 2);

-- SELECT * FROM carrera;


INSERT INTO administrador(username, contrasenia, correo) VALUES
('root','root1','carlosrozuma@gmail.com');


INSERT INTO estudiante(itsonID,Nombre,Apellido,password,Telefono,Correo,Facebook,Carrera) VALUES 
('00000162156','Carlos','Zuñiga',md5('freedom'),'6441211988','c_01_12@gmail.com','charlyronin', 1),
('00000126079','Carlos','Noriega',md5('randoming'),'6442306790','cnoriegacazarez@gmail.com','carloswer', 1),
('00000133494','Jose Enrique','Garcia Lao',md5('bobesponja2040'),'6441432736','enrikegl96@gmail.com','', 1);



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