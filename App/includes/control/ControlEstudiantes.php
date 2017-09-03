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
            return $this->crearObjeto( $result[0] );
        }
    }

    private function crearObjeto($est){
        // Crea objeto
        $estudiante = new Estudiante();
        // Asigna datos
        $estudiante->setIdUsuario( $est['usuario_id'] );
        $estudiante->setIdEstudiante( $est['id'] );
        $estudiante->setIdItson( $est['id_itson'] );
        $estudiante->setNombre( $est['nombre'] );
        $estudiante->setApellido( $est['apellido'] );
        $estudiante->setTelefono( $est['telefono'] );
        $estudiante->setFacebook( $est['facebook'] );
        $estudiante->setAvatar( $est['avatar'] );
        $estudiante->setCarrera( $est['carrera'] );
        $carrera = [
            'id' => $est['carrera_id'],
            'nombre' => $est['carrera_nombre']
        ];
        $estudiante->setCarrera( $carrera );
        //Se regresa
        return $estudiante;
    }




}