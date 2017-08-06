<?php namespace Modelo\Persistencia;


    class Materias extends Persistencia{


        public function __construct(){}


        public function getMaterias(){
            $query = "SELECT * FROM materia";
            //Obteniendo resultados
            return $this->getResultado($query);
        }

        public function getMateriasCarrera( $carrera ){
            $query = "SELECT * FROM materia m 
                      INNER JOIN carrera c ON m.FK_carrera = c.PK_ca_id 
                      WHERE c.ca_nombre = '".$carrera."' ORDER BY mat_semestre ASC";
            //Obteniendo resultados
            return $this->getResultado($query);
        }

        public function getMaterias_Horario($idHorario){

        }

    }

?>