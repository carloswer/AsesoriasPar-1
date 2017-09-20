<?php namespace Objetos;


    class Materia{

        private $id;
        private $name;
        private $shortName;
        private $descripcion;
        private $schoolPlan;
        private $semester;
        private $career;

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
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getShortName()
        {
            return $this->shortName;
        }

        /**
         * @param mixed $shortName
         */
        public function setShortName($shortName)
        {
            $this->shortName = $shortName;
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
        public function getSchoolPlan()
        {
            return $this->schoolPlan;
        }

        /**
         * @param mixed $schoolPlan
         */
        public function setSchoolPlan($schoolPlan)
        {
            $this->schoolPlan = $schoolPlan;
        }

        /**
         * @return mixed
         */
        public function getSemester()
        {
            return $this->semester;
        }

        /**
         * @param mixed $semester
         */
        public function setSemester($semester)
        {
            $this->semester = $semester;
        }

        /**
         * @return Carrera
         */
        public function getCareer()
        {
            return $this->career;
        }

        /**
         * @param Carrera $career
         */
        public function setCareer($career)
        {
            $this->career = $career;
        }



    }