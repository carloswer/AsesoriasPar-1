<?php
    include "includes/negocio/objetos/Carrera.php";
    include "includes/negocio/objetos/Materia.php";
    include "includes/negocio/objetos/Usuario.php";
    include "includes/negocio/objetos/Asesoria.php";
    include "includes/negocio/objetos/Horario.php";

    $carrera = new Negocio\Objetos\Carrera(001, "ISW");
    $materia = new Negocio\Objetos\Materia(001, "Progra", 2, $carrera);
    $usuario = new Negocio\Objetos\Usuario(001, "Asesor", "Carlos","Noriega", 01, "cnoriegacazarez@gmail.com", "Vycetamo1*", "6442306790", "carlosnoriega", "ISW", "avatar01", "listaCitas", "7:00-1:00", "Disponible", "10-01-17");
    $asesoria = new Negocio\Objetos\Asesorias(0001, "Carlos Noriega", "Luis Lopez", "Programacion 1", "10-02-17", "1:00", "Arreglos", true);
    $horario = new Negocio\Objetos\Horario("Carlos Noriega", "Lunes,Martes", "Programacion,Estructura", true, "NO");

    echo "-----------CARRERA <br>";
    echo "ID: ". $carrera->getIdCarrera();
    echo "<br>";
    echo "Nombre: ".$carrera->getNombre();

    echo "<br><br>";
    echo "-----------MATERIA <br>";
    echo "ID: ". $materia->getIdMateria();
    echo "<br>";
    echo "Nombre: ". $materia->getNombre();
    echo "<br>";
    echo "Semestre: ". $materia->getSemestre();
    echo "<br>";
    echo "Carrera: ". $materia->getCarrera()->getNombre();

    echo "<br><br>";
    echo "-----------USUARIO <br>";
    echo "Usuario ID: ". $usuario->getUsuarioId();
    echo "<br>";
    echo "Nombre: ". $usuario->getNombre();
    echo "<br>";
    echo "Apellido: ". $usuario->getApellido();
    echo "<br>";
    echo "Carrera: ". $usuario->getCarrera();
    

    echo "<br><br>";
    echo "-----------HORARIO <br>";
    echo "Asesor ". $horario->getAsesor();
    echo "<br>";
    echo "Lista de Materias: ". $horario->getListaMaterias();
    echo "<br>";
    echo "Requiere Validar: ". $horario->getRequiereValidar();


    echo "<br><br>";
    echo "-----------ASESORIA <br>";
    echo "Asesoria ID:  ". $asesoria->getAsesoriaID();
    echo "<br>";
    echo "Asesor: ". $asesoria->getAsesor();
    echo "<br>";
    echo "Asesorado: ". $asesoria->getAsesorado();
    echo "<br>";
    echo "Materia: ". $asesoria->getMateria();
    echo "<br>";
    echo "Descripcion: ". $asesoria->getDescripcion();
    

    echo "<br><br>";
    echo "ESTA ES UNA PRUEBA";
?>