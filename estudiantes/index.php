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
	<?php include_once "inc_menu.php"; ?>

</body>
</html>