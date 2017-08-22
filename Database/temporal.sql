SELECT 
	*
	-- a.PK_asesoria_id
	-- a.PK_asesoria_id
    -- a.asesoria_fecha as 'fecha',
    -- d.dia_nombre as 'dia'
    -- h.hora as 'hora',
    -- a.asesoria_descripcion as 'descripcion'
FROM asesoria a
INNER JOIN dia_hora dh ON dh.FK_hora = a.FK_dia_hora;
-- RIGHT JOIN materia m ON m.PK_mat_id = a.FK_materia
-- RIGHT JOIN estado_asesoria ea ON ea.FK_asesoria = a.PK_asesoria_id;


-- WHERE ea.FK_asesoria IS NOT NULL;

SELECT * FROM asesoria;

SELECT 
	a.PK_asesoria_id as 'asesoria_id',
	a.asesoria_fecha as 'asesoria_fecha',
	d.dia_nombre as 'asesoria_dia',
	ho.hora as 'asesoria_hora',
	m.mat_nombre as 'asesoria_materia',
	a.asesoria_descripcion as 'asesoria_descripcion',
	a.asesoria_estado as 'asesoria_estado',
	a.FK_alumno as 'alumno_id',
	CONCAT( e.est_nombre, ' ', e.est_apellido ) as 'alumno_nombre',
	h.FK_estudiante as 'asesor_id',
	CONCAT( eh.est_nombre, ' ', eh.est_apellido ) as 'asesor_nombre',
	ea.PK_val_id as 'validacion_id',
	ea.val_tipo as 'validacion_tipo',
	ea.val_comentario as 'validacion_comentario'
 FROM asesoria a
-- Alumno
INNER JOIN materia m ON m.PK_mat_id = a.FK_materia
INNER JOIN estudiante e ON e.PK_est_id = a.FK_alumno -- para alumno (con tabla asesoria)
-- Asesor
INNER JOIN dia_hora dh ON dh.PK_dia_hora = a.FK_dia_hora
INNER JOIN hora ho ON ho.PK_hora_id = dh.FK_hora
INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
INNER JOIN estudiante eh ON eh.PK_est_id = h.FK_estudiante -- para asesor (con tabla horario)
LEFT JOIN estado_asesoria ea ON ea.FK_asesoria = a.PK_asesoria_id; -- para aquellas que no tienen un estado (tabla)

-- Cuando se es asesor
-- WHERE ( h.PK_horario_id = 1 )

-- Cuando se es alumno
-- WHERE ( a.FK_alumno = 1 )

-- Asesorias proximas (sin llegar fecha)
WHERE ( CURTIME() < ho.hora )  AND ( CURDATE() < a.asesoria_fecha )

-- NOW() nos devuelve la fecha actual en el formato YYYY-MM-DD (HH:M:SS).
-- CURDATE() nos devuelve la fecha actual en el formato YYYY-MM-DD.
-- CURTIME() nos devuelve la hora actual en el formato HH:M:SS.

-- ---------------------Los que no han sido validados (pendientes)
WHERE (ea.PK_val_id IS NULL) -- No validado
WHERE (ea.PK_val_id IS NOT NULL) -- Validado

ORDER BY a.PK_asesoria_id ASC
-- WHERE ( ea.PK_val_id IS NULL ) AND ( h.FK_estudiante = 1 );
-- separado para ver
-- WHERE e.PK_est_id <> 1
