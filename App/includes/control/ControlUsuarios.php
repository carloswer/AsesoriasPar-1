<?php namespace Control;

use Modelo\Persistencia\Usuarios;
use Objetos\Estudiante;
use Objetos\Usuario;

class ControlUsuarios{

    private $perUsers;
    private $conStudents;
    private $conCareer;


    public function __construct(){
        $this->perUsers = new Usuarios();
        $this->conStudents = new ControlEstudiantes();
        $this->conCareer = new ControlCarreras();
    }


    public function getUser_ByAuth($user, $pass){
        $result = $this->perUsers->getUser_ByAuth($user, $pass);
        if( $result == false ){
            return 'error';
        }
        else if( $result == null )
            return null;
        else
            return $this->makeObject($result[0]);
    }

    public function getUser_ById($id){
        $result = $this->perUsers->getUser_ById( $id );
        if( $result == false )
            return 'error';
        else if( $result == null )
            return null;
        else
            return $this->makeObject($result[0]);
    }

    public function isUserExist_ById($id){
        $result = $this->getUser_ById($id);
        if( $result == 'error' )
            return $result;
        else if( $result == null )
            return false;
        else
            return true;
    }

    public function getUser_ByUsername( $username ){

    }



    //------------------REGISTRAR USUARIO

    /**
     * @param $userIduser Usuario
     * @param $student Estudiante
     * @param $careerId int|String
     * @return bool|null|Usuario|string
     */
    public function insertUser($user, $student, $careerId ){
        $this->perUsers::initTransaction();

        //Registramos usuario
        $result = $this->perUsers->insertUser( $user );
        if( !$result ) {
            $this->perUsers::rollbackTransaction();
            return 'error';
        }

        //Registramos ultimo usuario (debe ser el mismo)
        //TODO: obtener con el nombre de usuario
        $result = $this->perUsers->getUser_Last();
        if( !$result ) {
            $this->perUsers::rollbackTransaction();
            return 'error';
        }
        else if( $result == null ){
            $this->perUsers::rollbackTransaction();
            return null;
        }

        //Obtiene Id del usuario y se lo agrega al estudiante
        $userId = $this->makeObject( $result );

        //Se verifica carrera
        $this->conCareer->checkCareer_ById( $careerId );
        if( $result != true ) {
            $this->perUsers::rollbackTransaction();
            return 'error';
        }

        //Registramos estudiante
        $student->setUser( $userId );
        $result = $this->conStudents->insertStudent( $student );
        if( !$result ) {
            $this->perUsers::rollbackTransaction();
            return 'error';
        }

        $this->perUsers::commitTransaction();
        return true;
    }



    //-----------------------
    // EXTRAS
    //-----------------------
    /**
     * array['field']
     *
     * @param $data array
     * @return Usuario
     */
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