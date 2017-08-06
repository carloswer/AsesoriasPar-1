<?php namespace Objetos;


    class Materia{

        private $id;
        private $nombre;
        private $abreviacion;
        private $descripcion;
        private $plan;
        private $semestre;
        private $carrera;

        public function __construct(){}

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

        /**
         * @return mixed
         */
        public function getAbreviacion()
        {
            return $this->abreviacion;
        }

        /**
         * @param mixed $abreviacion
         */
        public function setAbreviacion($abreviacion)
        {
            $this->abreviacion = $abreviacion;
        }

        /**
         * @return mixed
         */
        public function getDescripcion()
        {
            return $this->descripcion;
        }

        /**
         * @param mixed $descripcion
         */
        public function setDescripcion($descripcion)
        {
            $this->descripcion = $descripcion;
        }

        /**
         * @return mixed
         */
        public function getPlan()
        {
            return $this->plan;
        }

        /**
         * @param mixed $plan
         */
        public function setPlan($plan)
        {
            $this->plan = $plan;
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