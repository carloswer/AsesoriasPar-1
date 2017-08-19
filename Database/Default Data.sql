USE asesoriaspar;

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




-- ----------------------------
-- MATERIAS
-- ----------------------------
START TRANSACTION;
INSERT INTO materia(nombre, abreviacion, semestre, plan, FK_carrera, descripcion) VALUES
('Programación 1','P1', 1,	'2009', 1,'DESCRIPCION'),
('Calculo 1','cal1', 1,	'2009', 1,'DESCRIPCION'),
('Matemáticas discretas','MatDis', 1,	'2009', 1, 'DESCRIPCION'),
('Arquitectura de computadoras',	'arqComp', 1,	'2009', 1,'DESCRIPCION'),
('Ingeniería de software',	'ingSoft', 1,	'2009', 1,'DESCRIPCION'),

('Cálculo 2',	'cal2', 2,	'2009', 1,'DESCRIPCION'),
('Programación 2','P2', 2,	'2009', 1,'DESCRIPCION'),
('Matemáticas computacionales',	'matComp', 2,	'2009', 1,'DESCRIPCION'),
('Sistemas operativos',	'SO', 2,	'2009', 1,'DESCRIPCION'),
('Análisis de sistema',	'anSis', 2,	'2009', 1,'DESCRIPCION'),
('Administración',	'admin', 2,	'2009', 1,'DESCRIPCION'),

('Probabilidad y estadistica','PE', 3,	'2009', 1,'DESCRIPCION'),
('Algebra lineal basica',	'ALB', 3,	'2009', 1,'DESCRIPCION'),
('Base de datos 1',	'BD1', 3,	'2009', 1,'DESCRIPCION'),
('Estructuras de datos',	'ED', 3,	'2009', 1,'DESCRIPCION'),
('Analisis y modelado de software',	'AMOS', 3,	'2009', 1,'DESCRIPCION'),
('Administracion de proyectos',	'AP', 3,	'2009', 1,'DESCRIPCION'),

('Programación 3','P3', 4,	'2009', 1,'DESCRIPCION'),
('Diseño I','Dis1', 4,	'2009', 1,'DESCRIPCION'),
('Administracion de Proyectos de software I', 'APDS I', 4,	'2009', 1,'DESCRIPCION'),
('Evaluación de proyectos de software',	'EvPS', 4,	'2009', 1,'DESCRIPCION'),

('Métodos numéricos computacionales',	'MN', 5,	'2009', 1,'DESCRIPCION'),
('Base de datos 2',	'BD2', 5,	'2009', 1,'DESCRIPCION'),
('Pruebas de software',	'Pruebas', 5,	'2009', 1,'DESCRIPCION'),
('Fundamentos de redes',	'Redes', 5,	'2009', 1,'DESCRIPCION'),
('Diseño de software 2',	'DS2', 5,	'2009', 1,'DESCRIPCION'),
('Administración de proyectos de software 2',	'APDS2', 5,	'2009', 1,'DESCRIPCION'),

('Optativa 1',	'Opta1', 6,	'2009', 1,'DESCRIPCION'),
('Aplicaciones web',	'ApWeb', 6,	'2009', 1,'DESCRIPCION'),
('Seguridad informatica',	'SegI', 6,	'2009', 1,'DESCRIPCION'),
('Diseño de sistemas iteractivos',	'DSI', 6,	'2009', 1,'DESCRIPCION'),
('Tecnologias de informacion en los negocios',	'TIN', 6,	'2009', 1,'DESCRIPCION'),
('Calidad de software',	'CalSoft', 6,	'2009', 1,'DESCRIPCION'),

('Optativa 2',	'Opta2', 7,	'2009', 1,'DESCRIPCION'),
('Optativa 3',	'Opta3', 7,	'2009', 1,'DESCRIPCION'),
('Sistemas distribuidos',	'SD', 7,	'2009', 1,'DESCRIPCION'),
('Práctica profesional 3',	'PP3', 7,	'2009', 1,'DESCRIPCION'),
('Diseño y desarrollo de aplicaciones empresariales',	'DisDesAP', 7,	'2009', 1,'DESCRIPCION'),

('Optativa 4',	'Opta4', 8,	'2009', 1,'DESCRIPCION'),
('Optativa 5',	'Opta5', 8,	'2009', 1,'DESCRIPCION'),
('Cómputo movil',	'CómpuMo', 8,	'2009', 1,'DESCRIPCION'),
('Práctica profesional 4',	'PP4', 8,	'2009', 1,'DESCRIPCION'),
('Práctica profesional 5',	'PP5', 8,	'2009', 1,'DESCRIPCION'),
('Evaluación de software',	'EvaSoft', 8,	'2009', 1,'DESCRIPCION'),

-- SEGUNDA CARRERA INGENIERIA EN MECATRONICA

('Química básica',	'QB', 1,	'2009', 2,'DESCRIPCION'),
('Mecánica general',	'MG', 1,	'2009', 2,'DESCRIPCION'),
('Programación estructurada I',	'PE1', 1,	'2009', 2,'DESCRIPCION'),
('Introducción a la ingeniería',	'IIng', 1,	'2009', 2,'DESCRIPCION'),
('Cálculo I',	'c1', 1,	'2009', 2,'DESCRIPCION'),
('Metrología',	'MT', 1,	'2009', 2,'DESCRIPCION'),

('Ingeniería de materiales',	'IM', 2,	'2009', 2,'DESCRIPCION'),
('Estática y dinámica del cuerpo rigido',	'EDCR', 2,	'2009', 2,'DESCRIPCION'),
('Programación estructurada II',	'IM', 2,	'2009', 2,'DESCRIPCION'),
('Álgebra lineal','AL', 2,	'2009', 2,'DESCRIPCION'),
('Cálculo II',	'C2', 2,	'2009', 2,'DESCRIPCION'),
('Probabilidad y estadistica','PrE', 2,	'2009', 2,'DESCRIPCION'),

('Resistencia de materiales',	'RTM', 3,	'2009', 2,'DESCRIPCION'),
('Termodinámica básica',	'TMOB', 3,	'2009', 2,'DESCRIPCION'),
('Procesos de manufactura básicos',	'PMB', 3,	'2009', 2,'DESCRIPCION'),
('Diseño asistido por computadora',	'DAC', 3,	'2009', 2,'DESCRIPCION'),
('Cálculo III',	'c3', 3,	'2009', 2,'DESCRIPCION'),
('Electicidad y magnetismo',	'ETM', 3,	'2009', 2,'DESCRIPCION'),

('Mecánica de fluidos',	'MF', 4,	'2009', 2,'DESCRIPCION'),
('Cinemática de máquinas',	'CTM', 4,	'2009', 2,'DESCRIPCION'),
('Diseño asistido por computadora',	'DAC', 4,	'2009', 2,'DESCRIPCION'),
('Métodos numéricos computacionales',	'MNC', 4,	'2009', 2,'DESCRIPCION'),
('Ecuaciones diferenciales',	'ED', 4,	'2009', 2,'DESCRIPCION'),
('Circuitos eléctricos I',	'CircE', 4,	'2009', 2,'DESCRIPCION'),

('Práctica profesional II',	'PP2', 5,	'2009', 2,'DESCRIPCION'),
('Diseño de elementos de máquinas',	'DisMAq', 5,	'2009', 2,'DESCRIPCION'),
('Sistemas digitales',	'SisDig', 5,	'2009', 2,'DESCRIPCION'),
('Señales y sistemas',	'SS', 5,	'2009', 2,'DESCRIPCION'),
('Circuitos eléctricos II',	'CircE2', 5,	'2009', 2,'DESCRIPCION'),

('Procesos de manufactura modernos',	'PMM', 6,	'2009', 2,'DESCRIPCION'),
('Dispositivos hidroneumáticos',	'DH', 6,	'2009', 2,'DESCRIPCION'),
('Óptativa y fisica moderna',	'OFM', 6,	'2009', 2,'DESCRIPCION'),
('Máquinas eléctricas',	'MaqE', 6,	'2009', 2,'DESCRIPCION'),
('Teoría de control I',	'TC1', 6,	'2009', 2,'DESCRIPCION'),
('Electrónica analógica',	'EAnalog', 6,	'2009', 2,'DESCRIPCION'),
('Sensores e interfaces electromecánicas',	'SIE', 6,	'2009', 2,'DESCRIPCION'),

('Robótica industrial',	'RobI', 7,	'2009', 2,'DESCRIPCION'),
('Teoría de control II',	'TC2', 7,	'2009', 2,'DESCRIPCION'),
('Microcontrol adores',	'MCA', 7,	'2009', 2,'DESCRIPCION'),
('Sistemas electrónicos de potencia',	'SEP', 7,	'2009', 2,'DESCRIPCION'),
('Instrumentación analógica',	'INAN', 7,	'2009', 2,'DESCRIPCION'),

('Diseño de sistemas mecatrónicos I',	'DSM1',8 ,	'2009', 2,'DESCRIPCION'),
('Telecomunicaciones Aplicadas',	'TelA',8 ,	'2009', 2,'DESCRIPCION'),
('Control digital',	'CtrD',8 ,	'2009', 2,'DESCRIPCION'),
('Control industrial',	'CtrI',8 ,	'2009', 2,'DESCRIPCION'),
('Optativa 1',	'Opta1',8 ,	'2009', 2,'DESCRIPCION'),
('Optativa 2',	'Opta2',8 ,	'2009', 2,'DESCRIPCION'),

('Práctica profesional III',	'PP3',9 ,	'2009', 2,'DESCRIPCION'),
('Práctica profesional IV',	'PP4',9 ,	'2009', 2,'DESCRIPCION'),
('Práctica profesional V',	'PP5',9 ,	'2009', 2,'DESCRIPCION'),
('Instrumentación y redes industriales',	'IRI',9 ,	'2009', 2,'DESCRIPCION'),
('Optativa 3',	'Opta3',9 ,	'2009', 2,'DESCRIPCION'),
('Optativa 4',	'Opta4',9 ,	'2009', 2, 'DESCRIPCION');

COMMIT;

