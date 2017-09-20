<?php namespace Control;

use Modelo\Persistencia\Asesorias;
use Carbon\Carbon;
use Objetos\Asesoria;

class ControlAsesorias
{

    private $perAsesorias;


    //------Variables estaticas
    //Estados int
    public static $ESTADO_CANCELADO = 1;
    public static $ESTADO_REALIZADO = 2;
    public static $ESTADO_NO_REALIZADO = 3;
    //String
    public static $CANCELADO = "Cancelado";
    public static $REALIZADO = "Realizado";
    public static $NO_REALIZADO = "No realizado";

    public function __construct(){
        $this->perAsesorias = new Asesorias();
    }

    /**
     * @param $as
     */
    private static function makeObject_Asesoria( $as ){
        $asesoria = new Asesoria();

        $asesoria->setId( $as['id'] );
        $asesoria->setDate( $as['date'] );
        $asesoria->setRegisterDate( $as['registe_date'] );
        $asesoria->setDescription( $as['description'] );
        $asesoria->setHour( $as['hour'] );
        $asesoria->setStatus( self::makeArray_StatusAsesoria( $as ) );

        //Obteniendo y agregando alumno
        $conEstudiantes = new ControlEstudiantes();
        $alumno = $conEstudiantes->getStudent_ById( $as['alumno_id'] );
        $asesoria->setAlumno( $alumno );
        //Obteniendo y agregando Asesor
        $asesor = $conEstudiantes->getStudent_ById( $as['asesor_id'] );
        $asesoria->setAlumno( $asesor );

        //Obteniendo y agregando materia
        $conSubjects = new ControlMaterias();
        $subject = $conSubjects->getSubject_ById( $as['subject_id'] );
        $asesoria->setSubject( $subject );

        return $asesoria;
    }

    /**
     * @param $as array
     */
    public static function makeArray_StatusAsesoria( $as ){
        $array = [
            "id" => $as['status_id'],
            "type" => $as['status_type'],
            "comment" => $as['status_comment'],
            "date" => $as['status_date'],
            "calification" => $as['status_calification'],
        ];
        return $array;
    }







    /**
     * @param $idStudent
     * @return array|null|string
     */
    public function getCurrentAsesoriasLikeAsesor_ByStudent($idStudent ){
        $conHorarios = new ControlHorarios();
        $cycle = $conHorarios->getCurrentCycle();
        if( !is_array($cycle) )
            return $cycle;
        else{
            $result = $this->perAsesorias->getAsesoriasLikeAsesor_ByStudentIdAndSchedule( $idStudent, $cycle['id'] );
            if( $result === false )
                return 'error';
            else if( $result === null )
                return null;
            else{
                $array = array();
                foreach( $result as $as ){
                    $array[] = self::makeObject_Asesoria( $as );
                }
                return $array;
            }
        }

    }

    public function getCurrentAsesoriasLikeAlumno_ByStudent( $idAsesor ){

    }


    //-----------------
    // Materias
    //-----------------

    public function getCurrentAvailableSubject( $idStudent ){
        $conSubjects = new ControlMaterias();
        return $conSubjects->getCurrAvailScheduleSubs_SkipSutdent( $idStudent );
    }



    //------------------
    //  Fechas
    //------------------

    //http://php.net/manual/es/function.date.php
    /**
     * Método que compara la diferencia entre dos fechas y regresa la diferencia.
     * si el valor de positivo es true regresará valores absolutos (sin signo).
     * Por defecto siempre es false
     * @param String $fechaX Fecha de la asesoria
     * @param bool $positivo idicador de valor absoluto
     * @return mixed
     */
    private function diferenciaDias_Hoy($fecha, $positivo = false ){
        $hoy = Carbon::today();
        $fechaX = Carbon::parse( $fecha );
        $dif = $hoy->diffInDays( $fechaX, $positivo );
        return $dif;
    }

    public function diferenciaDias( $fechaX ){
        return $this->diferenciaDias_Hoy( $fechaX, true );
    }

    public function isAntes( $fechaX ){
        if( $this->diferenciaDias_Hoy( $fechaX ) > 0 )
            return true;
        else
            return false;
    }

    public function isHoy( $fechaX ){
        if( $this->diferenciaDias_Hoy( $fechaX ) == 0 )
            return true;
        else
            return false;
    }



    public function isPosterior( $fechaX ){
        if( $this->diferenciaDias_Hoy( $fechaX ) < 0 )
            return true;
        else
            return false;
    }

    /**
     * Método que verifica si un estado existe o es null, si es
     * null significa que dicha asesoria no ha sido validada lo
     * que requerira una fecha para verificar si es proxima, es
     * en el dia actual o posterior. En caso de ser validada
     * regresa el estado en texto
     * @param $estado
     * @param null $fechaAsesoria
     * @return string
     */
    public function verificarEstado($estado, $fechaAsesoria = null){
        //Sin validacion
        if( $estado == null ){
            //Cuando es proximo
            if( $this->isAntes( $fechaAsesoria ) )
                return "Proximo";
            //Cuando es el dia
            else if( $this->isHoy( $fechaAsesoria ) )
                return "Hoy";
            //Cuando ya paso
            else if( $this->isPosterior( $fechaAsesoria ) )
                return "Posterior";
            else
                return "Ninguno..";
        }
        //Cuando ya esta validado
        else{
            return $this->obtenerEstado( $estado['tipo'] );
        }
    }

    /**
     * Verifica el estado y lo regresa en formato de string
     * @param $estado
     * @return string
     */
    public function obtenerEstado( $estado ){
        switch ( $estado ){
            case self::$ESTADO_CANCELADO: return self::$CANCELADO; break;
            case self::$ESTADO_REALIZADO: return self::$REALIZADO; break;
            case self::$ESTADO_NO_REALIZADO: return self::$NO_REALIZADO; break;
            default: return "desconocido"; break;
        }
    }

    /**
     * Regresa una opcion adecuada dependiendo del estado de la asesoria
     * @param $estado
     * @return string
     */
    public function obtenerOpcion($estado){
        $opciones = '<a href="#" class="btn btn-primary">Ver</a>';
        if( $estado == null )
            $opciones .= "\n".'<a href="#" class="btn btn-danger">Cancelar</a>';

        return $opciones;
    }

}