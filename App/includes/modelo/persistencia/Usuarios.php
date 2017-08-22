<?php namespace Modelo\Persistencia;

// use Modelo\Database\Conexion;

class Usuarios extends Persistencia{

    public function __construct(){}


    public function getUsuarioLogin(String $user, String $pass){
        $ePass = $this->cifrar($pass);
        $query = "SELECT 
                    u.PK_id as 'id_usuario',
                    u.nombre_usuario as 'nombre_usuario',
                    r.nombre as 'rol'
                FROM usuario u
                INNER JOIN rol r ON r.PK_id = u.FK_rol
                WHERE u.nombre_usuario = '".$user."' AND u.password = '".$ePass."' ";

        return $this->ejecutarQuery($query);
    }


    public function getUsuarios(){
        $query = "SELECT * FROM usuario";
        return $this->ejecutarQuery($query);
    }




}