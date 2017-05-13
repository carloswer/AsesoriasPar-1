$(document).ready(function(){

	var dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"];

	//-------------------------
	// 	SELECCIONAR HORARIO
	//-------------------------

	$(".item-hora").on( "click", function(event) {
		var target = $( event.target );

		//Obtiene dia y hora del atributo data
		// alert( "Dia: "+target.data("dia")+"\nHora: "+target.data("hora") );

		//------Cambia el estilo del elemento
		if( !target.hasClass("hora-selected") )
			target.addClass("hora-selected");
		else
			target.removeClass("hora-selected");
	});

	$(".item-materia").on( "click", function(event) {
		var target = $( event.target );

		//------Cambia el estilo del elemento
		if( !target.hasClass("materia-selected") )
			target.addClass("materia-selected");
		else
			target.removeClass("materia-selected");
	});


	$("#btn-registrar-horario").on( "click", function(event) {
        //var elementos = document.getElementsByClassName("selected");

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
        	alert("datos completos");
        	//Se obtiene ID de usuario
        	$id = $('#user').data("id"),
        	//Se envian datos capturados
    		registrar_horario(horario, materias, $id);
        }
        else
        	alert("datos incompletos");
	});



    $("#btn-reset-horario").on( "click", function(event) {
		//A todos los elementos les quita la clase "selected"
    	$(".selected").removeClass("selected");

    });



    function registrar_horario(horario, materias, userID){
    	//JSON para enviar
    	var horarioJSON = 
    	{
    		"estudiante": userID,
    		"horario": horario,
    		"materias": materias
    	};

    	//Transforma a String
    	var stringJSON = JSON.stringify( horarioJSON );
    	alert( stringJSON );

    	//AJAX para envio asincrono
    	$.ajax({
                url: 'horario/registrar.php',
                type: 'post',
                dataType: 'json',
                // data: {horario_materias : stringJSON}
                data: stringJSON
        })
        .done(function(){
            //$('#estado').html("Correcto");
            alert("FUNCIONA");
        })
        .fail(function(){
            //$('#estado').html("Incorrecto");
            alert("NO FUNCIONA");
        })
        .always(function(response){

            // setTimeout(function(){
            //         $('#spin').hide();
            // }, 1000);

            // console.log(response);
            // console.log(response.statusText);
        });
    }


});
