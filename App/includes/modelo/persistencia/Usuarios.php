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
        return  $this->executeQuery($query);
    }


    /**
     * Método que regresa un usuario en la coincidencia con un nombre de
     * usuario y la contraseña
     * @param String $user Nombre de usuario
     * @param String $pass Contraseña
     */
    public function getUser_ByAuth(String $user, String $pass){
        $ePass = $this->encript($pass);
        $query = "SELECT ".$this->campos."
                FROM usuario u
                INNER JOIN rol r ON r.PK_id = u.FK_rol
                WHERE u.nombre_usuario = '".$user."' AND u.password = '".$ePass."' ";
        return $this->executeQuery($query);
    }

    /**
     * Método que regresa un usuario en la coincidencia con el ID
     * @param int $id ID del usuario
     */
    public function getUser_ById(int $id){
        $query = "SELECT 
                ".$this->campos."
                FROM usuario u
                INNER JOIN rol r ON r.PK_id = u.FK_rol
                WHERE u.PK_id = ".$id;
        return  $this->executeQuery($query);
    }


    /**
     * @param array $datos
     * @return array|bool
     */
//    public function insertUserAndStudent(array $datos){
//        //Registra usuario
//        $query = "INSERT INTO usuario(nombre_usuario, password, correo, FK_rol)
//                  VALUES('".$datos['usuario']."', '".$datos['pass']."', '".$datos['correo']."', 2)";
//        $value = $this->executeQuery($query, Persistencia::$TRANSACTION_INIT);
//
//        //Obtiene ultimo usuario registrado
//        $query = "SELECT PK_id as 'id' FROM usuario ORDER BY PK_id DESC LIMIT 1";
//        $value = $this->executeQuery($query, Persistencia::$TRANSACTION_PROGRESS);
//        $usuarioID = $value[0]['id'];
//
//        //Registra estudiante con usuaario
//        $query = "INSERT INTO estudiante(id_itson, nombre, apellido, telefono, avatar, facebook, FK_usuario, FK_carrera)
//                  VALUES ('".$datos['itson']."', '".$datos['nombre']."', '".$datos['apellido']."', '".$datos['telefono']."',
//                  ".$usuarioID.", '".$datos['carrera']."')";
//        $value = $this->executeQuery($query, Persistencia::$TRANSACTION_COMMIT);
//
//        return $value;
//    }



}