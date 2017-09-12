<?php namespace Control;


class Funciones
{

    /**
     * Método que crea un JSON String a partir de parametros
     * @param String $type Valor que identifica al objeto JSON
     * @param $result
     * @param String $message descripcion del mensaje
     * @param $value null Valor Omitido por defecto, se le puede asignar cualquier valor
     * @return string regresa un JSON como String
     */
    public static function makeJsonResponse(String $type, $result, String $message, $value = null ){
        $json = [
            'type'      => $type,
            'result'    =>  $result,
            'message'   => $message,
            'value'     => $value
        ];
        return json_encode($json);
    }

    public static function isJSONResponse($json){
        if( json_decode($json) == null )
            return false;
        else
            return true;
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
     * @param null $sheduleArray
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


}


?>