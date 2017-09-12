<?php namespace Control;


use Modelo\Persistencia\Horarios;
use Negocio\Objetos\Horario;

class ControlHorarios{

    private $perHorarios;
    private $conMaterias;

    public function __construct(){
        $this->perHorarios = new Horarios();
        $this->conMaterias = new ControlMaterias();
    }

    public function getDays(){
        $result = $this->perHorarios->getDays();
        if( !is_array($result) )
            return $result;
        else{
            $days = array();
            foreach( $result as $day ){
                $days[] = $day['dia'];
            }
        }
    }


    public function getHours_OrderByHour(){
        $result = $this->perHorarios->getHoursAndDays_OrderByHours();
        if( !is_array($result) )
            return $result;
        else{
            $hourAndDays = array();
            foreach( $result as $hd )
                $hourAndDays[] = $this->makeArray_HoursAndDays($hd);
            return $hourAndDays;
        }
    }


    public function getCurrentCycle(){
        $result = $this->perHorarios->getCurrentCycle();
        if( !is_array($result) )
            return $result;
        else{
            //Si array esta vacio
            if( count($result) == 0 )
                return null;
            //Si tiene datos
            else {
                $ciclo = [
                    "id" => $result[0]['id'],
                    'start' => $result[0]['inicio'],
                    'end' => $result[0]['fin']
                ];
                return $ciclo;
            }
        }
    }



    //------------------------
    //  HORARIO DEL ESTUDIANTE
    //------------------------


    /**
     * Obtiene los datos completos del horario de un estudiante
     * @param int $id
     * @return array|bool|Horario|null|string
     */
    public function getFullCurrentSchedule_ByStudentId(int $id ){
        $result = $this->getCurrentSchedule_ByStudentId( $id );
        if( !is_array($result) )
            return $result;
        else{
            $subject = $this->getScheduleSubject_ByScheduleId( $result['id'] );
            $hoursAndDays = $this->getScheduleHours_ByScheduleId( $result['id'] );
            $schedule = new Horario($result['id'], $hoursAndDays, $subject, $result['status']);
            return $schedule;
        }
    }

    /**
     * Obtenemos Horario de estudiante en ciclo actual
     * @param int $id
     * @return array|bool|null|string
     */
    public function getCurrentSchedule_ByStudentId(int $id){
        $cycle = $this->getCurrentCycle();

        //Si no es el resultado esperado
        if( !is_array($cycle) )
            return $cycle;
        else{
            $result = $this->perHorarios->getScheduleId_ByStudentId( $id, $cycle['id'] );
            if( !is_array($result) )
                return $result;
            else {
                return $this->makeArray_Schedule( $result[0] );
            }
        }
    }

    /**
     * Obtenemos Materias de horario especifico
     * @param int $scheduleid
     * @return array|bool|string
     */
    public function getScheduleSubject_ByScheduleId(int $scheduleid ){
        return $this->conMaterias->getSubjects_ByScheduleId( $scheduleid['id'] );
    }

    /**
     * Obtenemos Horas de un horario especifico
     * @param int $scheduleid
     * @return array|bool|string
     */
    public function getScheduleHours_ByScheduleId(int $scheduleid ){
        $result = $this->perHorarios->getScheduleHours_ByScheduleId( $scheduleid['id'] );
        if( !is_array($result) )
            return $result;
        else{
            $arrayHoras = array();
            foreach( $result as $hd ){
                $arrayHoras[] = $this->makeArray_HoursAndDays( $hd );
            }
            return $arrayHoras;
        }
    }

    /**
     * Comprueba que un horario exista mediante su ID
     * @param int $scheduleId id del horario a verificar
     * @return bool|string
     * Regresa FALSE cuando no existe
     * TRUE cuando existe
     * regresa la cadena 'error' cuando Ocurrio un error
     */
    public function isScheduleExist( int $scheduleId ){
        $result = $this->getCurrentSchedule_ByStudentId( $scheduleId );
        //Error
        if( $result == false ){
            return 'error';
        }
        //No existe
        else if( $result != null )
            return true;
        //Existe
        else
            return false;
    }



    //------------------------ REGISTRO DE HORARIO

    public function insertStudentSchedule( $idStudent, $hours, $subjects ){
        $cycleRes = $this->getCurrentCycle();
        if( is_array($cycleRes) )
            return $cycleRes;
        else{
            $this->perHorarios->initTransaction();

            //Iniciamos transaccion
            Horarios::initTransaction();

            //---------HORARIO
            $result = $this->perHorarios->insertStudentSchedule( $idStudent, $hours, $subjects );

            //---------HORARIO
        }
    }



    //------------------------------
    // FUNCIONES ADICIONALES
    //------------------------------

    private function makeArray_Schedule($s){
        $hoursAndDays = [
            'id'            => $s['id'],
            'date'          => $s['fecha'],
            'validation'    => $s['validado'],
            'status'        => $s['estudiante']
        ];
        return $hoursAndDays;
    }



    private function makeArray_HoursAndDays($hd){
        $hoursAndDays = [
            'id'  => $hd['id'],
            'day'  => $hd['dia'],
            'hour' => $hd['hora']
        ];
        return $hoursAndDays;
    }






}