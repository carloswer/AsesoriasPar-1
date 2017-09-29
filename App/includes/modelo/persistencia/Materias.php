<?php namespace Modelo\Persistencia;


    class Materias extends Persistencia{


        public function __construct(){}

        //TODO: cambiar a ingles
        private $campos = "SELECT
                        m.PK_id as 'id',
                        m.nombre as 'name',
                        m.abreviacion as 'short_name',
                        m.descripcion as 'description',
                        m.semestre as 'semester',
                        m.plan as 'plan',
                        c.PK_id as 'career_id'
                        FROM materia m";


        public function getSubjects(){
            $query = $this->campos;
            //Obteniendo resultados
            return self::executeQuery($query);
        }

        public function getSubjects_ById($subject_id){
            $query = $this->campos."
                     WHERE c.PK_id = ".$subject_id;
            //Obteniendo resultados
            return self::executeQuery($query);
        }

        public function getSubjects_ByScheduleId( $id ){
            $query = $this->campos." 
                        INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_id
                        INNER JOIN horario h ON h.PK_id = hm.FK_horario
                        INNER JOIN carrera c ON m.FK_carrera = c.PK_id
                        WHERE hm.FK_horario = ".$id."
                        ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return self::executeQuery($query);
        }

        public function getSubjecs_ByCareerId( $careerId ){
            $query = $this->campos." 
                        INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                        WHERE c.PK_id = ".$careerId." 
                        ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return self::executeQuery($query);
        }


        public function getSubjecs_ByCareerName( $careerName ){
            $query = $this->campos."
                        INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                        WHERE (c.nombre = '".$careerName."' OR c.abreviacion = '".$careerName."') 
                        ORDER BY m.semestre, m.nombre ASC";
            //Obteniendo resultados
            return self::executeQuery($query);
        }


        //-----------------
        // DE HORARIOS
        //-----------------

        /**
         * @param $idStudent
         */
        public function getAvailScheduleSubs_SkipSutdent( $idStudent, $idCycle ){
            //Para que no se repita
            $select = str_replace("SELECT", "SELECT DISTINCT", $this->campos);

            $query = $select."
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    INNER JOIN horario_materia hm ON hm.FK_materia = m.PK_id
                    INNER JOIN horario h ON h.PK_id = hm.FK_horario
                    WHERE (h.FK_ciclo = ".$idCycle.") AND (h.FK_estudiante <> ".$idStudent.")
                    ORDER BY m.semestre, m.nombre ASC";
            return self::executeQuery($query);
        }




    }

?>