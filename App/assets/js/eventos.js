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


    $('#singup-form').submit(function(e){
        //Evitar el submit normal (que se recargue)
        e.preventDefault();

        //Para continuar
        var go = true;

        //Datos personales
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var phone = $('#phone').val();
        //Datos de usuario
        var username = $('#username').val();
        var email = $('#email').val();
        var pass1 = $('#pass').val();
        var pass2 = $('#pass2').val();
        //Datos escolares
        var id_itson = $('#id_itson').val();
        var career = $('#career').val();

        if( pass1 !== pass2 )
            go = false;

        //Si datos correctos
        if( go ){
            var userJSON =
                {
                    "username": username,
                    "email": email,
                    "password": pass1
                };

            var studentJSON =
                {
                    "first_name": first_name,
                    "last_name": last_name,
                    "id_itson": id_itson,
                    "career": career
                };

            var JSONData =
                {
                    "user": userJSON,
                    "student": studentJSON
                };

            signupAjax( JSONData );
        }
        else{
            alert("Las contraseñas no coinciden");
        }


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

    // $(".multi-select .hora-item").on( "click", function(event) {
    //     var target = $( event.target );
    //     //------Cambia el estilo del elemento
    //     multiToggleButton(target, "hora-selected");
    // });

    //TODO: hacerlo funcional para horario en ajax
    $(".multi-select .hora-item").on( "click", function(event) {
        var target = $( event.target );
        //------Cambia el estilo del elemento
        multiToggleButton(target, "hora-selected");
    });

    // $("#table-dates").on( "click", ".hora-item", function(event) {
    //     var target = $( event.target );
    //     //------Cambia el estilo del elemento
    //     multiToggleButton(target, "hora-selected");
    // });

    // $(".single-select .hora-item").on( "click", function(event) {
    //     var target = $( event.target );
    //     //------Cambia el estilo del elemento
    //     singleToggleButton(target, "hora-selected");
    // });
    //
    //
    // $(".multi-select .materia-item").on( "click", function(event) {
    //     var target = $( event.target );
    //     //------Cambia el estilo del elemento
    //     multiToggleButton(target, "materia-selected");
    // });


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
            var studentId = $('#student-data').data("id");

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


    $('#btn-asesoria-anterior').click( function() {
        var activo = $(".solicitar .seccion-active");
        var seccion = activo.data("seccion");

        //TODO: mejorar seccion para guardar con sessionstorage
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

        //----------------------SELECCION DE MATERIAS
        //TODO: mejorar seccion para guardar con sessionstorage
        if( seccion === "materias" ){

            //Se obtiene emateria seleccionada
            var subject = $('.materia-selected');
            //Valida seleccion
            if( subject.length === 0 )
                alert("sin materia seleccionada");
            else{
                //Solicita confirmar selccion
                var response = confirm("Seleccionó "+$(subject).html()+", Desea continuar?");
                //Si respondio "Aceptar
                if( response ){
                    //[duration ] [, callback ]
                    //Sube el elemento activo
                    activo.slideToggle(function(){
                        //callback para que se ejecute después de subir elemento activo
                        var itemToShow = $("#seccion__fechas");
                        //Cambiando elemento activo
                        addAndRemoveClass(itemToShow, activo, "seccion-active");
                        addAndRemoveClass($("#encabezado__fecha"), $("#encabezado__materia"), "active");
                        //Activando boton (propiedad)
                        $('.solicitar #btn-asesoria-anterior').prop("disabled", false);

                        //Mostrando elemento de fechas
                        itemToShow.slideToggle(function(){
                            //Evento AJAX
                            updateAvailableDates(  subject.data("id"), $('#student-data').data("id") );
                        });
                    });
                }
            }
        }
        //----------------------SELECCION DE HORARIO
        else if( seccion === "fechas" ){
            alert("Esta en Fechas");
        }
        //----------------------SELECCION DE ASESOR
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