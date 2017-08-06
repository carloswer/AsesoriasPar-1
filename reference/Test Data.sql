-- ----------------------------
-- HORARIO Y MATERIAS
-- ----------------------------


INSERT INTO horario(FK_asesor, FK_ciclo) VALUES
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

INSERT INTO asesoria(asesoria_fecha, asesoria_desc, FK_alumno, FK_dia_hora, FK_materia) VALUES
-- YYYY-MM-DD
('2017-02-05','Es sobre los arreglos', 3, 1, 2);

----- VALIDANDO
INSERT INTO estado_asesoria(val_tipo, val_comentario, FK_asesoria) VALUES
(2, 'Ya le entendi jeje', 5);

