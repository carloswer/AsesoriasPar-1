<?php 

	require_once '../../config.php';
	require_once '../session_login.php';
	include_once '../funciones.class.php';

	if( !isset($_POST['json']) ){
		return false;
		exit();
	}

	// $json = 
	// '{
	// 	"estudiante": 1,
	// 	"ciclo": 2
	// }';

	$json = $_POST['json'];
	$obj = json_decode($json);
	$cicloID = $obj->ciclo;
	$estudianteID = $obj->estudiante;

	//Obtiene dias
    $query = "SELECT PK_dia_id as 'id', dia_nombre as 'dia' 
                FROM dia order by id";
    $dias = $generico->getDatos($query);

    //Obtiene horas
    $query = "SELECT PK_hora_id as 'id', hora 
                FROM hora order by PK_hora_id";
    $horas = $generico->getDatos($query);



    //Obtener horario del estudiante
    $funciones = new Funciones();
    // TODO: obtener asesorias de cierta 'dia_hora' para bloquearlas
    $query = "SELECT dh.FK_hora as 'hora', 
				dh.FK_dia as 'dia', 
				dh.PK_dia_hora as 'id'
            FROM dia_hora dh
            INNER JOIN horario h ON h.PK_horario_id = dh.FK_horario
            WHERE h.FK_asesor = ".$estudianteID." AND h.FK_ciclo = ".$cicloID;
    $horario = $generico->getDatos($query);


    // Obtener dia_hora de asesorias para bloquear las que esten utilizadas
    $query = "SELECT 
				a.asesoria_fecha as 'fecha', 
				dh.FK_hora as 'hora',
				dh.FK_dia as 'dia'
			FROM asesoria a
			INNER JOIN dia_hora dh ON dh.PK_dia_hora = a.FK_dia_hora";
    $asesorias = $generico->getDatos($query);


    // --------------FORMANDO TABLA
    // Encabezado
    $diaF = 15;
    $fecha = '2017-05-';
    // $horaActual = '10:00:00';
    // $horasMinimas = 3;

	$resultado = 
	'
		<h3>Seleccione una hora de las disponibles del asesor</h3>
		<table width="100%">
		    <tr>
		        <th>
		        	<p>'.$fecha.($diaF).'</p>
		        	<p>Lunes</p>
		        </th>
		        <th>
		        	<p>'.$fecha.($diaF+1).'</p>
		        	<p>Martes</p>
		        </th>
		        <th>
		        	<p>'.$fecha.($diaF+2).'</p>
		        	<p>Miercoles</p>
		        </th>
		        <th>
		        	<p>'.$fecha.($diaF+3).'</p>
		        	<p>Jueves</p>
		        </th>
		        <th>
		        	<p>'.$fecha.($diaF+4).'</p>
		        	<p>Viernes</p>
		        </th>
		    </tr>
	';

	// Ciclos
	foreach( $horas as $hora ){
		$resultado .= '<tr>';
		foreach( $dias as $dia ){
			$resultado .= '<td>';

			// Incrementar a fecha para data-fecha
			$contador = ($dia['id'] - 1);

			// Solo muestra (bloquean) horas mayores (después a la hora actual, del dia actual) y un cierto rango antes (3 horas)
			// if( $hora['hora'] > ($horaActual + $horasMinimas)  ){

				//------ Comparacion de dias y horas del horario del asesor
				// Disponible en horario
				if( $funciones->isHorario( $horario, $dia, $hora ) ){
					$dh_id = $funciones->getDiaHoraID( $horario, $dia, $hora );
					$resultado .= '<a class="item-hora hora-asesoria" data-dia-hora="'.$dh_id.'" data-fecha="'.$fecha.($diaF+$contador).'" data-dia="'.$dia["id"].'" data-hora="'. $hora["id"] .'">'.$hora["hora"].'</a>';
				}

				// No disponible por asesoria registrada


				// Cuando no esta dispible en horario
				else{
					$resultado .= ' <a class="item-hora hora-blocked" data-fecha="'.$fecha.($diaF+$contador).'" data-dia="'.$dia["id"].'" data-hora="'. $hora["id"] .'">'.$hora["hora"].'</a>';
				}

				$resultado .= '</td>';
			// }
		}
		$resultado .= '</tr>';
	}
	$resultado .= '</table>';

	// Regresa resultado
	echo $resultado;
	

?>