<?php namespace Control;

use Modelo\Persistencia\Asesorias;
use Objetos\Asesoria;
use Control\ControlMaterias;
use Carbon\Carbon;

class ControlAsesorias
{

    private $perAsesorias;
    private $conMaterias;


    //------Variables estaticas
    //Estados int
    public static $ESTADO_CANCELADO = 1;
    public static $ESTADO_REALIZADO = 2;
    public static $ESTADO_NO_REALIZADO = 3;
    //String
    public static $CANCELADO = "Cancelado";
    public static $REALIZADO = "Realizado";
    public static $NO_REALIZADO = "No realizado";

    public function __construct()
    {
        $this->perAsesorias = new Asesorias();
        $this->conMaterias = new ControlMaterias();
    }

    public function obtenerAsesorias_Asesor_CicloActual( $idAsesor, $idCiclo  ){
        $result = $this->perAsesorias->getAsesorias_Asesor_Ciclo( $idAsesor, $idCiclo );
        if( !is_array($result) )
            return $result;
        else {
            $arrayAsesorias = array();
            foreach ($result as $as) {
                $asesoria = $this->crearObjeto( $as );
                $arrayAsesorias[] = $asesoria;
            }
            return $arrayAsesorias;
        }
    }

    public function obtenerAsesorias_Alumno_CicloActual( $idAsesor, $idCiclo  ){
        $result = $this->perAsesorias->getAsesorias_Alumno_Ciclo( $idAsesor, $idCiclo );
        if( !is_array($result) )
            return $result;
        else {
            $arrayAsesorias = array();
            foreach ($result as $as) {
                $asesoria = $this->crearObjeto( $as );
                $arrayAsesorias[] = $asesoria;
            }
            return $arrayAsesorias;
        }
    }


    public function obtenerMateriasConAsesores( $idCiclo ){
        return $this->conMaterias->obtenerMateriasConAsesores( $idCiclo );
    }

    public function obtenerMateriasConAsesores_SinEstudianteX($idCiclo, $idEstudiante ){
        return $this->conMaterias->obtenerMateriasConAsesores_SinEstudianteX( $idCiclo, $idEstudiante );
    }


    //-------------------------
    //  Extras
    //-------------------------

    private function crearObjeto( $as ){
        $asesoria = new Asesoria();
//        ASesoria
        $asesoria->setId($as['id']);
        $asesoria->setFechaAsesoria($as['fecha_asesoria']);
        $asesoria->setFechaSolicitud( $as['fecha_solicitud'] );
        $asesoria->setHora($as['hora']);
        $asesoria->setDescripcion($as['descripcion']);
//        Materia
        $asesoria->setMateria(
            $array = [
                'id' => $as['materia_id'],
                'nombre' => $as['materia_nombre'],
                'materia_horario_id' => $as['materia_horario_id']
            ]
        );
//        Estudiantes
        $asesoria->setAlumno($array = ['id' => $as['alumno_id'], 'nombre' => $as['alumno_nombre']]);
        $asesoria->setAsesor($array = ['id' => $as['asesor_id'], 'nombre' => $as['asesor_nombre']]);
//        Estado (si hay registro)
        if( $as['estado_id'] != null ) {
            $asesoria->setEstado(
                $array = [
                    'id' => $as['estado_id'],
                    'tipo' => $as['estado_tipo'],
                    'comentario' => $as['estado_comentario'],
                    'fecha' => $as['estado_fecha'],
                    'calificacion' => $as['estado_califacion']
                ]
            );
        }

        return $asesoria;
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
            false;
    }

    public function isHoy( $fechaX ){
        if( $this->diferenciaDias_Hoy( $fechaX ) == 0 )
            return true;
        else
            false;
    }



    public function isPosterior( $fechaX ){
        if( $this->diferenciaDias_Hoy( $fechaX ) < 0 )
            return true;
        else
            false;
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