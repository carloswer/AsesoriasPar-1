<?php 

	require_once '../config.php';
	require_once 'sesiones.php';
	require_once 'generico.php';

	//Obtiene dias
	$query = "SELECT PK_dia_id as 'id', dia_nombre as 'dia' FROM dia order by id";
    $dias = $generico->query($query);
    //Obtiene horas
    $query = "SELECT PK_hora_id as 'id', hora FROM hora order by PK_hora_id";
    $horas = $generico->query($query);
    //Obtiene materias
    $query = "SELECT PK_mat_id as 'id', mat_nombre as 'materia' FROM materia order by PK_mat_id";
    $materias = $generico->query($query);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../assets/stylesheet/estilos.css">
</head>
<body>
	
	<h1>Crear horario << <?= $username; ?> >></h1>
	<?php include_once "inc_menu.php"; ?>

<!-- TABLA DE HORARIO -->
	<div id="horario">
		<h1>Seleccione horas</h1>
        <table width="100%">
            <tr>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>

			<?php foreach( $horas as $hora ): ?>
				<tr>
					<?php foreach( $dias as $dia ): ?>
						<td>
							<a href="javascript:void(0)" class="item-hora" data-dia="<?= $dia['id']; ?>" data-hora="<?= $hora['id']; ?>">
								<?= $hora['hora']; ?> 
							</a>
                    	</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>

        </table>
    </div>

    <div id="materias">
    	<h1>Seleccione materias</h1>
    	<?php foreach( $materias as $mat ): ?>
    		<a href="javascript:void(0)" class="item-materia" data-materia="<?= $mat['id']; ?>">
    			<?= $mat['materia']; ?>
    		</a>
    	<?php endforeach; ?>
    </div>

	<br><br><br>
    <div id="opciones">
    	<button id="btn-registrar-horario">Registrar horario</button>
    	<button id="btn-reset-horario">Reset</button>
    </div>

	<input type="hidden" id="user" data-id="<?= $idEstudiante; ?>">
	<script src="../assets/js/vendor/jquery.js"></script>
	<script src="../assets/js/custom.js"></script>
</body>
</html>