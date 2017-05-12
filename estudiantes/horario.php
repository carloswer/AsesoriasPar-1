<?php 

	require_once 'sesiones.php';
	require_once '../config.php';
	//Si existe, toma el usuario

	session_start();
	$username = $_SESSION['username'];

	use Datos\Generico;
    $generico = new Generico();
    $query = "SELECT "
    $horario = $generico->query($query);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Horario</title>
	<link rel="stylesheet" href="../assets/stylesheet/estilos.css">
</head>
<body>
	
	<h1>Horario << <?= $username ?> >></h1>
	<?php include_once "inc_menu.php"; ?>


	<!-- TABLA DE HORARIO -->
	<div id="horario">
        <table width="100%">
            <tr>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>

            <?php $hora=8; while($hora <= 18): ?>
                <tr>
                <?php $dia=1; while($dia <= 5): ?>

                    <td>
                        <a href="javascript:void(0)" class="item-hora" data-dia="<?= $dia; ?>" data-hora="<?= $hora.":00:00"; ?>"> 
                            <?= $hora.":00"; ?> 
                        </a>
                    </td>

                <?php $dia++; endwhile; ?>
                </tr>
            <?php $hora++; endwhile; ?>
        </table>

	<script src="../assets/js/vendor/jquery.js"></script>
	<script src="../assets/js/custom.js"></script>
</body>
</html>