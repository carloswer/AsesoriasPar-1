<?php namespace Control;


use Modelo\Persistencia\Horarios;
use Objetos\Materia;

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


    //------------------ HORARIO DEL ASESOR
    public function obtenerHorarioAsesor($idEstudiante, $idCiclo){
        $result = $this->perHorarios->getHorarioAsesor($idEstudiante, $idCiclo);
        if( count($result) == 0 )
            return null;
        else{
               $horario = array();
               foreach( $result as $dh ){
                   $dia_hora = [ 'dia' => $dh['dia'], 'hora' => $dh['hora'] ];
                   $horario[] = $dia_hora;
               }
               return $horario;
        }
    }

    public function obtenerHorarioId($idEstudiante, $idCiclo){
        $result = $this->perHorarios->getHorarioId($idEstudiante, $idCiclo);
        if( count($result) == 0 )
            return null;
        else
            return $result[0]['id'];
    }

    public function registrarHorario($idEstudiante, $idCiclo){
        return $this->perHorarios->insertHorario($idEstudiante, $idCiclo);
    }

    public function registrarHorario_DiasHoras($idHorario, $idDia, $idHora){
        return $this->perHorarios->insertHorario_DiasHoras($idHorario, $idDia, $idHora);
    }

    public function obtenerHorario_materias($idHorario){
        $result = $this->perHorarios->getHorarioMaterias($idHorario);
        if( count($result) == 0 )
            return null;
        else{
            $materias = array();
            foreach( $result as $mat ){
                $materia = new Materia();

                $materia->setId( $mat['PK_mat_id'] );
                $materia->setNombre( $mat['mat_nombre'] );
                $materia->setAbreviacion( $mat['mat_abreviacion'] );
                $materia->setDescripcion( $mat['mat_descripcion'] );
                $materia->setPlan( $mat['mat_plan'] );
                $materia->setSemestre( $mat['mat_semestre'] );
                $materia->setCarrera( $mat['FK_carrera'] );
                $materias[] = $materia;
            }
            return $materias;
        }
    }

    public function registrarHorario_Materias($idHorario, $idMateria){
        return $this->perHorarios->insertHorario_Materias($idHorario, $idMateria);
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