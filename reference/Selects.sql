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






-- ---------------------------------------------
-- NUEVO QUERIES
-- ---------------------------------------------


-- Login
SELECT * FROM usuario u
WHERE (u.usu_correo = 'carlosrozuma@gmail.m'
OR u.usu_username = 'charly')
AND u.usu_password = md5('freedom');


-- Obtener ID y carrera de estudiante si lo es
SELECT e.PK_est_id, c.ca_nombre FROM estudiante e
INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
WHERE e.FK_usuario = 2;




-- --------Obtener estudiantes
SELECT * FROM estudiante e
INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id;

-- --------Obtener estudiantes por ID
SELECT * FROM estudiante e
INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
WHERE e.PK_est_id = 1;

-- --------Obtener estudiantes por carrera
SELECT * FROM estudiante e 
INNER JOIN carrera c ON e.FK_carrera = c.PK_ca_id
WHERE c.PK_ca_id = 2;


-- --------Comprobar si Estudiante tiene un horario
-- fecha actual
SELECT DATE(NOW());

-- ciclo actual
SELECT PK_ciclo_id, ciclo_inicio, ciclo_fin
FROM  ciclo
WHERE DATE(NOW()) BETWEEN ciclo_inicio AND ciclo_fin;
-- WHERE DATE(NOW()) BETWEEN '2017/01/17' AND '2017/05/17';



-- Horario de ciclo actual
SELECT h.PK_horario_id, c.ciclo_inicio, c.ciclo_fin FROM horario h
INNER JOIN ciclo c ON c.PK_ciclo_id = h.FK_ciclo
-- WHERE (DATE(NOW()) >= c.ciclo_inicio AND DATE(NOW()) <= c.ciclo_fin);
WHERE DATE(NOW()) BETWEEN c.ciclo_inicio AND c.ciclo_fin;


-- --------Obtiene horas y dias
SELECT PK_dia_id as 'id', dia_nombre as 'dia' FROM dia order by id;
SELECT PK_hora_id as 'id', hora FROM hora order by PK_hora_id;


-- --------Obtener horario de Asesor y el ciclo
SELECT PK_est_id FROM estudiante e
WHERE e.FK_usuario = 2;



-- -----TODO: CREAR SUBCONSULTAS PARA OBTENER primero los horarios del ciclo actual
-- -----Despues del asesor
SELECT e.PK_est_id as 'ID Estudiante',
			CONCAT( e.est_nombre, ' ', e.est_apellido ) as Nombre,
			c.ciclo_inicio as 'Ciclo Inicio',
			c.ciclo_fin as 'Ciclo Fin',
			d.dia_nombre as 'Dia',
			hora.hora as 'Hora'
FROM horario h
INNER JOIN estudiante e ON e.PK_est_id = h.FK_asesor
INNER JOIN dia_hora dh ON dh.FK_horario = h.PK_horario_id
INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
INNER JOIN hora ON hora.PK_hora_id = dh.PK_dia_hora
INNER JOIN ciclo c ON c.PK_ciclo_id = h.FK_ciclo
WHERE (DATE(NOW()) BETWEEN c.ciclo_inicio AND c.ciclo_fin) 
	AND e.PK_est_id = 1;



SELECT 
	CONCAT(e.est_nombre, ' ', e.est_apellido) as 'Nombre',
	h.PK_horario_id as 'IDHorario',
	c.ciclo_inicio as 'Inicio',
	c.ciclo_fin as 'fin',
	dh.PK_dia_hora as 'dia_hora ID',
	d.dia_nombre as 'dia',
	t.hora as 'hora'
FROM estudiante e
INNER JOIN horario h ON h.FK_asesor = e.PK_est_id
INNER JOIN ciclo c ON c.PK_ciclo_id = h.FK_ciclo
INNER JOIN dia_hora dh ON dh.FK_horario = h.PK_horario_id
INNER JOIN hora t ON t.PK_hora_id = dh.FK_hora
INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
 WHERE e.PK_est_id = 2;
 
 
 
SELECT * FROM horario;
SELECT MAX(PK_horario_id) as id FROM horario;
SELECT PK_horario_id as id FROM horario ORDER BY PK_horario_id desc LIMIT 1;
SELECT * FROM dia_hora;
SELECT * FROM horario_materia;



DELETE FROM horario_materia;
DELETE FROM dia_hora;
DELETE FROM horario;
