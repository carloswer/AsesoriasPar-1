<?php

    namespace Negocio\Controles;
    use Datos\Persistencia;

    class ControlEstudiantes
    {
        private $persistencia;

        public function __construct(){
            $this->persistencia = new Persistencia;
        }


        public function obtenerEstudiante(): array{
            return $this->persistencia->obtenerEstudiantes();
        }


    }
?>