<?php namespace Negocio\Objetos;

    class Estudiante{

        public $idEstudiante;
        public $itsonID;
        public $nombre;
        public $apellido;
        public $correo;
        public $password;
        public $telefono;
        public $facebook;
        public $avatar;
        public $reqValidar;
        public $fechaRegistro;
        public $estado;
        public $carrera;

        /**
         * Estudiante constructor.
         * @param $idEstudiante
         * @param $itsonID
         * @param $nombre
         * @param $apellido
         * @param $correo
         * @param $password
         * @param $telefono
         * @param $facebook
         * @param $avatar
         * @param $reqValidar
         * @param $fechaRegistro
         * @param $estado
         * @param $carrera
         */
        public function __construct($idEstudiante, $itsonID, $nombre, $apellido, $correo, $password,
                                    $telefono, $facebook, $avatar, $reqValidar, $fechaRegistro,
                                    $estado, Carrera $carrera)
        {
            $this->idEstudiante = $idEstudiante;
            $this->itsonID = $itsonID;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->correo = $correo;
            $this->password = $password;
            $this->telefono = $telefono;
            $this->facebook = $facebook;
            $this->avatar = $avatar;
            $this->reqValidar = $reqValidar;
            $this->fechaRegistro = $fechaRegistro;
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
        public function getCorreo()
        {
            return $this->correo;
        }

        /**
         * @param mixed $correo
         */
        public function setCorreo($correo)
        {
            $this->correo = $correo;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
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
        public function getFechaRegistro()
        {
            return $this->fechaRegistro;
        }

        /**
         * @param mixed $fechaRegistro
         */
        public function setFechaRegistro($fechaRegistro)
        {
            $this->fechaRegistro = $fechaRegistro;
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
         * @return Carrera
         */
        public function getCarrera(): Carrera
        {
            return $this->carrera;
        }

        /**
         * @param Carrera $carrera
         */
        public function setCarrera(Carrera $carrera)
        {
            $this->carrera = $carrera;
        }

        function __toString()
        {
            return  $this->getIdEstudiante().", ".$this->getItsonID().", ".$this->getNombre().", ".$this->getApellido().", ".
                $this->getCorreo().", ".$this->getPassword().", ".$this->getTelefono().", ".$this->getFacebook().", ".
                $this->getAvatar().", ".$this->getReqValidar().", ".$this->getEstado().", ".$this->getCarrera()->__toString();
        }


    }