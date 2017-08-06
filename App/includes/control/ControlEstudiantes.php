<?php namespace Control;

use Modelo\Persistencia\Estudiantes;
use Objetos\Estudiante;

class ControlEstudiantes{

    private $perEstudiantes;


    public function __construct(){
        $this->perEstudiantes = new Estudiantes();
    }


    public function obtenerEstudiante_UsuarioId( $id ){
        $result = $this->perEstudiantes->getEstudiante_UsuarioId( $id );
        if( count($result) == 0 )
            return null;
        else{
            // Crea objeto
            $estudiante = new Estudiante();
            // Asigna datos
            $estudiante->setIdUsuario( $result[0]['FK_usuario'] );
            $estudiante->setIdEstudiante( $result[0]['PK_est_id'] );
            $estudiante->setIdItson( $result[0]['est_id_itson'] );
            $estudiante->setNombre( $result[0]['est_nombre'] );
            $estudiante->setApellido( $result[0]['est_apellido'] );
            $estudiante->setTelefono( $result[0]['est_telefono'] );
            // $estudiante->setFacebook( $result[0]['est_facebook'] );
            $estudiante->setAvatar( $result[0]['est_avatar'] );
            $estudiante->setCarrera( $result[0]['carrera'] );

            return $estudiante;
        }
    }


    // public function obtenerEstudiante(int $id){

    // }

    // public function obtenerEstudiantes(){

    // }

    // public function obtenerEstudianteIdUsuario(int $id): array{
        // $result = $this->usuariosObj->getEstudianteIDUsuario($id);
        // //Agregando valores
        // $estudiante = array(
        //     "id"        => $result['PK_est_id'],
        //     "nombre"    => $result['est_nombre']." ".$result['est_apellido'],
        //     "carrera"   => $result['ca_nombre']
        // );
        // return $estudiante;
    // }


}