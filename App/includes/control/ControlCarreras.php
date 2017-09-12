<?php namespace Control;

use Objetos\Carrera;

class ControlCarreras{

    private $perCarreras;

    public function __construct(){
        $this->perCarreras = new Carreras();
    }


//    public function makeObject_career( $c ){
//        $career = new Carrera();
//        $career->setId( $c['_'] );
//    }

}