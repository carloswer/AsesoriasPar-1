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
            return self::makeArray_Student( $result[0] );
        }
    }

    public function isStudentExist_ById($id){
        $result = $this->perStudents->getStudent_ById( $id );
        if( $result === false )
            return 'error';
        else if( $result === null )
            return false;
        else
            return true;
    }


    public function getStuden_ByUserId( $id ){
        $result = $this->perStudents->getStudent_ByUserId( $id );
        if( $result == false )
            return 'error';
        else if( $result == null )
            return null;
        else{
            // Crea objeto
            return self::makeArray_Student( $result[0] );
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
        else
            return true;
    }





    /**
     * @param $s array
     * @return Estudiante
     */
    public static function makeArray_Student($s){
        // Crea objeto
        $student = new Estudiante();
        // Asigna datos
        //TODO: agregar usuario completo
        $student->setUser( $s['user_id'] );
        $student->setIdStudent( $s['id_student'] );
        $student->setIdItson( $s['id_itson'] );
        $student->setFirstName( $s['first_name'] );
        $student->setLastname( $s['last_name'] );
        $student->setPhone( $s['phone'] );
        $student->setFacebook( $s['facebook'] );
        $student->setAvatar( $s['avatar'] );

        $careerArray = [
            'id' => $s['career_id'],
            'name' => $s['career_name'],
            'short_name' => $s['career_short_name'],
            'date' => $s['career_date']

        ];
        $student->setCareer( ControlCarreras::makeObject_career($careerArray) );
        //Se regresa
        return $student;
    }




}