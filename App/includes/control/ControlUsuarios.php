<?php namespace Control;

use Modelo\Persistencia\Usuarios;
use Objetos\Usuario;

class ControlUsuarios{

    private $perUsuarios;


    public function __construct(){
        $this->perUsuarios = new Usuarios();
    }

    

    //-----------------------
    // BASE DE DATOS
    //-----------------------

    public function verificarUsuario($user, $pass){
        $result = $this->perUsuarios->getUsuarioLogin($user, $pass);
        if( count($result) == 0 )
            return null;
        else{
            // Crea objeto
            $usuario = new Usuario();
            // Asigna datos
            $usuario->setId( $result[0]['PK_usu_id'] );
            $usuario->setUsername( $result[0]['usu_username'] );
            $usuario->setRol( $result[0]['rol_nombre'] );
            return $usuario;
        }
    }

    

    public function obtenerUsuarios(){
        $result = $this->perUsuarios->getUsuarios();
        if( count($result) == 0 )
            return null;
        else{
            $arrayUsuarios = array();
            foreach( $result as $r ){
                // Crea objeto
                $usuario = new Usuario();
                // Asigna datos
                $usuario->setId( $r['PK_usu_id'] );
                $usuario->setUsername( $r['usu_username'] );
                // $usuario->setPassword( $r['usu_password'] );
                // $usuario->setEstatus( $r['usu_password'] );
                $usuario->setRolID( $r['FK_rol_id'] );

                //Agrega al array
                $arrayUsuarios[] = $usuario;
            }
            return $arrayUsuarios;
        }
    }



}