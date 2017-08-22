<?php namespace Modelo\Persistencia;


    class Materias extends Persistencia{


        public function __construct(){}


        public function getMaterias(){
            $query = "SELECT * FROM materia";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        public function getMateriasCarrera( $carrera ){
            $query = "SELECT * FROM materia m 
                    INNER JOIN carrera c ON m.FK_carrera = c.PK_id 
                    WHERE c.nombre = '".$carrera."' ORDER BY m.semestre ASC";
            //Obteniendo resultados
            return $this->ejecutarQuery($query);
        }

        public function getMaterias_Horario($idHorario){

        }

    }

?>