<?php namespace Modelo\Persistencia;


    class Materias extends Persistencia{


        public function __construct(){}


        public function getMaterias(){
            $query = "SELECT * FROM materia";
            //Obteniendo resultados
            return $this->getResultado($query);
        }

        public function getMateriasCarrera( $carrera ){
            $query = "SELECT * FROM materia 
                      WHERE ";
            //Obteniendo resultados
            return $this->getResultado($query);
        }

    }

?>