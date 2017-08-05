<?php namespace Control;


use Modelo\Persistencia\Horarios;

class ControlHorarios{

    private $perHorarios;

    public function __construct(){
        $this->perHorarios = new Horarios();
    }


    //------------------ CALENDARIO
    
    public function obtenerHoras(){
        $result = $this->perHorarios->getHoras();
        return $result;
    }
    
    public function obtenerDias(){
        $result = $this->perHorarios->getDias();
        return $result;
    }


    public function obtenerHorarioAsesor($idEstudiante, $idCiclo){
        $result = $this->perHorarios->getHorarioAsesor($idEstudiante, $idCiclo);
        return $result;
    }


    public function obtenerCicloActual(){
        $result = $this->perHorarios->getCicloActual();
        if( count( $result ) == 0 )
            return null;
        else{
            $ciclo = [
                "id"    => $result[0]['PK_ciclo_id'],
                'inicio'=> $result[0]['ciclo_inicio'],
                'fin'   => $result[0]['ciclo_fin']
            ];
            return $ciclo;
        }
    }


    
    
    

    //------------------ FUNCIONES ADICIONALES

    /**
     * Método que verifica si la hora del día son parte del horario del asesor
     */
    public function isHorario($horario, $dia, $hora){
        foreach ($horario as $h) {
            if( ($h['hora'] == $hora['id']) && ($h['dia'] == $dia['id']) )
                return true;
        }
        return false;
    }

    public function getDiaHoraID( $horario, $dia, $hora ){
        foreach ($horario as $h) {
            if( ($h['hora'] == $hora['id']) && ($h['dia'] == $dia['id']) )
                return $h['id'];
        }
    }
}