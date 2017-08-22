<?php namespace Control;


use Modelo\Persistencia\Horarios;
use Objetos\Materia;

class ControlHorarios{

    private $perHorarios;

    public function __construct(){
        $this->perHorarios = new Horarios();
    }


    //------------------ CALENDARIO
    
    public function obtenerDiasHoras(){
        $result = $this->perHorarios->getDiasHoras();
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
                "id"    => $result[0]['id'],
                'inicio'=> $result[0]['inicio'],
                'fin'   => $result[0]['fin']
            ];
            return $ciclo;
        }
    }

    public function separarDias( $dias_horas ){
        $arrayDias = array();
        //Separando dias de resultado
        foreach($dias_horas as $dias ){
            if( !in_array($dias['dia'], $arrayDias) )
                $arrayDias[] = $dias['dia'];
        }
        return $arrayDias;
    }

    public function obtenerDiasHorasSeparados($dias_horas ){
        $arrayDias = $this->separarDias( $dias_horas );
        $arrayDiasHoras = array();

        foreach( $arrayDias as $dia ){
            $arrayHoras = array();
            foreach( $dias_horas as $hora ){
                // Si la hora pertenece al dia lo agrega
                if( $hora['dia'] == $dia ) {
                    $arrayHoras[] = $hora;
                    echo "Se agrego hora ".$hora['hora']." al día ".$dia."<br>";
                }
            }
            //Lo agrega al array
            $arrayDiasHoras[] = $arrayHoras;
        }
        return $arrayDiasHoras;
    }


    //------------------ HORARIO DEL ESTUDIANTE
    //TODO: deben juntarse las horas y las materias
    public function obtenerHorarioAsesor_horas($idEstudiante, $idCiclo){
        $result = $this->perHorarios->getHorarioAsesor_horas($idEstudiante, $idCiclo);
        if( count($result) == 0 )
            return null;
        else{
               $horario = array();
               foreach( $result as $dh ){
                   $dia_hora = [
                       'dia'  => $dh['dia'],
                       'hora' => $dh['hora']
                   ];
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

    /**
     * Método que obtiene las materias de un horario
     * @param $idHorario
     * @return array|null
     */
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