<?php namespace Negocio\Objetos;


class Usuario{

    private $id;
    private $usuario;
    private $correo;
    private $password;
    private $estatus;
    private $fechaRegistro;
    private $rol;



    /**
     * Usuario constructor.
     * @param $id
     * @param $usuario
     * @param $correo
     * @param $password
     * @param $estatus
     * @param $fechaRegistro
     * @param $rol
     */
    public function __construct($id, $usuario, $correo, $password, $estatus, $fechaRegistro, $rol)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->correo = $correo;
        $this->password = $password;
        $this->estatus = $estatus;
        $this->fechaRegistro = $fechaRegistro;
        $this->rol = $rol;
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
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
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
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @param mixed $estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
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
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }




}