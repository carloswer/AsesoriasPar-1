<?php namespace Negocio\Objetos;


    class Usuario{

        public $usuarioId;
        public $tipoUsuario;
        public $nombre;
        public $apellido;
        public $idItson;
        public $correo;
        public $password;
        public $telefono;
        public $facebook;
        public $carrera;
        public $avatar;
        public $listaCitas;
        public $horario;
        public $estado;
        public $fchaRegistro;

        /**
         * Usuario constructor.
         * @param $usuarioId
         * @param $tipoUsuario
         * @param $nombre
         * @param $apellido
         * @param $idItson
         * @param $correo
         * @param $password
         * @param $telefono
         * @param $facebook
         * @param $carrera
         * @param $avatar
         * @param $listaCitas
         * @param $horario
         * @param $estado
         * @param $fchaRegistro
         */
        public function __construct($usuarioId, $tipoUsuario, $nombre, $apellido, $idItson, $correo, $password, $telefono, $facebook, $carrera, $avatar, $listaCitas, $horario, $estado, $fchaRegistro)
        {
            $this->usuarioId = $usuarioId;
            $this->tipoUsuario = $tipoUsuario;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->idItson = $idItson;
            $this->correo = $correo;
            $this->password = $password;
            $this->telefono = $telefono;
            $this->facebook = $facebook;
            $this->carrera = $carrera;
            $this->avatar = $avatar;
            $this->listaCitas = $listaCitas;
            $this->horario = $horario;
            $this->estado = $estado;
            $this->fchaRegistro = $fchaRegistro;
        }

        /**
         * @return mixed
         */
        public function getUsuarioId()
        {
            return $this->usuarioId;
        }

        /**
         * @param mixed $usuarioId
         */
        public function setUsuarioId($usuarioId)
        {
            $this->usuarioId = $usuarioId;
        }

        /**
         * @return mixed
         */
        public function getTipoUsuario()
        {
            return $this->tipoUsuario;
        }

        /**
         * @param mixed $tipoUsuario
         */
        public function setTipoUsuario($tipoUsuario)
        {
            $this->tipoUsuario = $tipoUsuario;
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
        public function getIdItson()
        {
            return $this->idItson;
        }

        /**
         * @param mixed $idItson
         */
        public function setIdItson($idItson)
        {
            $this->idItson = $idItson;
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
        public function getListaCitas()
        {
            return $this->listaCitas;
        }

        /**
         * @param mixed $listaCitas
         */
        public function setListaCitas($listaCitas)
        {
            $this->listaCitas = $listaCitas;
        }

        /**
         * @return mixed
         */
        public function getHorario()
        {
            return $this->horario;
        }

        /**
         * @param mixed $horario
         */
        public function setHorario($horario)
        {
            $this->horario = $horario;
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
        public function getFchaRegistro()
        {
            return $this->fchaRegistro;
        }

        /**
         * @param mixed $fchaRegistro
         */
        public function setFchaRegistro($fchaRegistro)
        {
            $this->fchaRegistro = $fchaRegistro;
        }

        function toString(){
            return $this->usuarioId.", ".$this->tipoUsuario.", ".$this->nombre.", ".$this->apellido.", 
            ".$this->idItson.", ".$this->correo.", ".$this->password.", ".$this->telefono.", ".$this->facebook."
            , ".$this->carrera.", ".$this->avatar.", ".$this->listaCitas.", ".$this->horario.", ".$this->estado.", ".$this->fchaRegistro;
        }


    }