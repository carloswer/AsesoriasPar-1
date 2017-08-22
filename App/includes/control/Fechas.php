<?php

//CAMBIO DE ZONA HORARIA
date_default_timezone_set('America/Hermosillo');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'La zona horaria del script difiere de la zona horaria de la configuracion ini.';
} else {
    echo 'La zona horaria del script y la zona horaria de la configuración ini coinciden.';
}
echo "  <br>";
?>

<?php 


//SE OBTIENE LA FECHA ACTUAL
$dt_hoy=date('Y-m-d');

//RESTA DE DIAS
$dt_Ayer= date('Y-m-d', strtotime('-1 day')) ; // resta 1 día
$dt_laSemanaPasada = date('Y-m-d', strtotime('-1 week')) ; // resta 1 semana
$dt_elMesPasado = date('Y-m-d', strtotime('-1 month')) ; // resta 1 mes
$dt_ElAnioPasado = date('Y-m-d', strtotime('-1 year')) ; // resta 1 año



//SUMA DE DIAS
$dt_5DiasDespues = date('Y-m-d', strtotime('+5 day')) ; // Suma 5 días
$dt_5SemanasDespues = date('Y-m-d', strtotime('+5 week')) ; // Suma 5 semanas
$dt_5MesesDespues = date('Y-m-d', strtotime('+5 month')) ; // Suma 5 meses
$dt_5AniosDespues = date('Y-m-d', strtotime('+5 year')) ; // Suma 5 años

echo " <br>";

//SE OBTIENE EL DIA
$dt_dia=date("d", strtotime($dt_hoy));;
//SE OBTIENE EL MES
$dt_mes=date("m", strtotime($dt_hoy));;
//SE OBTIENE EL ANIO
$dt_anio=date("Y", strtotime($dt_hoy));;


//MUESTRA FECHA ACTUAL
echo $dt_hoy;
echo " Fecha actual <br>";

echo " <br>";

//MUESTRA LAS FECHAS QUE FUERON RESTADAS
echo $dt_Ayer;
echo " : menos 1 dia <br>";
echo $dt_laSemanaPasada  ;
echo " : menos 1 semana <br>";
echo $dt_elMesPasado;
echo ": menos 1 mes <br>";
echo $dt_ElAnioPasado ;
echo " :menos 1 anio <br>";

echo " <br>";

echo$dt_dia;
echo " Dia <br>";
echo$dt_mes;
echo " Mes <br>";
echo$dt_anio;
echo " Anio <br>";

echo " <br>";


//MUESTRA FECHA ACTUAL
echo $dt_hoy;
echo " : Fecha actual <br>";

echo " <br>";

//SE MUESTRAN LAS FECHAS QUE FUERON SUMADAS
echo $dt_5DiasDespues;
echo " : 5 dias despues <br>";
echo $dt_5SemanasDespues;
echo " : 5 semanas despues <br>";
echo $dt_5MesesDespues;
echo " : 5 meses despues <br>";
echo $dt_5AniosDespues;
echo " : 5 anios despues <br>";

echo " <br>";


//SE OBTIENE LA FECHA ACTUAL, ME AGRADA MAS QUE LA DE ARRIBA :) 
$hoy =getdate();


echo "<br>";

//MUESTRA EL CONTENIDO DEL ARREGLO
print_r($hoy);
echo "<br>";

//SE OBTIENE LOS DATOS DEL ARREGLO $hoy
$segundo=$hoy['seconds'];
$minuto=$hoy['minutes'];
$hora=$hoy['hours'];
$dia=$hoy['mday'];
$mes=$hoy['mon'];
$anio=$hoy['year'];

echo "<br>";

echo $segundo;
echo " Segundos <br>";
echo $minuto;
echo " Minutos <br>";
echo $hora;
echo " Hora <br>";
echo $dia;
echo " Dia <br>";
echo $mes;
echo " Mes <br>";
echo $anio;
echo " Anio <br>";

 ?>