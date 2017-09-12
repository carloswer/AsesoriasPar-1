$(document).ready(function(){

    //-------------------------
    // 	LOGIN Y REGISTRO
    //-------------------------

    $('#login-form').submit(function(e){
        //Evitar el submit normal (que se recargue)
        e.preventDefault();
        //var json = $('#ajaxAuth-form').serialize();  // user=aaaa&pass=aaaa (listo para enviar
        //json = $('#ajaxAuth-form').serializeArray(); // [0]{name: "user", value: "aaa"}
        // [1]{name: "pass", value: "aaa"}
        var user = $('#txtUser').val();
        var pass = $('#txtPass').val();

        //Datos del formulario como JSON
        var data = { "user": user, "pass": pass };
        // alert("USER: "+datos.user+" \nPASS: "+datos.pass);
        ajaxAuth( data );
    });








    //-------------------------
    //  HORARIOS
    //-------------------------

    //======================================= SELECCION DE TIPO
    // $(".btn-acceso").on("click", function(event){
    //     var btn = $( event.target );
    //     var tipo = btn.data("tipo");
    // });

    //======================================= SELECCION DE HORARIO

    $(".multi-select .hora-item").on( "click", function(event) {
        var target = $( event.target );
        //------Cambia el estilo del elemento
        multiToggleButton(target, "hora-selected");
    });


    $(".multi-select .materia-item").on( "click", function(event) {
        var target = $( event.target );
        //------Cambia el estilo del elemento
        multiToggleButton(target, "materia-selected");
    });


    // Para que cargue elementos cargados con ajax es necesario especificar con "on" "click"
    // clic en el document y en el elemento
    // $(document).on( "click", ".hora-asesoria", function(event) {
    //     var target = $( event.target );
    //
    //     //Obtiene elementos
    //     var elementos = $('.hora-selected');
    //     //les quita el class
    //     elementos.removeClass("hora-selected");
    //     //se lo agrega al target
    //     target.addClass("hora-selected");
    // });



    $("#btn-registrar-horario").on( "click", function(event) {

        //Arreglo para horario
        var hours = new Array();
        var subjects = new Array();
        var send = true;

        //--------------------HORAS Y DIAS
        //Recorriendo cada elemento con el mismo classname
        $(".multi-select .hora-selected").each(function () {
            // var dia = $(this).data("dia");
            // var hora = $(this).data("hora");
            var hour = $(this).data("id");
            //Agregando elementos al array
            // horario.push( { "DiaID": dia, "DiaNombre": dias[dia - 1], "HoraID": hora} );
            hours.push( hour );
        });


        if (hours.length == 0){
            alert("sin horas seleccionadas");
            send = false;
        }

        //--------------------MATERIAS
        $(".multi-select .materia-selected").each(function () {
            var subject = $(this).data("id");
            //Agregando elementos al array
            subjects.push( subject );
        });


        if (subjects.length == 0){
            alert("sin materias seleccionadas");
            send = false;
        }

        if( send ){
            // alert("persistencia completos");
            //Se obtiene ID de usuario
            var studentId = $('#data-estudiante').data("id");

            //Se envian persistencia capturados
            ajaxRegisterSchedule(studentId, hours, subjects);
        }

    });


    //--------------Quita clases de horas y dias seleccionados
    $("#btn-reset-horario").on( "click", function(event) {
        //A todos los elementos les quita la clase "##-selected"
        $(".hora-horario").removeClass("hora-selected");
        $(".materia-horario").removeClass("materia-selected");

    });


    //-----------------------------
    //  ASESORIAS
    //-----------------------------

    $(".single-select .materia-item").on( "click", function(event) {
        var target = $( event.target );
        // //------Cambia el estilo del elemento
        singleToggleButton(target, "materia-selected");
    });


    $('.solicitar #btn-asesoria-anterior').click( function() {
        var activo = $(".solicitar .seccion-active");
        var seccion = activo.data("seccion");

        if( seccion === "fechas" ){
            //Ocultando activo
            activo.slideToggle(function(){
                var itemToShow = $("#seccion__materias");
                addAndRemoveClass(itemToShow, activo, "seccion-active");
                addAndRemoveClass($("#encabezado__materia"), $("#encabezado__fecha"), "active");
                //Mostrando elemento
                itemToShow.slideToggle();
                //Activando boton (propiedad)
                $('.solicitar #btn-asesoria-anterior').prop("disabled", true);
            });
        }
        else if( seccion === "asesores" ){
            //Ocultando activo
            activo.slideToggle(function(){
                var itemToShow = $("#seccion__materias");
                addAndRemoveClass(itemToShow, activo, "seccion-active");
                addAndRemoveClass($("#encabezado__fecha"), $("#encabezado__asesor"), "active");
                //Mostrando elemento
                itemToShow.slideToggle();
                //Activando boton (propiedad)
                // $('.solicitar #btn-asesoria-anterior)
            });
        }
    });


    $('.solicitar #btn-asesoria-siguiente').click( function() {
        //Obteniendo seccion activa
        var activo = $(".solicitar .seccion-active");
        var seccion = activo.data("seccion");

        if( seccion === "materias" ){

            var materia = $('.materia-selected');
            if( materia.length === 0 )
                alert("sin materia seleccionada");
            else{
                var respuesta = confirm("Seleccionó "+$(materia).html()+", Desea continuar?");
                if( respuesta ){
                    alert("WIIII");
                    //[duration ] [, callback ]
                    activo.slideToggle(function(){
                        var itemToShow = $("#seccion__fechas");
                        addAndRemoveClass(itemToShow, activo, "seccion-active");
                        addAndRemoveClass($("#encabezado__fecha"), $("#encabezado__materia"), "active");
                        //Activando boton (propiedad)
                        $('.solicitar #btn-asesoria-anterior').prop("disabled", false);
                        //Mostrando elemento
                        itemToShow.slideToggle(function(){
                            //Evento AJAX
                            obtenerFechasPorMateria(  materia.data("id") );
                        });
                    });
                }
            }

        }
        else if( seccion === "fechas" ){
            alert("Esta en Fechas");
        }
        else if( seccion === "asesores" ){
            alert("Esta en Asesores");
        }


    });



    //---------MATERIAS
    // $('.asesorias #seccion__materias .materia-item').on( "click", function(event) {
    //     var target = $(event.target);
    //     //selecciona elemento
    //     singleToggleButton(target, "materia-selected");
    // });


    //Siguiente
    // $('#btn-siguiente-materia').click(function(){
    //     // alert("Presionaste siguiente: Materias");
    //     // var materia = $('.selected');
    //     // if( materia.length === 0 )
    //     //     alert("No hay seleccionado materia");
    //     // else{
    //     //     materia = $(materia[0]);
    //     //     var res = confirm( "La materia es: "+ materia.html() );
    //     //     //Si es aceptar, muestra siguiente
    //     //     if( res ){
    //     //         //Almacena en sessionStorage
    //     //         sessionStorage.setItem("materia", materia.data("id"));
    //     //         console.log("Materia agregada al localstorage");
    //     //         hideAndShow($('.materias-asesorias'), $('.asesores-asesorias'));
    //     //         //Cambiar encabezados
    //     //         addAndRemoveClass($('.encabezado-asesoria #asesor'), $('.encabezado-asesoria #materia'), "active");
    //     //     }
    //     //
    //     // }
    //     hideAndShow($('.materias-asesorias'), $('.asesores-asesorias'));
    //     addAndRemoveClass($('.encabezado-asesoria #asesor'), $('.encabezado-asesoria #materia'), "active");
    // });
    //
    //
    // //---------FECHAS
    // $('#btn-anterior-fecha').click(function () {
    //     hideAndShow($('.fechas-asesorias'), $('.asesores-asesorias'));
    //     addAndRemoveClass($('.encabezado-asesoria #asesor'), $('.encabezado-asesoria #horario'), "active");
    // });
    //
    // $('#btn-siguiente-fecha').click(function () {
    //     hideAndShow($('.'), $('.fechas-asesorias'));
    //     addAndRemoveClass($('.encabezado-asesoria #horario'), $('.encabezado-asesoria #asesor'), "active");
    // });
    //
    //
    // //---------ASESORES
    // $('#btn-anterior-asesor').click(function () {
    //     hideAndShow($('.asesores-asesorias'), $('.materias-asesorias'));
    //     addAndRemoveClass($('.encabezado-asesoria #materia'), $('.encabezado-asesoria #asesor'), "active");
    // });
    //
    // //--------FINALIZAR
    // $('#btn-finalizar-asesoria').click(function(){
    //     alert("Presionaste Finalizar");
    // });

});