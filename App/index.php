<?php
    require_once "config.php";
    $tituloPagina = "Inicio";


    // use Negocio\Controles\ControlEstudiantes;
    // $ctrlEstudiantes = new ControlEstudiantes();
    // $listaEstudiantes = $ctrlEstudiantes->obtenerEstudiante();
    // $numEstudiantes = count($listaEstudiantes);
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <h1>Iniciar sesion</h1>
    <form action="login.php" method="POST">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user">
        <br>

        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass">
        <br>
        <input type="submit" value="Iniciar sesion">
    </form>
    
</body>
</html>
