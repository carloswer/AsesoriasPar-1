<?php 


class Funciones{
	function __construct(){}

	function isHorario($horario, $dia, $hora){
        foreach ($horario as $h) {
            if( ($h['hora'] == $hora['id']) && ($h['dia'] == $dia['id']) )
                return true;
        }
        return false;
    }
}

?>