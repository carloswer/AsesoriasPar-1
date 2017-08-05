<?php namespace Modelo\Persistencia;

// use Modelo\Database\Conexion;

class Usuarios extends Persistencia{

    public function __construct(){}


    public function getUsuarioLogin(String $user, String $pass){
        $ePass = $this->cifrar($pass);
        $query = "SELECT *
                    FROM usuario u
                    INNER JOIN rol r ON r.PK_rol_id = u.FK_rol
                    WHERE (usu_username = '".$user."' OR usu_correo = '".$user."')
                    AND usu_password = '".$ePass."'";

        return $this->getResultado($query);
    }


    public function getUsuarios(){
        $query = "SELECT * FROM usuario";
        return $this->getResultado($query);
    }




}