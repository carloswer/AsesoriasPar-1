<?php namespace Modelo\Persistencia;

    use Objetos\Carrera;

    class Carreras extends Persistencia {
        public function __construct(){}


        private $campos = "PK_id as 'id',
                            nombre as 'name',
                            abreviacion as 'short_name',
                            fecha_registro as 'date'";


        /**
         * @param $id
         * @return mixed
         */
        public function getCareer_ById( $id ){
            $query = "SELECT 
                        ".$this->campos."
                        FROM carrera
                        WHERE PK_id =".$id;
            //Obteniendo resultados
            return self::executeQuery($query);
        }



    }


?>