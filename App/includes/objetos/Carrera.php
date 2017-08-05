<?php namespace Negocio\Objetos;

    class Carrera{

        private $id;
        private $nombre;
        private $abreviacion;

        /**
         * Carrera constructor.
         * @param $IDcarrera
         * @param $Nombre
         */

        public function __construct($idCarrera, $Nombre, $abreviacion){
            $this->id = $idCarrera;
            $this->nombre = $Nombre;
            $this->abreviacion = $abreviacion;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        function __toString()
        {
            return $this->id.", ".$this->nombre.", ".$this->abreviacion;
        }


    }

?>