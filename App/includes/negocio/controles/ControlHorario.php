<?php namespace Negocio\Controles;

    use Negocio\Controles\ControlMaterias;

    class ControlHorario
    {

        private $controlMaterias;

        public function __construct(){
            $this->controlMaterias = new ControlMaterias();
        }


        public function obtenerHorario(){


            return false;
        }

        public function registrarHorario( Horario $horario ){

        }

        public function verificar(){

        }

        //--------------- MATERIAS

        public function obtenerMaterias(){
            return $this->controlMaterias->obtenerMaterias();
        }

    }


?>


