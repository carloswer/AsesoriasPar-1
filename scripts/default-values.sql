INSERT INTO carrera(nombre) VALUES 
('ISW'),
('Electronica'),
('Mecatronica'),
('Diseño grafico');


INSERT INTO materia(nombre,semestre, carrera) VALUES
('Progra',1, 1),
('Progra 2',2, 1),
('SO',2, 1),
('APDS',3, 1),
('Diseño',4, 1);


INSERT INTO horario(nombre,hora,aprobado) VALUES
('lunes',1),
('Martes',1),
('Miercoles',1),
('Jueves',1),
('Viernes',1);


INSERT INTO rol(nombreRol) VALUES
('Administrador'),
('Asesor'),
('Asesorado');


INSERT INTO usuario(Nombre,Apellido,IDitson,Contrasenia,Telefono,Correo,Facebook,avatar,Estado,ReqValidarHorario,FechaRegistro,Rol) VALUES 
('root','root1','1','contraseniaroot','235123','root1.root@hotmail.com','facebookroot','',1,0,'2017-01-01',1),
('Carlos','Zuniga','2134421','asdff','541234','zuniga1@hotmail.com','zuniga1','',1,0,'2017-01-22',1),
('Carlos','Noriega','126079','vasfd','2345352','carlos1@hotmail.com','carlosnoriega','',1,0,'2017-01-26',1);
-- (nombre,apellido,IDitson,contrasenia,telefono,Correo,Facebook,avatar,Estado,ReqValidarHorario,FechaRegistro,rol)


INSERT INTO asesoria(fecha,hora,validacion,descripcion) VALUES
('2017-01-29','03:43:43',1,'nada'),
('2017-01-25','05:30:00',1,'Progrmacion 2, arreglos'),
('2017-01-21','01:21:46',1,'nada');



