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



SELECT * FROM estudiante e
INNER JOIN carrera c ON e.Carrera = c.IDcarrera



SELECT * FROM estudiante;
SELECT * FROM materia;


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


INSERT INTO asesor_materia(Asesor, Materia) VALUES (1, 1);


-- ----- HORARIO
IDHorario
ASesor FK usuario
Fecha

-- dias
IDdia
Hora
IDHorario FK HORARIO

-- asesor_materia
IDam
Materia
IDHorario FK HORARIO



SELECT * FROM asesor_materia where Asesor = 2;
SELECT * FROM horario where Asesor = 1;
SELECT * FROM asesor_materia;







SELECT * FROM estudiante e
INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
INNER JOIN usuario u ON e.FK_usuario = u.PK_usu_id;

