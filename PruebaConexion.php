<?php

    // Turn off all error reporting
    error_reporting(0);

    require "includes/datos/Conexion.php";

    $db = Conexion::getInstance();
    $mysqli = $db->getConnection();
    $query = "SELECT * FROM materia";
    $result = $mysqli->query($query);


    //Mostrando
    while( $row = $result->fetch_array(MYSQLI_ASSOC) ){
        echo "ID: ".$row['IDmateria'];
        echo "<br>";
        echo "Nombre: ".$row['Nombre'];
        echo "<br><br>";
    }


?>

