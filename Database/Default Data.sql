-- ----------------------------
-- DATOS DEFAULT
-- ----------------------------

INSERT INTO rol(nombre) VALUES
('administrador'),
('estudiante');



-- ----------------------------
-- USUARIOS
-- ----------------------------

INSERT INTO usuario(nombre_usuario, password, correo, FK_rol) VALUES
('root', md5('root'), 'c_01_12@hotmail.com', 1);




START TRANSACTION;
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '8:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '9:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '10:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '11:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '13:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '14:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '15:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '16:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '17:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '18:00:00', 'Lunes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '8:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '9:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '10:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '11:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '13:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '14:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '15:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '16:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '17:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '18:00:00', 'Martes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '8:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '9:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '10:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '11:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '13:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '14:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '15:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '16:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '17:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '18:00:00', 'Miercoles');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '8:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '9:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '10:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '11:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '13:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '14:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '15:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '16:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '17:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '18:00:00', 'Jueves');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '8:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '9:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '10:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '11:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '13:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '14:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '15:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '16:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '17:00:00', 'Viernes');
INSERT INTO dia_hora (PK_id, hora, dia) VALUES (DEFAULT, '18:00:00', 'Viernes');

COMMIT;




