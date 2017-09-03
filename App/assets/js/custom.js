$(document).ready(function(){

    function multiToggleButton(target, selector){
        if( !target.hasClass(selector) )
            target.addClass(selector);
        else
            target.removeClass(selector);
    }

    function singleToggleButton(target, selector){
        var clase = "."+selector;

        if( target.hasClass(selector) )
            target.removeClass(selector);
        else{
            //Le quita el class al elemento que lo tiene
            $(clase).removeClass(selector);
            //Se lo pone al target
            target.addClass(selector);
        }
    }

    function hideAndShow(hide, show){
        hide.fadeOut();
        setTimeout(function(){
            show.fadeIn();
        }, 500);
    }

    function addAndRemove(toAdd, toRemove, selector){
        toRemove.removeClass(selector);
        toAdd.addClass(selector);
    }


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
            dataType: 'json',

            //Metodo que se ejecuta antes de enviar el request
            beforeSend: function(){
                $('.login-message').remove();
                //Cambia el icono del span
                $('#login-spin').css('display','inline');
                // $('#btn-form-login').html("Verificando...");
                // $('#btn-form-login').attr("disabled", true);
            }
        })
        .done(function(response){

            if( response.resultado == true ){
                if( response.rol == "administrador" ){
                    $('#login-status').html('<p class="login-message msj-exito bg-success">Datos Correctos - Redireccionando</p>');
                    setTimeout(function(){ window.location = "administrador/"; },1000);
                }
                else if( response.rol == 'estudiante' ){
                    $('#login-status').html('<p class="login-message msj-exito bg-success">Datos Correctos - Redireccionando</p>');
                    setTimeout(function(){ window.location = "estudiante/"; },1000);
                }
            }
            //Si no se pudo iniciar sesion
            else if( response.resultado == false )
                $('#login-status').html('<p class="login-message msj-error bg-warning">El usuario o contraseña son incorrectos</p>');
            else if( response.resultado == "error" )
                alert("Algo salio mal...");
            else
                alert("Response desconocido: " + response);

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

            // $('#btn-form-login').html("Iniciar");
            // $('#btn-form-login').attr("disabled", false);

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
            // var dia = $(this).data("dia");
            // var hora = $(this).data("hora");
            var hora = $(this).data("id");
            //Agregando elementos al array
            // horario.push( { "DiaID": dia, "DiaNombre": dias[dia - 1], "HoraID": hora} );
            horario.push( hora );
        });


        if (horario.length == 0){
            alert("sin horas seleccionadas");
            enviar = false;
        }

    	//--------------------MATERIAS
    	$(".materia-selected").each(function () {
            var materia = $(this).data("id");
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
        	var id = $('#data-estudiante').data("id");

        	//Se envian persistencia capturados
    		registrar_horario(id, horario, materias);
        }

	});


    //--------------Quita clases de horas y dias seleccionados
    $("#btn-reset-horario").on( "click", function(event) {
		//A todos los elementos les quita la clase "##-selected"
        $(".hora-horario").removeClass("hora-selected");
        $(".materia-horario").removeClass("materia-selected");

    });


    function registrar_horario(estudiante, horario, materias){

        //JSON para enviar
        var horarioJSON = 
        {
            "estudiante": estudiante,
            "horario": horario,
            "materias": materias
        };

        //Transforma a String
        var stringJSON = JSON.stringify( horarioJSON );

        $.ajax({
                url: '../../includes/ajax/horario/registrar_horario.ajax.php',
                type: 'post',
                dataType: 'json', //Tipo de dato que regresa
                data: {json_horario: stringJSON},
                beforeSend: function(){
                //     overlay.children('.texto').html("Registrando horario");
                //     overlay.css('display', 'block');
                    $('#login-estado').html("Cargando...");
                }
        })
        .done(function(response){

            if( response.resultado == "true" ){
                $('#login-estado').html("Registrado con éxito");
                //Redirecciona después de registrar (un segundo de espera)
                setTimeout(function(){ location.href = "index.php"; }, 1000);
            }
            else if( response.resultado == "false" ) {
                $('#login-estado').html("No se pudo registrar horario");
                console.log( "Resultado: "+response.resultado+"\nMensaje: "+response.mensaje );
            }
            else{
                alert("respuesta desconocida: "+response);
            }

        })
        .fail(function(){
            alert("ocurrio un error");
        })
        .always( function(response) {
            // $('#login-estado').html("");
            console.log(  response );
        });
    }


    //-----------------------------
    //  ASESORIAS
    //-----------------------------


    //---------MATERIAS
    $('.materias-asesorias .item-materia').on( "click", function(event) {
        var target = $(event.target);
        //selecciona elemento
        singleToggleButton(target, "selected");
    });

    //Siguiente
    $('#btn-siguiente-materia').click(function(){
        // alert("Presionaste siguiente: Materias");
        // var materia = $('.selected');
        // if( materia.length === 0 )
        //     alert("No hay seleccionado materia");
        // else{
        //     materia = $(materia[0]);
        //     var res = confirm( "La materia es: "+ materia.html() );
        //     //Si es aceptar, muestra siguiente
        //     if( res ){
        //         //Almacena en sessionStorage
        //         sessionStorage.setItem("materia", materia.data("id"));
        //         console.log("Materia agregada al localstorage");
        //         hideAndShow($('.materias-asesorias'), $('.asesores-asesorias'));
        //         //Cambiar encabezados
        //         addAndRemove($('.encabezado-asesoria #asesor'), $('.encabezado-asesoria #materia'), "active");
        //     }
        //
        // }
        hideAndShow($('.materias-asesorias'), $('.asesores-asesorias'));
        addAndRemove($('.encabezado-asesoria #asesor'), $('.encabezado-asesoria #materia'), "active");
    });


    //---------ASESORES
    $('#btn-anterior-asesor').click(function () {
        hideAndShow($('.asesores-asesorias'), $('.materias-asesorias'));
        addAndRemove($('.encabezado-asesoria #materia'), $('.encabezado-asesoria #asesor'), "active");
    });

    $('#btn-siguiente-asesor').click(function () {
        hideAndShow($('.asesores-asesorias'), $('.fechas-asesorias'));
        addAndRemove($('.encabezado-asesoria #horario'), $('.encabezado-asesoria #asesor'), "active");
    });


    //---------FECHAS
    $('#btn-anterior-fecha').click(function () {
        hideAndShow($('.fechas-asesorias'), $('.asesores-asesorias'));
        addAndRemove($('.encabezado-asesoria #asesor'), $('.encabezado-asesoria #horario'), "active");
    });

    $('#btn-finalizar-asesoria').click(function(){
        alert("Presionaste Finalizar");
    });





    //$('.btn-seleccionar-asesoria')

    //
    // $(".materia-asesoria").on( "click", function(event) {
    //     var target = $( event.target );
    //
    //     //----Cambia el estilo
    //     //Obtiene elementos
    //     var elementos = $('.materia-asesoria');
    //     //les quita el class
    //     elementos.removeClass("materia-selected");
    //     //se lo agrega al target
    //     target.addClass("materia-selected");
    //
    //     //Elimina horario mostrado en caso de
    //     $("#horario").html("");
    //
    //     //obtiene persistencia ocultos
    //     var id = $('#user').data("id");
    //     var ciclo = $('#ciclo').data("id");
    //     var materia = $(target).data("materia");
    //
    //     obtenerAsesoresMateria(ciclo, materia, id);
    //
    // });
    //
    //
    //
    // function obtenerAsesoresMateria(cicloID, materiaID, asesorID){
    //     //JSON para enviar
    //     var json =
    //     {
    //         "estudiante": asesorID,
    //         "ciclo": cicloID,
    //         "materia": materiaID
    //     };
    //
    //     //Transforma a String
    //     var stringJSON = JSON.stringify( json );
    //
    //     $.ajax({
    //             url: 'obtener_asesores.php',
    //             type: 'post',
    //             //dataType: 'json', //Tipo de dato de respuesta del servidor
    //             data: {json: stringJSON}
    //     })
    //     .done(function( data ){
    //         //alert("OK: \n"+data);
    //         $('#asesores').html( data );
    //     })
    //     .fail(function( data ){
    //         alert("Ocurrio un error");
    //     })
    //     .always( function(response) {
    //         console.log( response );
    //     });
    // }
    //
    //
    // // Para que cargue elementos cargados con ajax es necesario especificar
    // // clic en el document y en el elemento
    // $(document).on( "click", ".item-asesor", function(event) {
    //     var target = $( event.target );
    //
    //     //Obtiene id del asesor
    //     var asesor = target.data("asesor");
    //     // Cambiando estilo
    //     $(".asesor-selected").removeClass("asesor-selected");
    //     target.addClass("asesor-selected");
    //
    //     //obtiene persistencia ocultos
    //     var ciclo = $('#ciclo').data("id");
    //     obtenerHorarioAsesor(ciclo, asesor);
    //
    // });
    //
    //
    //
    // function obtenerHorarioAsesor(cicloID, asesorID){
    //     //JSON para enviar
    //     var json =
    //     {
    //         "estudiante": asesorID,
    //         "ciclo": cicloID
    //     };
    //
    //     //Transforma a String
    //     var stringJSON = JSON.stringify( json );
    //
    //     $.ajax({
    //             url: 'obtener_horario.php',
    //             type: 'post',
    //             dataType: 'html', //Tipo de dato de respuesta del servidor
    //             data: {json: stringJSON}
    //     })
    //     .done(function( data ){
    //         $('#horario').html( data );
    //     })
    //     .fail(function( data ){
    //         alert("Ocurrio un error");
    //     })
    //     .always( function(response) {
    //         console.log( response );
    //     });
    // }
    //
    //
    //
    // $("#btn-registrar-asesoria").on("click", function(){
    //
    //     //Elementos seleccionados
    //     var materia = $(".materia-selected");
    //     var asesor  = $(".asesor-selected");
    //     var dhf     = $(".hora-selected");
    //     var desc    = $("#comentario");
    //
    //     var completo = true;
    //     if( materia.length == 0 ){
    //         completo = false;
    //         alert("Falta Materia");
    //     }
    //     if( asesor.length == 0 ){
    //         completo = false;
    //         alert("Falta Asesor");
    //     }
    //     if( dhf.length == 0 ){
    //         completo = false;
    //         alert("Falta Hora-dia-fecha");
    //     }
    //
    //     //Obtener info
    //     var materiaID   = materia.data("materia");
    //     var asesorID    = asesor.data("asesor");
    //     // var hora        = dhf.data("hora");
    //     // var dia         = dhf.data("dia");
    //     var dia_horaID  = dhf.data("dia-hora");
    //     var fecha       = dhf.data("fecha");
    //     var descripcion = desc.val();
    //     // Datos ocultos
    //     var alumnoID = $('#user').data("id");
    //     var cicloID = $('#ciclo').data("id");
    //
    //     if( descripcion.length == 0 ){
    //         completo = false;
    //         alert("Falta descripcion");
    //     }
    //
    //     if( completo ){
    //         registrarAsesoria( materiaID, asesorID, alumnoID, cicloID, dia_horaID, fecha, descripcion );
    //         // alert("hasta aqui si jala");
    //     }
    // });
    //
    //
    // function registrarAsesoria( materiaID, asesorID, alumnoID, cicloID, dia_horaID, fecha, descripcion ){
    //     //JSON para enviar
    //     var json =
    //     {
    //         "materia": materiaID,
    //         "asesor": asesorID,
    //         "alumno": alumnoID,
    //         "dia_hora": dia_horaID,
    //         "ciclo": cicloID,
    //         "fecha": fecha,
    //         "descripcion": descripcion
    //     };
    //
    //     //Transforma a String
    //     var stringJSON = JSON.stringify( json );
    //
    //     $.ajax({
    //             url: 'registrar_asesoria.php',
    //             type: 'post',
    //             dataType: 'html', //Tipo de dato de respuesta del servidor
    //             data: {json: stringJSON}
    //     })
    //     .done(function( data ){
    //         // $('#horario').html( data );
    //         alert("Asesoria registrada");
    //         location.href = "index.php";
    //     })
    //     .fail(function( data ){
    //         alert("Ocurrio un error");
    //     })
    //     .always( function(response) {
    //         console.log( response );
    //     });
    // }
    //
    //
    // // Para que cargue elementos cargados con ajax es necesario especificar
    // // clic en el document y en el elemento
    // $(document).on( "click", ".btn-cancelar-asesoria", function(event) {
    //     var target = $( event.target );
    //
    //     //Obtiene elementos
    //     var asesoriaID = target.data("asesoria");
    //     var comentario = prompt("Escriba sus razones", "Because i can >:p");
    //     // alert("hasta aqui funciona... moment, men are working");
    //     cancelarAsesoria( asesoriaID, comentario );
    // });
    //
    // function cancelarAsesoria( asesoriaID, comentario ){
    //     //JSON para enviar
    //     var json =
    //     {
    //         "asesoriaID": asesoriaID,
    //         "comentario": comentario
    //     };
    //
    //     //Transforma a String
    //     var stringJSON = JSON.stringify( json );
    //
    //     $.ajax({
    //             url: 'cancelar-asesoria.php',
    //             type: 'post',
    //             // dataType: 'html', //Tipo de dato de respuesta del servidor
    //             data: {json: stringJSON}
    //     })
    //     .done(function( data ){
    //         alert("Asesoria cancelada");
    //         // alert( data );
    //         /*Recargamos desde caché*/
    //         // location.reload();
    //         /*Forzamos la recarga*/
    //         location.reload(true);
    //     })
    //     .fail(function( data ){
    //         alert("Ocurrio un error");
    //     })
    //     .always( function(response) {
    //         console.log( response );
    //     });
    // }


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
