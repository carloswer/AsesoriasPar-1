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
        if( !is_array($result) )
            return $result;
        else{
            // Crea objeto
            $estudiante = new Estudiante();
            // Asigna datos
            $estudiante->setIdUsuario( $result[0]['usuario_id'] );
            $estudiante->setIdEstudiante( $result[0]['id'] );
            $estudiante->setIdItson( $result[0]['id_itson'] );
            $estudiante->setNombre( $result[0]['nombre'] );
            $estudiante->setApellido( $result[0]['apellido'] );
            $estudiante->setTelefono( $result[0]['telefono'] );
            $estudiante->setFacebook( $result[0]['facebook'] );
            $estudiante->setAvatar( $result[0]['avatar'] );
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