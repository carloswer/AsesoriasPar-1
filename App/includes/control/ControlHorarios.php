<?php namespace Control;


use Modelo\Persistencia\Horarios;

class ControlHorarios{

    private $perHorarios;
    private $conMaterias;

    public function __construct(){
        $this->perHorarios = new Horarios();
        $this->conMaterias = new ControlMaterias();
    }


    //------------------ CALENDARIO
    
//    public function obtenerDiasHoras(){
//        $result = $this->perHorarios->getDiasHoras();
//        return $result;
//    }

//    public function obtenerDias(){
//        $result = $this->perHorarios->getDias();
//        return $result;
//    }

    public function obtenerDiasHoras_PorHora(){
        $result = $this->perHorarios->getDiasHoras_PorHoras();
        return $result;
    }


    public function obtenerCicloActual(){
        $result = $this->perHorarios->getCicloActual();
        if( !is_array($result) )
            return $result;
        else{
            $ciclo = [
                "id"    => $result[0]['id'],
                'inicio'=> $result[0]['inicio'],
                'fin'   => $result[0]['fin']
            ];
            return $ciclo;
        }
    }

    //------------------ HORARIO DEL ESTUDIANTE



    //TODO: deben juntarse las horas y las materias
    public function obtenerHorario_Estudiante($idEstudiante, $idCiclo){
        $result = $this->perHorarios->getHorario_Estudiante($idEstudiante, $idCiclo);
        if( !is_array($result) )
            return $result;
        else{
               $horario = array();
               foreach( $result as $dh ){
                   $dia_hora = [
                       'id'  => $dh['id'],
                       'dia'  => $dh['dia'],
                       'hora' => $dh['hora']
                   ];
                   $horario[] = $dia_hora;
               }
               return $horario;
        }
    }

    public function obtenerIdHorario_Estudiante_CicloActual($idEstudiante, $idCiclo){
        $result = $this->perHorarios->getHorarioId_CicloActual($idEstudiante, $idCiclo);
        if( !is_array($result) )
            return $result;
        else
            return $result[0]['id'];
    }

    public function obtenerMaterias_Horario( $IdHorario ){
        return $result = $this->conMaterias->obtenerMaterias_Horario( $IdHorario );
    }

    public function registrarHorario($idEstudiante, $idCiclo){
        return $this->perHorarios->insertHorario($idEstudiante, $idCiclo);
    }

    public function registrarHorario_DiasHoras($idHorario, $hora){
        return $this->perHorarios->insertHorario_DiasHoras($idHorario, $hora);
    }


    public function obtenerMaterias_Carrera( $carrera ){
        return $this->conMaterias->obtenerMaterias_Carrera( $carrera['nombre'] );
    }


    public function registrarHorario_Materias($idHorario, $idMateria){
        return $this->perHorarios->insertHorario_Materias($idHorario, $idMateria);
    }



    //------------------------------
    // FUNCIONES ADICIONALES
    //------------------------------

    /**
     * Método que verifica si la hora del día son parte del horario del asesor
     */
    public function isHoraHorario( $hora, $horario ){
        foreach ($horario as $h) {
            if( $h['id'] == $hora['id'] )
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

    public function separarDias($arrayDiasHoras ){
        $arrayDias = array();
        //Separando dias de resultado
        foreach($arrayDiasHoras as $dias ){
            if( !in_array($dias['dia'], $arrayDias) )
                $arrayDias[] = $dias['dia'];
        }
        return $arrayDias;
    }

}