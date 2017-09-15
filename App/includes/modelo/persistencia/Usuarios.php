<?php namespace Modelo\Persistencia;

// use Modelo\Database\Conexion;

/**
 * Class Usuarios
 * @package Modelo\Persistencia
 */
class Usuarios extends Persistencia{

    public function __construct(){}

    private $campos = "u.PK_id as 'id_usuario',
                        u.nombre_usuario as 'nombre_usuario',
                        u.correo as 'correo',
                        u.fecha_registro as 'fecha',
                        u.fecha_registro as 'estado',
                        r.nombre as 'rol'";

    /**
     * Método que regresa todos los usuarios
     */
    public function getUsers(){
        $query = "SELECT ".$this->campos."                    
                FROM usuario u
                INNER JOIN rol r ON r.PK_id = u.FK_rol";
        return  self::executeQuery($query);
    }


    /**
     * Método que regresa un usuario en la coincidencia con un nombre de
     * usuario y la contraseña
     * @param String $user Nombre de usuario
     * @param String $pass Contraseña
     */
    public function getUser_ByAuth($user, $pass){
        $ePass = $this->encrypt($pass);
        $query = "SELECT ".$this->campos."
                FROM usuario u
                INNER JOIN rol r ON r.PK_id = u.FK_rol
                WHERE u.nombre_usuario = '".$user."' AND u.password = '".$ePass."' ";
        return  self::executeQuery($query);
    }

    /**
     * Método que regresa un usuario en la coincidencia con el ID
     * @param int $id ID del usuario
     */
    public function getUser_ById($id){
        $query = "SELECT 
                ".$this->campos."
                FROM usuario u
                INNER JOIN rol r ON r.PK_id = u.FK_rol
                WHERE u.PK_id = ".$id;
        return  self::executeQuery($query);
    }

    /**
     * @return array|bool|null
     */
    public function getUser_Last(){
        $query = "SELECT ".$this->campos." FROM usuario ORDER BY PK_id DESC LIMIT 1";
        return  self::executeQuery($query);
    }

    //------------------ INSERTS

    public function insertUser( $user ){
        $passC = self::encrypt( $user['pass'] );
        $query = "INSERT INTO usuario(nombre_usuario, password, correo)
                  VALUES('".$user['username']."','".$passC."','".$user['email']."')";
        return  self::executeQuery($query);
    }


}