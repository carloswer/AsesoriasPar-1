

// ---------------
// Login
// ----------------

function ajaxAuth(data){
    $.ajax({
        url: 'ajax/auth.php',
        type: 'post',
        cache: false,
        // Los datos se mandan como si fuera GET para poder obtenerlos por separado
        data: "user="+data.user+"&pass="+data.pass,
        dataType: 'json',

        //Metodo que se ejecuta antes de enviar el request
        beforeSend: function(){
            //Quita mensaje si es que esta
            $('.login-message').remove();
            //Cambia el icono del span
            $('#login-spin').show();
        }
    })
    .done(function(response){

        //Identificando tipo
        if( response.type === "auth" ){

            //Cuando salio correcto
            if( response.result === true ){
                $('#login-status').html('<p class="login-message msj-exito bg-success">'+response.message+' - Redireccionando</p>');
                //Si es administrador
                if( response.value === 'administrador' )
                    setTimeout(function(){ window.location = "administrador/"; },1000);
                //Si es estudiante
                else
                    setTimeout(function(){ window.location = "estudiante/"; },1000);
            }
            else if( response.result === 'null' )
                $('#login-status').html('<p class="login-message msj-error bg-warning">'+response.message+'</p>');
            else if( response.result === 'error' ){
                $('#login-status').html('<p class="login-message msj-fail bg-danger">'+response.message+'</p>');
            }

        }
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
    });
}


// ---------------
// REGISTRO
// ----------------


function signupAjax( dataJSON ){
    var dataJSONString = JSON.stringify( dataJSON );

    $.ajax({
        url: 'ajax/register.php',
        type: 'post',
        //Tipo de dato que regresa
        dataType: 'json',
        data: {user_register: dataJSONString},
        cache:false,
        beforeSend: function(){
            //$('#signup-spin').show();
            $('#singup-result').html( "cargando..." );
        }
    })
    .done(function(response){

        //Si es del tipo
        if( response.type === "signup" ){

            //Si no se registro por algo
            if( response.result === false ){
                //TODO: poner mensaje amarilllo
                $('#singup-result').html( response.message );
            }
            //Si ocurre un error
            else if( response.result === 'error' ){
                //TODO: poner mensaje rojo
                $('#singup-result').html( response.message );
            }
            else{
                //TODO: poner mensaje verde
                $('#singup-result').html( "Se registro con éxito" );
                window.location = "login.php";
            }

        }

    })
    .fail(function(){
        $('#singup-result').html( "Ocurrio un error" );
    })
    .always( function(response) {
        // $('#signup-spin').hide();
        console.log(  response );
    });
}




// ---------------
// Horario
// ----------------

function ajaxRegisterSchedule(student, schedule, subjects){

    //JSON para enviar
    var JSONschedule =
        {
            "student": student,
            "schedule": schedule,
            "subjects": subjects
        };

    //Transforma a String
    var scheduleJSON = JSON.stringify( JSONschedule );
    //console.log( scheduleJSON );


    $.ajax({
        url: 'ajax/register.php',
        type: 'post',
        //Tipo de dato que regresa
        dataType: 'json',
        data: {json_schedule: scheduleJSON},
        cache:false,
        beforeSend: function(){
            $('#horario__registro-status').html("Cargando...");
        }
    })
    .done(function(response){

        if( response.type === "schedule_register" ){
            $('#horario__registro-status').html(response.message);
            if( response.result === true )
                window.location = "index.php";
        }
        else
            alert("respuesta desconocida");


    })
    .fail(function(){
        //TODO: crear un alert especial (tipo twitter)
        alert("ocurrio un error en la conexion");
        $('#horario__registro-status').html("Error de conexion, intente de nuevo");
    })
    .always( function(response) {
        console.log(  response );
    });
}



// ---------------
// ASESORIAS
// ----------------

/**
 * @param subjectId String|int
 * @param studentId String|int
 */
function updateAvailableDates( subjectId, studentId ){
    $.ajax({
        url: "ajax/solicitar.ajax.php",
        type: 'post',
        //Tipo de dato que regresa
        dataType: 'json',
        data: {type: "schedule", value: subjectId, student: studentId},
        cache:false,
        beforeSend: function(){
            $('#loader-fechas').show();
        }
    })
    .done(function(response){

        if( response.type === "asesoria_schedule" ){
            // $('#loader-fechas').hide();
            console.log( "ocultando");

            if( response.result === true ){
                //Se agrega tabla con datos
                $('#table-dates').html( response.extra );
            }

        }

    })
    .fail(function(){
        //TODO: crear un alert especial (tipo twitter)
        $('#table-dates').html( "ocurrio un error en la conexion" );
    })
    .always( function(response) {
        $('#loader-fechas').hide();
        console.log(  response );
    });

}