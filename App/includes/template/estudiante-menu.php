<?php 

    use Control\Sesiones;
	session_start();
?>


<h1>Bienvenido usuario: <?= $_SESSION['estudiante']['nombre']; ?></h1>
<h4>Has iniciado como: <?= $_SESSION['estudiante']['tipo']; ?></h4>

<!--Logout-->
<a href="<?= ROOT_REF; ?>/logout.php">cerrar sesion</a>

<!--MENU DEL USUARIO-->
<ul>
    <li><a href="<?= EST_REF."/"; ?>">Inicio</a></li>
    <li><a href="<?= EST_REF."/asesorias/"; ?>">Asesorias</a></li>
    <li><a href="<?= EST_REF."/acceso.php?tipo=nuevo"; ?>">Cambiar Tipo</a></li>

    <?php if( Sesiones::isAsesor() ): ?>
        <li><a href="<?= EST_REF."/horario/"; ?>">Horario</a></li>
    <?php endif; ?>

    <li><a href="#">Perfil</a></li>
</ul>

<!-- Elementos con datos importantes -->
 <input type="hidden" id="data-estudiante" data-id="<?= $_SESSION['estudiante']['id']; ?>">
<!-- <input type="hidden" id="ciclo" data-id="--><?//= $_SESSION['ciclo']['id']; ?><!--"> -->