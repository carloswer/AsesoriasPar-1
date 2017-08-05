<?php

    require_once "config.php";
    use Control\Sesiones;
    
    // Comprobar que haya una session activa
    if( Sesiones::isSesionActiva() ){
        $user = Sesiones::getDatosSesion();
        if( $user['rol'] == "administrador" )
            header("Location: administrador/");
        else
            header("Location: estudiante/");
    }


    // $tituloPagina = "Iniciar Sesion";

?>

<?php include_once TEMP_PATH."/header.php"; ?>

    <div class="container">
    	<div class="login-container col-md-6 col-md-offset-3 text-center">
    		<h1>Iniciar Sesion</h1>
    				<div id="login-status" class="status">
                        
    				</div>
    		
    		<form id="login-form">
    			<div class="form-group">
    				<label for="" class="sr-only label-control">Usuario</label>
    				<input type="text" class="form-control" id="txtUser" placeholder="Usuario" name="user" required="true">
    			</div>
    			<div class="form-group">
    				<label for="" class="sr-only label-control">Contraseña</label>
    				<input type="password" class="form-control" id="txtPass" placeholder="Contraseña" name="pass" required="true">
    			</div>
    			<button class="form-control btn btn-primary" type="submit">
    				<span id="login-spin" style="display: none;">
    					<img src="assets/img/spin.gif" alt="spin">
    				</span>
    				Iniciar
    			</button>
    		</form>

    	</div>
    </div>



<?php include_once TEMP_PATH."/footer.php"; ?>
