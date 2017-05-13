<?php


namespace Negocio\Controles;
use Datos\Persistencia;

class ControlMaterias
{

    private $persistencia;

    public function __construct(){
        $this->persistencia = new Persistencia;
    }

    public function obtenerMaterias(): array{
        return $this->persistencia->obtenerMaterias();
    }

    public function obtenerMateriasCarrera(Carrera $carrera): array{
        return $this->persistencia->obtenerMateriasCarrera($carrera);
    }
}