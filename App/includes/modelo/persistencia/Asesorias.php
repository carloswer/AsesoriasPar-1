<?php namespace Modelo\Persistencia;


class Asesorias extends Persistencia{

    public function __construct(){}

    private $selectComun = "SELECT 
                    -- asesoria
                    a.PK_id as 'id',
                    a.fecha as 'fecha_asesoria',
                    a.fecha_solicitud as 'fecha_solicitud',
                    a.hora as 'hora',
                    a.descripcion as 'descripcion',
                    -- materia
                    m.PK_id as 'materia_id',
                    m.nombre as 'materia_nombre',
                    -- horario
                    hm.PK_id as 'materia_horario_id',
                   -- Estudiantes
                    e_al.PK_id as 'alumno_id',
                    CONCAT( e_al.nombre,' ',e_al.apellido ) as 'alumno_nombre',
                    e_as.PK_id as 'asesor_id',
                    CONCAT( e_as.nombre,' ',e_as.apellido ) as 'asesor_nombre',
                    -- estado
                    ea.PK_id as 'estado_id',
                    ea.tipo as 'estado_tipo',
                    ea.comentario as 'estado_comentario',
                    ea.fecha_validacon as 'estado_fecha',
                    ea.calificacion_asesor as 'estado_calificacion'";


    public function getAsesorias_Asesor_Ciclo( $idEstudiante, $idCiclo ){
        $query = $this->selectComun." FROM asesoria a
                    INNER JOIN estudiante e_al ON e_al.PK_id = a.FK_alumno
                    INNER JOIN estudiante e_as ON e_as.PK_id = a.FK_asesor
                    INNER JOIN horario_materia hm ON hm.PK_id = a.FK_materia
                    INNER JOIN materia m ON m.PK_id = hm.FK_materia
                    INNER JOIN horario h ON h.PK_id = hm.FK_horario
                    -- Para mostrar siempre el estado aunque no tenga
                    LEFT JOIN estado_asesoria ea ON ea.FK_asesoria = a.PK_id
                    WHERE a.FK_asesor = ".$idEstudiante." AND h.FK_ciclo = ".$idCiclo;
        //Obteniendo resultados
        return $this->executeQuery($query);
    }


    public function getAsesorias_Alumno_Ciclo( $idEstudiante, $idCiclo ){
        $query = $this->selectComun." FROM asesoria a
                    INNER JOIN estudiante e_al ON e_al.PK_id = a.FK_alumno
                    INNER JOIN estudiante e_as ON e_as.PK_id = a.FK_asesor
                    INNER JOIN horario_materia hm ON hm.PK_id = a.FK_materia
                    INNER JOIN materia m ON m.PK_id = hm.FK_materia
                    INNER JOIN horario h ON h.PK_id = hm.FK_horario
                    -- Para mostrar siempre el estado aunque no tenga
                    LEFT JOIN estado_asesoria ea ON ea.FK_asesoria = a.PK_id
                    WHERE a.FK_alumno = ".$idEstudiante." AND h.FK_ciclo = ".$idCiclo;
        //Obteniendo resultados
        return $this->executeQuery($query);
    }



}