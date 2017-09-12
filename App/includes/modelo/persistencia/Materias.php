<?php namespace Modelo\Persistencia;


    class Materias extends Persistencia{


        public function __construct(){}

        private $campos = "m.PK_id as 'id',
                        m.nombre,
                        m.abreviacion,
                        m.descripcion,
                        m.semestre,
                        m.plan,
                        c.PK_id as 'carrera_id',
                        c.nombre as 'carrera_nombre',
                        c.abreviacion as 'carrera_abreviacion'";


        public function getSubjects(){
            $query = "SELECT
                        ".$this->campos." 
                      FROM materia";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }

        public function getSubjects_ByScheduleId(int $id ){
            $query = "SELECT 
                        ".$this->campos."
                    FROM materia m 
                    INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_id
                    INNER JOIN horario h ON h.PK_id = hm.FK_horario
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id
                    WHERE hm.FK_horario = ".$id."
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }

        public function getSubjecs_ByCareerId( int $careerId ){
            $query = "SELECT 
                        ".$this->campos."
                    FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    WHERE c.PK_id = ".$careerId." 
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }


        public function getSubjecs_ByCareerName( String $careerName ){
            $query = "SELECT 
                        ".$this->campos."
                    FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    WHERE (c.nombre = '".$careerName."' OR c.abreviacion = '".$careerName."') 
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }


        public function getMaterias_Horario( $horarioID ){
            $query = "SELECT 
                        m.PK_id as 'id',
                        m.nombre,
                        m.abreviacion,
                        m.descripcion,
                        m.semestre,
                        m.plan,
                        c.PK_id as 'carrera_id',
                        c.nombre as 'carrera_nombre',
                        c.abreviacion as 'carrera_abreviacion'
                    FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_id
                    WHERE hm.FK_horario = ".$horarioID."
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }




        public function getMateriasConAsesores($idCiclo ){
            $query = "SELECT DISTINCT
                       m.PK_id as 'id',
                       m.nombre,
                       m.abreviacion,
                       m.descripcion,
                       m.semestre,
                       m.plan,
                       c.PK_id as 'carrera_id',
                       c.nombre as 'carrera_nombre',
                       c.abreviacion as 'carrera_abreviacion'
                    FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_id
                    INNER JOIN horario h ON h.FK_estudiante = hm.FK_horario
                    WHERE h.FK_ciclo = ".$idCiclo."
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }



        public function getMateriasConAsesores_SinEstudianteX($idCiclo, $idEstudiante ){
            $query = "SELECT DISTINCT
                       m.PK_id as 'id',
                       m.nombre,
                       m.abreviacion,
                       m.descripcion,
                       m.semestre,
                       m.plan,
                       c.PK_id as 'carrera_id',
                       c.nombre as 'carrera_nombre',
                       c.abreviacion as 'carrera_abreviacion'
                    FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_id
                    INNER JOIN horario h ON h.PK_id = hm.FK_horario
                    WHERE (h.FK_ciclo = ".$idCiclo.") AND (h.FK_estudiante <> ".$idEstudiante.")
                    ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return $this->executeQuery($query);
        }



    }

?>