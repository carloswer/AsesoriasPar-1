<?php namespace Negocio\Objetos;


    class Materia{

        private $idMateria;
        private $nombre;
        private $semestre;
        private $carrera;

        /**
         * Materia constructor.
         * @param $idMateria
         * @param $nombre
         * @param $semestre
         * @param $carrera
         */
        public function __construct($idMateria, $nombre, $semestre, $carrera)
        {
            $this->idMateria = $idMateria;
            $this->nombre = $nombre;
            $this->semestre = $semestre;
            $this->carrera = $carrera;
        }

        /**
         * @return mixed
         */
        public function getIdMateria()
        {
            return $this->idMateria;
        }

        /**
         * @param mixed $idMateria
         */
        public function setIdMateria($idMateria)
        {
            $this->idMateria = $idMateria;
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

        /**
         * @return mixed
         */
        public function getSemestre()
        {
            return $this->semestre;
        }

        /**
         * @param mixed $semestre
         */
        public function setSemestre($semestre)
        {
            $this->semestre = $semestre;
        }

        /**
         * @return mixed
         */
        public function getCarrera()
        {
            return $this->carrera;
        }

        /**
         * @param mixed $carrera
         */
        public function setCarrera($carrera)
        {
            $this->carrera = $carrera;
        }




    }