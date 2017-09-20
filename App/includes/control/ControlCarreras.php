<?php namespace Control;

use Modelo\Persistencia\Carreras;
use Objetos\Carrera;

class ControlCarreras{
    
    private $perCareers;

    public function __construct(){
        $this->perCareers = new Carreras();
    }

    /**
     * @param $c array
     * return Carrera
     */
    public static function makeObject_career( $c ){
        $career = new Carrera();
        $career->setId( $c['id'] );
        $career->setName( $c['name'] );
        $career->setShortName( $c['short_name'] );
        $career->setDate( $c['date'] );
        return $career;
    }


    /**
     * @param $id
     * @return null|Carrera|string
     */
    public function getCareer_ById( $id ){
        
        $result = $this->perCareers->getCareer_ById($id);
        if( $result == false ){
            return 'error';
        }
        else if( $result == null )
            return null;
        else
            return self::makeObject_career($result[0]);
    }

    /**
     * @param $id
     * @return bool|string
     */
    public function isCareerExist_ById($id ){
        
        $result = $this->perCareers->getCareer_ById( $id );
        if( $result == false ){
            return 'error';
        }
        else if( $result == null )
            return false;
        else
            return true;
    }

    /**
     * @return array|null|string
     */
    public function getCareers(){
        
        $result = $this->perCareers->getCareers();
        if( $result == false ){
            return 'error';
        }
        else if( $result == null )
            return null;
        else{
            $array = array();
            foreach( $result as $career ){
                $array[] = self::makeObject_career($career);
            }
            return $array;
        }

    }





}