$(document).ready(function(){

	var dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"];

	//-------------------------
	// 	SELECCIONAR HORARIO
	//-------------------------

	$(".hora-horario").on( "click", function(event) {
		var target = $( event.target );

		//Obtiene dia y hora del atributo data
		// alert( "Dia: "+target.data("dia")+"\nHora: "+target.data("hora") );

		//------Cambia el estilo del elemento
		if( !target.hasClass("hora-selected") )
			target.addClass("hora-selected");
		else
			target.removeClass("hora-selected");
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
        	// alert("datos completos");
        	//Se obtiene ID de usuario
        	var id = $('#user').data("id");
            var ciclo = $('#ciclo').data("id");
        	//Se envian datos capturados
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

        //obtiene datos ocultos
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
