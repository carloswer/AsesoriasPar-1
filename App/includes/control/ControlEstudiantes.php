<?php namespace Control;

use Modelo\Persistencia\Estudiantes;
use Objetos\Estudiante;

class ControlEstudiantes{

    private $perEstudiantes;


    public function __construct(){
        $this->perEstudiantes = new Estudiantes();
    }

    public function getStudent_ById( $id ){
        $result = $this->perEstudiantes->getStudent_ById( $id );
        if( $result == false )
            return 'error';
        else if( $result == null )
            return null;
        else{
            // Crea objeto
            return $this->makeArray_Estudiante( $result[0] );
        }
    }


    public function getStuden_ByUserId( $id ){
        $result = $this->perEstudiantes->getStudent_ByUserId( $id );
        if( $result == false )
            return 'error';
        else if( $result == null )
            return null;
        else{
            // Crea objeto
            return $this->makeArray_Estudiante( $result[0] );
        }
    }

    private function makeArray_Estudiante($s){
        // Crea objeto
        $estudiante = new Estudiante();
        // Asigna datos
        $estudiante->setIdUser( $s['usuario_id'] );
        $estudiante->setIdStudent( $s['id'] );
        $estudiante->setIdItson( $s['id_itson'] );
        $estudiante->setFirstName( $s['nombre'] );
        $estudiante->setLastname( $s['apellido'] );
        $estudiante->setPhone( $s['telefono'] );
        $estudiante->setFacebook( $s['facebook'] );
        $estudiante->setAvatar( $s['avatar'] );
        $estudiante->setCareer( $s['carrera'] );
        $carrera = [
            'id' => $s['carrera_id'],
            'name' => $s['carrera_nombre'],
            'short_name' => $s['carrera_nombre']
        ];
        $estudiante->setCareer( $carrera );
        //Se regresa
        return $estudiante;
    }




}