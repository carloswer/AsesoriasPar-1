<?php namespace Modelo\Persistencia;


class Asesorias extends Persistencia{

    public function __construct(){}

    public function getAsesorias_Asesor_Ciclo(  ){
        $query = "SELECT 
                    a.PK_id as 'id',
                    a.fecha as 'fecha',
                    d.dia_nombre as 'dia',
                    ho.hora as 'hora',
                    m.mat_nombre as 'materia',
                    a.descripcion as 'descripcion',
                    a.estado as 'estado',
                    a.FK_alumno as 'alumno_id',
                    CONCAT( e.nombre, ' ', e.apellido ) as 'alumno_nombre',
                    h.FK_estudiante as 'asesor_id',
                    CONCAT( eh.nombre, ' ', eh.apellido ) as 'asesor_nombre'
                 FROM asesoria a
                -- Alumno
                INNER JOIN materia m ON m.PK_mat_id = a.FK_materia
                INNER JOIN estudiante e ON e.PK_est_id = a.FK_alumno -- para alumno (con tabla asesoria)
                -- Asesor
                INNER JOIN dia_hora dh ON dh.PK_dia_hora = a.FK_dia_hora
                INNER JOIN hora ho ON ho.PK_hora_id = dh.FK_hora
                INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
                INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
                INNER JOIN estudiante eh ON eh.PK_est_id = h.FK_estudiante ";
                //LEFT JOIN estado_asesoria ea ON ea.FK_asesoria = a.PK_id -- para aquellas que no tienen un estado (tabla)
                //WHERE ( IS NULL) AND (e.PK_est_id = 1 OR eh.PK_est_id = 1);
        //Obteniendo resultados
        return $this->ejecutarQuery($query);
    }

    public function getAsesoriasCanceladas_asesor(){
        $query = "SELECT
				a.PK_id as 'id_asesoria',
				CONCAT(e.est_nombre,' ',e.est_apellido) as 'alumno',
				CONCAT(eh.est_nombre,' ',eh.est_apellido) as 'asesor',
				m.mat_nombre as 'materia',
				a.desc as 'descripcion',
				d.dia_nombre as 'dia',
				ho.hora as 'hora',
				a.fecha as 'fecha',
				a.registro as 'registro_asesoria',
				ea.val_comentario as 'razon'
			FROM asesoria a
			INNER JOIN estudiante e ON e.PK_est_id = a.FK_alumno
			INNER JOIN materia m ON m.PK_mat_id = a.FK_materia
			INNER JOIN dia_hora dh ON dh.PK_dia_hora = a.FK_dia_hora
			INNER JOIN hora ho ON ho.PK_hora_id = dh.FK_hora
			INNER JOIN dia d ON d.PK_dia_id = dh.FK_dia
			INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
			INNER JOIN estudiante eh ON eh.PK_est_id = h.FK_asesor
			INNER JOIN estado_asesoria ea ON ea.FK_asesoria = a.PK_id
			WHERE ea.val_tipo = 2 AND (e.PK_est_id = '' OR eh.PK_est_id = '');
			 WHERE ea.val_tipo = 2";
    }

}