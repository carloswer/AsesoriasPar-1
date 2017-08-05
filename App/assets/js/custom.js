$(document).ready(function(){


    //-------------------------
    // 	LOGIN Y REGISTRO
    //-------------------------

    $('#login-form').submit(function(e){
        //Evitar el submit normal (que se recargue)
        e.preventDefault();
        var user = $('#txtUser').val();
        var pass = $('#txtPass').val();

        //Datos del formulario como JSON
        var datos = { "user": user, "pass": pass };
        // alert("USER: "+datos.user+" \nPASS: "+datos.pass);
        login( datos );
    });

    function login(datos){
        $.ajax({
            url: 'includes/ajax/login.ajax.php',
            type: 'post',
            // Los datos se mandan como si fuera GET para poder obtenerlos por separado
            data: "user="+datos.user+"&pass="+datos.pass,
            // dataType: 'json',

            //Metodo que se ejecuta antes de enviar el request
            beforeSend: function(){
                $('.login-message').remove();
                //Cambia el icono del span
                $('#login-spin').css('display','inline');
            }
        })
        .done(function(response){

            if( response == "false" ){
                $('#login-status').html('<p class="login-message msj-error bg-warning">El usuario o contraseña son incorrectos</p>');
            }
            else if( response == "administrador" ){
                $('#login-status').html('<p class="login-message msj-exito bg-success">Datos Correctos - Redireccionando</p>');
                setTimeout(function(){ window.location = "administrador/"; },1000);
            }
            else if( response == "estudiante" ){
                $('#login-status').html('<p class="login-message msj-exito bg-success">Datos Correctos - Redireccionando</p>');
                setTimeout(function(){ window.location = "estudiante/"; },1000);
            }
            else
                alert("Response desconocido: "+response);

        })
        .fail(function(){
            $('#login-status').html('<p class="login-message msj-fail bg-danger">Ocurrio un error, intentelo más tarde</p>');
        })
        .always(function(response){
            // oculta spin
            $('#login-spin').hide();
            console.log( response );

            // Coultar mensaje
            setTimeout(function(){
                $('.login-message').hide();
            },3000);

        });
    }




    //-------------------------
    //  ESTUDIANTES
    //-------------------------
    
    //======================================= SELECCION DE TIPO
    // $(".btn-acceso").on("click", function(event){
    //     var btn = $( event.target );
    //     var tipo = btn.data("tipo");
    // });

    //======================================= SELECCION DE HORARIO

	$(".hora-horario").on( "click", function(event) {
		var target = $( event.target );

		//------Cambia el estilo del elemento
		if( !target.hasClass("hora-selected") )
			target.addClass("hora-selected");
		else
			target.removeClass("hora-selected");
	});


    // Para que cargue elementos cargados con ajax es necesario especificar
    // clic en el document y en el elemento
    $(document).on( "click", ".hora-asesoria", function(event) {
        var target = $( event.target );

        //Obtiene elementos
        var elementos = $('.hora-selected');
        //les quita el class
        elementos.removeClass("hora-selected");
        //se lo agrega al target
        target.addClass("hora-selected");
    });


	$(".materia-horario").on( "click", function(event) {
		var target = $( event.target );

		//------Cambia el estilo del elemento
		if( !target.hasClass("materia-selected") )
			target.addClass("materia-selected");
		else
			target.removeClass("materia-selected");
	});




	$("#btn-registrar-horario").on( "click", function(event) {

        //Arreglo para horario
        var horario = new Array();
        var materias = new Array();
        var enviar = true;

        //--------------------HORAS Y DIAS
        //Recorriendo cada elemento con el mismo classname
        $(".hora-selected").each(function () {
            var dia = $(this).data("dia");
            var hora = $(this).data("hora");

            //Agregando elementos al array
            // horario.push( { "DiaID": dia, "DiaNombre": dias[dia - 1], "HoraID": hora} );
            horario.push( { "DiaID": dia, "HoraID": hora} );
        });


        if (horario.length == 0){
            alert("sin horas seleccionadas");
            enviar = false;
        }
        	
    	

    	//--------------------MATERIAS
    	$(".materia-selected").each(function () {
            var materia = $(this).data("materia");

            //Agregando elementos al array
            materias.push( materia );
        });


        if (materias.length == 0){
            alert("sin materias seleccionadas");
            enviar = false;
        }
        	


        if( enviar ){
        	// alert("persistencia completos");
        	//Se obtiene ID de usuario
        	var id = $('#user').data("id");
            var ciclo = $('#ciclo').data("id");
        	//Se envian persistencia capturados
    		registrar_horario(id, ciclo, horario, materias);
        }

	});



    $("#btn-reset-horario").on( "click", function(event) {
		//A todos los elementos les quita la clase "##-selected"
        $(".hora-horario").removeClass("hora-selected");
        $(".materia-horario").removeClass("materia-selected");

    });


    function registrar_horario(userID, cicloID, horario, materias){

        //JSON para enviar
        var horarioJSON = 
        {
            "estudiante": userID,
            "ciclo": cicloID,
            "horario": horario,
            "materias": materias
        };

        //Transforma a String
        var stringJSON = JSON.stringify( horarioJSON );
        var overlay = $('reg-horario');

        $.ajax({
                url: 'registrar_horario.php',
                type: 'post',
                // dataType: 'html', //Tipo de dato que regresa
                data: {jsonHM: stringJSON}
                // beforeSend: function(){
                //     overlay.children('.texto').html("Registrando horario");
                //     overlay.css('display', 'block');
                // }
        })
        .done(function(){
            alert("Horario registrado");
            // overlay.children('.texto').html("Horario registrado");
            location.href = "index.php";
        })
        .fail(function(){
            alert("ocurrio un error");
            // overlay.children('.texto').html("Error al registrar");
        })
        .always( function(response) {
            console.log( response );
            // overlay.css('display', 'none');
        });
    }


    $(".materia-asesoria").on( "click", function(event) {
        var target = $( event.target );

        //----Cambia el estilo
        //Obtiene elementos
        var elementos = $('.materia-asesoria');
        //les quita el class
        elementos.removeClass("materia-selected");
        //se lo agrega al target
        target.addClass("materia-selected");

        //Elimina horario mostrado en caso de
        $("#horario").html("");

        //obtiene persistencia ocultos
        var id = $('#user').data("id");
        var ciclo = $('#ciclo').data("id");
        var materia = $(target).data("materia");

        obtenerAsesoresMateria(ciclo, materia, id);

    });



    function obtenerAsesoresMateria(cicloID, materiaID, asesorID){
        //JSON para enviar
        var json = 
        {
            "estudiante": asesorID,
            "ciclo": cicloID,
            "materia": materiaID
        };

        //Transforma a String
        var stringJSON = JSON.stringify( json );

        $.ajax({
                url: 'obtener_asesores.php',
                type: 'post',
                //dataType: 'json', //Tipo de dato de respuesta del servidor
                data: {json: stringJSON}
        })
        .done(function( data ){
            //alert("OK: \n"+data);
            $('#asesores').html( data );
        })
        .fail(function( data ){
            alert("Ocurrio un error");
        })
        .always( function(response) {
            console.log( response );
        });
    }


    // Para que cargue elementos cargados con ajax es necesario especificar
    // clic en el document y en el elemento
    $(document).on( "click", ".item-asesor", function(event) {
        var target = $( event.target );

        //Obtiene id del asesor
        var asesor = target.data("asesor");
        // Cambiando estilo
        $(".asesor-selected").removeClass("asesor-selected");
        target.addClass("asesor-selected");

        //obtiene persistencia ocultos
        var ciclo = $('#ciclo').data("id");
        obtenerHorarioAsesor(ciclo, asesor);

    });



    function obtenerHorarioAsesor(cicloID, asesorID){
        //JSON para enviar
        var json = 
        {
            "estudiante": asesorID,
            "ciclo": cicloID
        };

        //Transforma a String
        var stringJSON = JSON.stringify( json );

        $.ajax({
                url: 'obtener_horario.php',
                type: 'post',
                dataType: 'html', //Tipo de dato de respuesta del servidor
                data: {json: stringJSON}
        })
        .done(function( data ){
            $('#horario').html( data );
        })
        .fail(function( data ){
            alert("Ocurrio un error");
        })
        .always( function(response) {
            console.log( response );
        });
    }



    $("#btn-registrar-asesoria").on("click", function(){

        //Elementos seleccionados
        var materia = $(".materia-selected");
        var asesor  = $(".asesor-selected");
        var dhf     = $(".hora-selected");
        var desc    = $("#comentario");

        var completo = true;
        if( materia.length == 0 ){
            completo = false;
            alert("Falta Materia");
        }
        if( asesor.length == 0 ){
            completo = false;
            alert("Falta Asesor");
        }
        if( dhf.length == 0 ){
            completo = false;
            alert("Falta Hora-dia-fecha");
        }

        //Obtener info
        var materiaID   = materia.data("materia");
        var asesorID    = asesor.data("asesor");
        // var hora        = dhf.data("hora");
        // var dia         = dhf.data("dia");
        var dia_horaID  = dhf.data("dia-hora");
        var fecha       = dhf.data("fecha");
        var descripcion = desc.val();
        // Datos ocultos
        var alumnoID = $('#user').data("id");
        var cicloID = $('#ciclo').data("id");

        if( descripcion.length == 0 ){
            completo = false;
            alert("Falta descripcion");
        }

        if( completo ){
            registrarAsesoria( materiaID, asesorID, alumnoID, cicloID, dia_horaID, fecha, descripcion );
            // alert("hasta aqui si jala");
        }
    });


    function registrarAsesoria( materiaID, asesorID, alumnoID, cicloID, dia_horaID, fecha, descripcion ){
        //JSON para enviar
        var json = 
        {
            "materia": materiaID,
            "asesor": asesorID,
            "alumno": alumnoID,
            "dia_hora": dia_horaID,
            "ciclo": cicloID,
            "fecha": fecha,
            "descripcion": descripcion
        };

        //Transforma a String
        var stringJSON = JSON.stringify( json );

        $.ajax({
                url: 'registrar_asesoria.php',
                type: 'post',
                dataType: 'html', //Tipo de dato de respuesta del servidor
                data: {json: stringJSON}
        })
        .done(function( data ){
            // $('#horario').html( data );
            alert("Asesoria registrada");
            location.href = "index.php";
        })
        .fail(function( data ){
            alert("Ocurrio un error");
        })
        .always( function(response) {
            console.log( response );
        });
    }


    // Para que cargue elementos cargados con ajax es necesario especificar
    // clic en el document y en el elemento
    $(document).on( "click", ".btn-cancelar-asesoria", function(event) {
        var target = $( event.target );

        //Obtiene elementos
        var asesoriaID = target.data("asesoria");
        var comentario = prompt("Escriba sus razones", "Because i can >:p");
        // alert("hasta aqui funciona... moment, men are working");
        cancelarAsesoria( asesoriaID, comentario );
    });

    function cancelarAsesoria( asesoriaID, comentario ){
        //JSON para enviar
        var json = 
        {
            "asesoriaID": asesoriaID,
            "comentario": comentario
        };

        //Transforma a String
        var stringJSON = JSON.stringify( json );

        $.ajax({
                url: 'cancelar-asesoria.php',
                type: 'post',
                // dataType: 'html', //Tipo de dato de respuesta del servidor
                data: {json: stringJSON}
        })
        .done(function( data ){
            alert("Asesoria cancelada");
            // alert( data );
            /*Recargamos desde caché*/
            // location.reload();
            /*Forzamos la recarga*/
            location.reload(true);
        })
        .fail(function( data ){
            alert("Ocurrio un error");
        })
        .always( function(response) {
            console.log( response );
        });
    }


    // function sendAJAX(url, type, dataType, data){
    // 	$.ajax({
    //             url: url,
    //             type: type,
    //             dataType: dataType,
    //             data: data
    //     })
    //     .done(function(){
    //     })
    //     .fail(function(){
    //     })
    //     .always( function(response) {
    //         // console.log(response);
    //     });
    // }


});
