<?php namespace Objetos;

    class Estudiante {

        private $idUsuario;
        // ----
        private $idEstudiante;
        private $iditson;
        private $nombre;
        private $apellido;
        private $telefono;
        private $facebook;
        private $avatar;
        private $carrera;


        public function __construct(){}
        
        /**
         * @return mixed
         */
        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        /**
         * @param mixed $idUsuario
         *
         * @return self
         */
        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getIdEstudiante()
        {
            return $this->idEstudiante;
        }

        /**
         * @param mixed $idEstudiante
         *
         * @return self
         */
        public function setIdEstudiante($idEstudiante)
        {
            $this->idEstudiante = $idEstudiante;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getIditson()
        {
            return $this->iditson;
        }

        /**
         * @param mixed $iditson
         *
         * @return self
         */
        public function setIditson($iditson)
        {
            $this->iditson = $iditson;

            return $this;
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
         *
         * @return self
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getApellido()
        {
            return $this->apellido;
        }

        /**
         * @param mixed $apellido
         *
         * @return self
         */
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getTelefono()
        {
            return $this->telefono;
        }

        /**
         * @param mixed $telefono
         *
         * @return self
         */
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getFacebook()
        {
            return $this->facebook;
        }

        /**
         * @param mixed $facebook
         *
         * @return self
         */
        public function setFacebook($facebook)
        {
            $this->facebook = $facebook;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getAvatar()
        {
            return $this->avatar;
        }

        /**
         * @param mixed $avatar
         *
         * @return self
         */
        public function setAvatar($avatar)
        {
            $this->avatar = $avatar;

            return $this;
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
         *
         * @return self
         */
        public function setCarrera($carrera)
        {
            $this->carrera = $carrera;

            return $this;
        }


    }


?>