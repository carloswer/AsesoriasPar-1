<?php namespace Control;

use Modelo\Persistencia\Usuarios;
use Objetos\Usuario;

class ControlUsuarios{

    private $perUsers;


    public function __construct(){
        $this->perUsers = new Usuarios();
    }


    public function getUser_ByAuth(String $user, String $pass){
        $result = $this->perUsers->getUser_ByAuth($user, $pass);
        if( $result == false ){
            return 'error';
        }
        else if( $result == null )
            return null;
        else
            return $this->makeObject($result[0]);
    }

    public function getUser_ById(int $id){
        $result = $this->perUsers->getUser_ById( $id );
        if( $result == false )
            return 'error';
        else if( $result == null )
            return null;
        else
            return $this->makeObject($result[0]);
    }

    public function isUserExist_ById(int $id){
        $result = $this->getUser_ById($id);
        if( $result == 'error' )
            return $result;
        else if( $result == null )
            return false;
        else
            return true;
    }

    public function getUser_ByUsername( String $username ){

    }



    //-----------------------
    // EXTRAS
    //-----------------------
    private function makeObject($data){
        $user = new Usuario();
        //setting data
        $user->setId( $data['id_usuario'] );
        $user->setUsername( $data['nombre_usuario'] );
        $user->setEmail( $data['correo'] );
        $user->setRegisterDate( $data['fecha'] );
        $user->setStatus( $data['estado'] );
        $user->setRole( $data['rol'] );

        //Returning object
        return $user;
    }




}