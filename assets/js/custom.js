$(document).ready(function(){

	var dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"];

	//-------------------------
	// 	SELECCIONAR HORARIO
	//-------------------------

	$(".item-hora").on( "click", function(event) {
		// alert("funciona");
		var target = $( event.target );

		//Obtiene dia y hora del atributo data
		// alert( target.data("dia") );
		// alert( target.data("hora") );

		//------Cambia el estilo del elemento
		if( !target.hasClass("selected") )
			target.addClass("selected");
		else
			target.removeClass("selected");

		// if( !target.hasClass("selected") ){
		// 	target.addClass("selected");
		
		// $(".selected").removeClass("selected");

		// if( !target.hasClass("selected") ){
		// 	//Quitamos .selected al que lo tiene
		// 	$(".horario .selected").removeClass("selected");
		// 	//Agregamos al que se selecciono
		// 	target.addClass("selected");

		// }
		
	});


	$("#btn-continuar").on( "click", function(event) {
        // alert("funciona continuar");
        //var elementos = document.getElementsByClassName("selected");

        //Arreglo para horario
        var horario = new Array();

        //Recorriendo cada elemento con el mismo classname
        $(".selected").each(function () {
            var dia = $(this).data("dia");
            var hora = $(this).data("hora");

            //Agregando elementos al array
            horario.push({"dia": dias[dia - 1], "hora": hora});
            // alert( dias[dia-1] +", "+ hora );
        });

        if (horario.length == 0)
            alert("sin horas seleccionadas");
        else {
			//Comprobando
			for (var i = 0; i < horario.length; i++) {
				alert(horario[i].dia + ", " + horario[i].hora);
			}
    	}
	});

    $("#btn-reset-horario").on( "click", function(event) {
		//A todos los elementos les quita la clase "selected"
    	$(".selected").removeClass("selected");

    });


});
