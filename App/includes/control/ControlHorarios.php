<?php namespace Control;


use Modelo\Persistencia\Horarios;
use Objetos\Horario;

class ControlHorarios{

    private $perHorarios;
    private $conMaterias;
    private $conStudents;

    public function __construct(){
        $this->perHorarios = new Horarios();
        $this->conMaterias = new ControlMaterias();
        $this->conStudents = new ControlEstudiantes();
    }

    public function getDays(){
        $result = $this->perHorarios->getDays();
        if( !is_array($result) )
            return $result;
        else{
            $days = array();
            foreach( $result as $day ){
                //TODO: Cambiar idioma aqui y en persistencia
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
                //TODO: Cambiar idioma aqui y en persistencia
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
     * @param String|int $id
     * @return array|bool|Horario|null|string
     */
    public function getFullCurrentSchedule_ByStudentId( $id ){
        $result = $this->getCurrentScheduleMain_ByStudentId( $id );
        if( $result === false )
            return 'error';
        else if( $result === null )
            return null;
        else{

            $schedule = $result;
            //Se obtienen materias
            $subjects = $this->getScheduleSubject_ByScheduleId( $schedule['id'] );
            //Se obtienen horas
            $hoursAndDays = $this->getScheduleHours_ByScheduleId( $schedule['id'] );

            //----Creando objeto
            $scheduleObj = new Horario();
            //TODO: agregar validacion
            $scheduleObj->setIdSchedule( $schedule['id'] );
            $scheduleObj->setScheduleStatus( $schedule['status'] );
            $scheduleObj->setSubjects( $subjects );
            $scheduleObj->setHoursAndDays( $hoursAndDays );
            return $scheduleObj;
        }
    }

    /**
     * Obtiene la referencia general del horario del estudiante
     * @param int $id String|int
     * @return array|bool|null
     */
    public function getCurrentScheduleMain_ByStudentId($id){
        $cycle = $this->getCurrentCycle();
        //Si no es el resultado esperado
        if( !is_array($cycle) )
            return $cycle;
        else{
            //Si existe ciclo se busca horario del estudiante
            $result = $this->perHorarios->getScheduleMain_ByStudentId( $id, $cycle['id'] );
            if( $result === false )
                return 'error';
            else if( $result === null )
                return null;
            else
                return $this->makeArray_Schedule( $result[0] );
        }
    }


    /**
     * Obtenemos Materias de horario especifico
     * @param int $scheduleid
     * @return array|bool|string
     */
    public function getScheduleSubject_ByScheduleId( $scheduleid ){
        return $this->conMaterias->getScheduleSubjects_ByScheduleId( $scheduleid );
    }

    /**
     * Obtenemos Horas de un horario especifico
     * @param String|int $idSchedule
     * @return array|bool|string
     */
    public function getScheduleHours_ByScheduleId($idSchedule ){
        $result = $this->perHorarios->getScheduleHours_ByScheduleId( $idSchedule );
        if( $result === false )
            return 'error';
        else if( $result === false )
            return null;
        else{
            $arrayHoras = array();
            foreach( $result as $hd ){
                $arrayHoras[] = $this->makeArray_HoursAndDays( $hd );
            }
            return $arrayHoras;
        }
    }


    /**
     * @param $idStudent String|int del estudiante
     * @return bool|string
     */
    public function haveStudentCurrentSchedule_ByStudentId($idStudent){
        $result = $this->getCurrentScheduleMain_ByStudentId($idStudent);
        if( $result === false )
            return 'error';
        else if( $result === null)
            return false;
        else
            return true;
    }

    /**
     * Comprueba que un horario exista mediante su ID
     * @param int $scheduleId id del horario a verificar
     * @return bool|string
     * Regresa FALSE cuando no existe
     * TRUE cuando existe
     * regresa la cadena 'error' cuando Ocurrio un error
     */
    public function isScheduleExist( $scheduleId ){
        $result = $this->getCurrentScheduleMain_ByStudentId( $scheduleId );
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

    /**
     * @param $idStudent
     * @param $hours
     * @param $subjects
     * @return array
     */
    public function insertStudentSchedule( $idStudent, $hours, $subjects ){

        //Iniciamos transaccion
        //TODO: Agregar verificacion
        Horarios::initTransaction();

        $result = $this->getCurrentCycle();
        if( $result === 'error' ){
            return Funciones::makeArrayResponse(
                'error',
                'cycle',
                "No se pudo obtener el ciclo actual"
            );
        }
        else if( $result === null ){
            return Funciones::makeArrayResponse(
                false,
                'cycle',
                "No hay un ciclo actual disponible"
            );
        }
        //Se guarda id del ciclo actual
        $cycleid = $result['id'];
        //Verificamos que no tenga un horario
        $result = $this->haveStudentCurrentSchedule_ByStudentId($idStudent);
        if( $result === 'error' ){
            return Funciones::makeArrayResponse(
                'error',
                'schedule',
                "No se pudo verificar existencia de horario del estudiante"
            );
        }
        //Si ya tiene un horario registrado en el ciclo actual
        else if( $result === true ){
            return Funciones::makeArrayResponse(
                false,
                'schedule',
                "Estudiante ya tiene un horario registrado"
            );
        }


        //------------REGISTRO DE HORARIO

        //Verificamos que usuario exista
        //TODO: utilizar un método que regrese true/false
        $result = $this->conStudents->isStudentExist_ById( $idStudent );
        if( $result === 'error' ){
            Horarios::rollbackTransaction();
            return Funciones::makeArrayResponse(
                'error',
                'student',
                "No se pudo verificar estudiante"
            );
        }
        else if( $result === null ){
            Horarios::rollbackTransaction();
            return Funciones::makeArrayResponse(
                false,
                'student',
                "Estudiante no existe"
            );
        }

        //TODO: Verificar que no tenga un horario registrado (Por concurrencia, si se registra desde otro lado)
        //---------HORARIO
        $result = $this->perHorarios->insertSchedule( $idStudent, $cycleid );
        if( !$result ) {
            Horarios::rollbackTransaction();
            return Funciones::makeArrayResponse(
                'error',
                'schedule',
                "Ocurrio un error al registrar horario"
            );
        }

        //Se obtiene horario (la referencia principal) del estudiante
        $result = $this->getCurrentScheduleMain_ByStudentId($idStudent);
        if( $result === 'error' ){
            Horarios::rollbackTransaction();
            return Funciones::makeArrayResponse(
                false,
                'schedule',
                "No se pudo obtener horario registrado"
            );
        }
        else if( $result === null ){
            Horarios::rollbackTransaction();
            return Funciones::makeArrayResponse(
                "error",
                'schedule',
                "No se encontro horario registrado del estudiante"
            );
        }
        //Se saca id del horario
        $idSchedule = $result['id'];

        //---------HORAS
        //Se registran horas
        //TODO: verificar las horas antes de registrar
        $result = $this->perHorarios->insertScheduleHours( $idSchedule, $hours );
        if( !$result ) {
            Horarios::rollbackTransaction();
            return Funciones::makeArrayResponse(
                'error',
                'hours',
                "No se pudieron registrar las horas del horario"
            );
        }

        //---------MATERIAS
        //TODO: vericicar las materias antes de registrar
        $result = $this->perHorarios->insertScheduleSubjects( $idSchedule, $subjects );
        if( !$result ) {
            Horarios::rollbackTransaction();
            return Funciones::makeArrayResponse(
                'error',
                'subjects',
                "No se pudieron registrar las materias del horario"
            );
        }

        //Si el registro resulto éxitoso

        //Si sale bien
        Horarios::commitTransaction();
        return Funciones::makeArrayResponse(
            true,
            "schedule",
            "Se registro horario con éxito"
        );
    }



    //------------------------------
    // FUNCIONES ADICIONALES
    //------------------------------

    private static function makeArray_Schedule($s){
        $hoursAndDays = [
            'id'            => $s['id'],
            'date'          => $s['fecha'],
            'validation'    => $s['validado'],
            'status'        => $s['estado']
        ];
        return $hoursAndDays;
    }



    private static function makeArray_HoursAndDays($hd){
        $hoursAndDays = [
            'id'  => $hd['id'],
            'day'  => $hd['dia'],
            'hour' => $hd['hora']
        ];
        return $hoursAndDays;
    }




}