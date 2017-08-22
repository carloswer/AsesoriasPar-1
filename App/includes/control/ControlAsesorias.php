<?php namespace Control;

use Modelo\Persistencia\Asesorias;
use Objetos\Asesoria;

class ControlAsesorias
{

    private $perAsesorias;

    public function __construct()
    {
        $this->perAsesorias = new Asesorias();
    }

    public function obtenerAsesorias_asesor( $idAsesor  ){
        $result = $this->perAsesorias->getAsesorias_asesor();
        if (count($result) == 0)
            return null;
        else {
            $arrayAsesorias = array();
            foreach ($result as $as) {
                $asesoria = doObjetoAsesoria( $as );
                $arrayAsesorias[] = $asesoria;
            }
            return $arrayAsesorias;
        }
    }

    public function doObjetoAsesoria( $as ){
        $asesoria = new Asesoria();
        $asesoria->setId($as['asesoria_id']);
        $asesoria->setFecha($as['asesoria_fecha']);
        $asesoria->setDia($as['asesoria_dia']);
        $asesoria->setHora($as['asesoria_hora']);
        $asesoria->setMateria($as['asesoria_materia']);
        $asesoria->setDescripcion($as['asesoria_descripcion']);
        $asesoria->setAlumno($array = ['id' => $as['alumno_id'], 'nombre' => $as['alumno_nombre']]);
        $asesoria->setAsesor($array = ['id' => $as['asesor_id'], 'nombre' => $as['asesor_nombre']]);

        return $asesoria;
    }

}