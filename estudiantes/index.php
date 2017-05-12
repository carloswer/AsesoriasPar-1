<?php 

	require_once 'sesiones.php';
	require_once '../config.php';
	//Si existe, toma el usuario
	$username = $_SESSION['username'];

	use Datos\Generico;
    $generico = new Generico();
    // $datos = $generico->query("SELECT * FROM ")

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<h1>Bienvenido estudiante << <?= $username ?> >></h1>
	<a href="logout.php">cerrar sesion</a>
	<ul>
		<ul>
			<li><a href="#">Configuracion</a></li>
			<li><a href="#">Horario</a></li>
			<li><a href="#">Asesorias</a></li>
		</ul>
	</ul>

</body>
</html>