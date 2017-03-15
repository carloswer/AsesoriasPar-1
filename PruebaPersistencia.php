<?php

    include "config.php";

    $materias = new Materias();
    $arrayMaterias = $materias->getMaterias();

    //Mostrando
    while( $row = $arrayMaterias->fetch_array(MYSQLI_ASSOC) ){
        echo "ID: ".$row['IDmateria'];
        echo "<br>";
        echo "Nombre: ".$row['Nombre'];
        echo "<br>";
        echo "Semestre: ".$row['Semestre'];
        echo "<br>";
        echo "Carrera: ".$row['Carrera'];
        echo "<br><br>";
    }


?>