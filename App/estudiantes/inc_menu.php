<h1> 
	<?= $titulo.' - '.$_SESSION['username'].'('.$_SESSION['idEstudiante'].')'; ?> 
</h1>

<a href=" <?= EST_REF.'/logout.php'; ?> ">cerrar sesion</a>
<ul>
	<ul>
		<li><a href=" <?= EST_REF ?> ">Inicio</a></li>
		<li><a href="#">Configuracion</a></li>
		<li><a href=" <?= EST_REF.'/horario'; ?> ">Horario</a></li>
		<li><a href=" <?= EST_REF.'/asesorias'; ?> ">Asesorias</a></li>
	</ul>
</ul>


<!-- Hidden elements -->
<input type="hidden" id="user" data-id="<?= $_SESSION['idEstudiante']; ?>">
<input type="hidden" id="ciclo" data-id="<?= $_SESSION['ciclo']['id']; ?>">