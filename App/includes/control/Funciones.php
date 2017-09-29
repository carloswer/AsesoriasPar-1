<?php namespace Control;
use Carbon\Carbon;

class Funciones{

    /**
     * Método que crea un JSON String a partir de parametros
     * @param String $type Valor que identifica al objeto JSON
     * @param $result
     * @param String $message descripcion del mensaje
     * @param $extra null Valor Omitido por defecto, se le puede asignar cualquier valor
     * @return string regresa un JSON como String
     */
    public static function makeJsonResponse(String $type, $result, String $message, $extra = null ){
        $json = [
            'type'      => $type,
            'result'    => $result,
            'message'   => $message,
            'extra'     => $extra
        ];
        return json_encode($json);
    }

    /**
     * @param $result mixed mensaje que identifica el resultado de la peticion
     * @param String $type tipo de respuesta resultante
     * @param String $message mensaje de retorno del resultado
     * @param null $extra valor adicional que se desee agregar
     * @return array
     */
    public static function makeArrayResponse($result, String $type, String $message, $extra = null){
        $response = [
            "result" => $result,
            "type" => $type,
            "message" => $message,
            "extra" => $extra
        ];
        return $response;
    }


    private static function separeDaysOfHours( $hoursAndDays ){
        $daysArray = array();
        //Separando dias de resultado
        foreach( $hoursAndDays as $hd ){
            if( !in_array($hd['day'], $daysArray) ) {
                $daysArray[] = $hd['day'];
            }
        }
        return $daysArray;
    }


    /**
     * Método que verifica si la hora del día son parte del horario del asesor
     * @param $horas array Horas array totales existentes
     * @param $hora array hora a comparar
     * @return bool TRUE si existe, FALSE si no existe
     */
    private static function isHourOfScheule($horas, $hora ){
        foreach($horas as $horaX ){
            if( $hora['id'] == $horaX['id'] )
                return true;
        }
        return false;
    }

    /**
     * Método que ordena las horas de cada dia por separado y los concatena para
     * @param $hoursArray
     * @param null|array $sheduleArray
     * @return string
     */
    public static function makeScheduleTable($hoursArray, $sheduleArray = null ){

        $days = self::separeDaysOfHours( $hoursArray );

        //-----Encabezado (dias)
        $head = '<table width="100%">'."\n";
        $head .= '<tr>'."\n";
        foreach( $days as $day ){
            $head .= '<th><span class="dia-item">'.$day.'</span></th>'."\n";
        }
        $head .= '</tr>'."\n";

        //-----Cuerpo (Horas)
        $body = null;
        $cont = 0;
        foreach($hoursArray as $hour ){

            if( $cont == 0 ) {
                $body .= "<tr>\n";
            }
            else if( $cont == count($days) ) {
                $body .= "</tr>\n";
                $cont = 0;
            }
            //Siempre se ejecuta
            if( $cont < count($days) ) {
                $cont++;

                //---------------COLUMNAS
                //Si se le envia un horario, es para que marque aquellas ya seleccionadas
                $body .= '<td>';
                if( $sheduleArray != null ){
                    if( self::isHourOfScheule($sheduleArray, $hour) )
                        $body .= '<span class="hora-item hora-selected" data-id="'.$hour['id'].'" data-day="'.$hour['day'].'" data-hour="'.$hour['hour'].'">'.$hour['hour'].'</span>';
                    else
                        $body .= '<span class="hora-item" data-id="'.$hour['id'].'" data-day="'.$hour['hour'].'" data-hour="'.$hour['hour'].'">'.$hour['hour'].'</span>';
                }
                else
                    $body .= '<span class="hora-item" data-id="'.$hour['id'].'" data-day="'.$hour['day'].'" data-hour="'.$hour['hour'].'">'.$hour['hour'].'</span>';
                $body .= "</td>\n";

            }
        }

        $body .= "</table>\n";
        return $head.$body;
    }

    public static function getCurrentDay(){

    }


}


?>