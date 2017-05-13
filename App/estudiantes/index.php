<?php 

	//follow: https://www.tutorialspoint.com/php/php_mysql_login.htm

	require_once '../config.php';
	require_once 'sesiones.php';



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<h1>Bienvenido estudiante << <?= $username; ?> >></h1>
	<?php include_once "inc_menu.php"; ?>

</body>
</html>