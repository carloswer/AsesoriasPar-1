<?php namespace Objetos;

    class Carrera{

        private $id;
        private $name;
        private $shortName;

        /**
         * Carrera constructor.
         */
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




    }

?>