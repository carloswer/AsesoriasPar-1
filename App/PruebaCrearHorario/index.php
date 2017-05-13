<?php
    require_once "config.php";
    $tituloPagina = "Inicio";


    // use Negocio\Controles\ControlEstudiantes;
    // $ctrlEstudiantes = new ControlEstudiantes();
    // $listaEstudiantes = $ctrlEstudiantes->obtenerEstudiante();
    // $numEstudiantes = count($listaEstudiantes);

    use Datos\Generico;
    $generico = new Generico();
    $result = $generico->query("SELECT * FROM usuario");
?>


<?php include TEMP_PATH . DS . "header.php"; ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <?php foreach( $result as $e  ): ?>
        <?= $e['PK_est_id']."<br>";  ?>
    <?php endforeach; ?>
    
</body>
</html>
