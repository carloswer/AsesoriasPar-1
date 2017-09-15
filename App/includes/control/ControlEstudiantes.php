<?php namespace Control;

use Modelo\Persistencia\Carreras;
use Modelo\Persistencia\Estudiantes;
use Objetos\Carrera;
use Objetos\Estudiante;

class ControlEstudiantes{

    private $perStudents;


    public function __construct(){
        $this->perStudents = new Estudiantes();
    }

    public function getStudent_ById( $id ){
        $result = $this->perStudents->getStudent_ById( $id );
        if( $result == false )
            return 'error';
        else if( $result == null )
            return null;
        else{
            // Crea objeto
            return self::makeArray_Estudiante( $result[0] );
        }
    }


    public function getStuden_ByUserId( $id ){
        $result = $this->perStudents->getStudent_ByUserId( $id );
        if( $result == false )
            return 'error';
        else if( $result == null )
            return null;
        else{
            // Crea objeto
            return self::makeArray_Estudiante( $result[0] );
        }
    }



    //----------REGISTRAR ESTUDIANTE

    /**
     * @param $student Estudiante
     * @return null|Estudiante|string
     */
    public function insertStudent( $student ){
        $result = $this->perStudents->insertStuden( $student );
        if( $result == false )
            return 'error';
        else if( $result == null )
            return null;
        else{
            // Crea objeto
            return self::makeArray_Estudiante( $result[0] );
        }
    }





    /**
     * @param $s array
     * @return Estudiante
     */
    public static function makeArray_Estudiante($s){
        // Crea objeto
        $student = new Estudiante();
        // Asigna datos
        $student->setUser( $s['usuario_id'] );
        $student->setIdStudent( $s['id'] );
        $student->setIdItson( $s['id_itson'] );
        $student->setFirstName( $s['nombre'] );
        $student->setLastname( $s['apellido'] );
        $student->setPhone( $s['telefono'] );
        $student->setFacebook( $s['facebook'] );
        $student->setAvatar( $s['avatar'] );
        $student->setCareer( $s['carrera'] );

        $careerArray = [
            'id' => $s['career_id'],
            'name' => $s['career_name'],
            'short_name' => $s['career_short_name'],
            'date' => $s['career_date']

        ];
        $student->setCareer( Carreras::makeObject_career($careerArray) );
        //Se regresa
        return $student;
    }




}