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
        <table>
            <tr>
                <td>
                    <label for="user">Usuario:</label>
                </td>
                <td>
                    <input type="text" name="user" id="user">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Contraseña:</label>    
                </td>
                <td>
                    <input type="password" name="pass" id="pass">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Iniciar sesion">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
