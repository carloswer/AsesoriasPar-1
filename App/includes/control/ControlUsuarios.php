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
        if( !is_array($result) )
            return $result;
        else{
            // Crea objeto
            $usuario = new Usuario();
            // Asigna datos
            $usuario->setId( $result[0]['id_usuario'] );
            $usuario->setUsername( $result[0]['nombre_usuario'] );
            $usuario->setRol( $result[0]['rol'] );
            return $usuario;
        }
    }

    

    public function obtenerUsuarios(){
        $result = $this->perUsuarios->getUsuarios();
        if( !is_array($result) )
            return $result;
        else{
            $arrayUsuarios = array();
            foreach( $result as $r ){
                // Crea objeto
                $usuario = new Usuario();
                // Asigna datos
                $usuario->setId( $r['PK_usu_id'] );
                $usuario->setUsername( $r['usu_username'] );
                $usuario->setRol( $r['FK_rol_id'] );

                //Agrega al array
                $arrayUsuarios[] = $usuario;
            }
            return $arrayUsuarios;
        }
    }



}