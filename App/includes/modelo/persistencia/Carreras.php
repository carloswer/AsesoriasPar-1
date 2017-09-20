<?php namespace Modelo\Persistencia;

    use Objetos\Carrera;

    class Carreras extends Persistencia {
        public function __construct(){}


        //TODO: agregar estado
        private $campos = "SELECT
                            PK_id as 'id',
                            nombre as 'name',
                            abreviacion as 'short_name',
                            fecha_registro as 'date'
                            FROM carrera";


        /**
         * @param $id
         * @return mixed
         */
        public function getCareer_ById( $id ){
            $query = $this->campos."
                        WHERE PK_id =".$id;
            //Obteniendo resultados
            return self::executeQuery($query);
        }

        public function getCareers(){
            $query = $this->campos;
            //Obteniendo resultados
            return self::executeQuery($query);
        }


    }


?>