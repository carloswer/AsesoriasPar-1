<?php namespace Negocio\Objetos;

    class Carrera{

        private $idCarrera;
        private $nombre;
        private $abreviacion;

        /**
         * Carrera constructor.
         * @param $IDcarrera
         * @param $Nombre
         */

        public function __construct($idCarrera, $Nombre, $abreviacion){
            $this->idCarrera = $idCarrera;
            $this->nombre = $Nombre;
            $this->abreviacion = $abreviacion;
        }

        /**
         * @return mixed
         */
        public function getIdCarrera()
        {
            return $this->idCarrera;
        }

        /**
         * @param mixed $idCarrera
         */
        public function setIdCarrera($idCarrera)
        {
            $this->idCarrera = $idCarrera;
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
            return $this->idCarrera.", ".$this->nombre.", ".$this->abreviacion;
        }


    }

?>