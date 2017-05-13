<?php namespace Negocio\Objetos;

    class Estudiante extends Usuario {

        public $idEstudiante;
        public $itsonID;
        public $nombre;
        public $apellido;
        public $telefono;
        public $facebook;
        public $avatar;
        public $reqValidar;
        public $estado;
        public $carrera;

        /**
         * Estudiante constructor.
         * @param $idEstudiante
         * @param $itsonID
         * @param $nombre
         * @param $apellido
         * @param $telefono
         * @param $facebook
         * @param $avatar
         * @param $reqValidar
         * @param $estado
         * @param $carrera
         */
        public function __construct($idEstudiante, $itsonID, $nombre, $apellido, $telefono, $facebook, $avatar, $reqValidar, $estado, $carrera)
        {
            $this->idEstudiante = $idEstudiante;
            $this->itsonID = $itsonID;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->facebook = $facebook;
            $this->avatar = $avatar;
            $this->reqValidar = $reqValidar;
            $this->estado = $estado;
            $this->carrera = $carrera;
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
         */
        public function setIdEstudiante($idEstudiante)
        {
            $this->idEstudiante = $idEstudiante;
        }

        /**
         * @return mixed
         */
        public function getItsonID()
        {
            return $this->itsonID;
        }

        /**
         * @param mixed $itsonID
         */
        public function setItsonID($itsonID)
        {
            $this->itsonID = $itsonID;
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
        public function getApellido()
        {
            return $this->apellido;
        }

        /**
         * @param mixed $apellido
         */
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
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
         */
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
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
         */
        public function setFacebook($facebook)
        {
            $this->facebook = $facebook;
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
         */
        public function setAvatar($avatar)
        {
            $this->avatar = $avatar;
        }

        /**
         * @return mixed
         */
        public function getReqValidar()
        {
            return $this->reqValidar;
        }

        /**
         * @param mixed $reqValidar
         */
        public function setReqValidar($reqValidar)
        {
            $this->reqValidar = $reqValidar;
        }

        /**
         * @return mixed
         */
        public function getEstado()
        {
            return $this->estado;
        }

        /**
         * @param mixed $estado
         */
        public function setEstado($estado)
        {
            $this->estado = $estado;
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