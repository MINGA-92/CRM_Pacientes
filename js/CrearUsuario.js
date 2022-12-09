
function mostrarContrasena(){
    var Tipo= document.getElementById("Pass");
    if(Tipo.type == "password"){
        Tipo.type = "text";
    }else{
        Tipo.type = "password";
    }
}

$("#BtnGuardarUsuario").click(function(){
    let form_data = new FormData();
    var TipoDocu= $("#TipoDocu").val();
    form_data.append('TipoDocu', TipoDocu);
    var Identificacion= $("#Identificacion").val();
    form_data.append('Identificacion', Identificacion);
    var NombreCompleto= $("#NombreCompleto").val().toUpperCase();
    form_data.append('NombreCompleto', NombreCompleto);
    var Correo= $("#Correo").val();
    form_data.append('Correo', Correo);
    var Pass= $("#Pass").val();
    form_data.append('Pass', Pass);

    if((TipoDocu == null) || (TipoDocu == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Tipo De Documento"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Identificacion == null) || (Identificacion == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Identificacion"',
            confirmButtonColor: '#2892DB'
        })
    }else if((NombreCompleto == null) || (NombreCompleto == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Nombre Completo"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Correo == null) || (Correo == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Correo"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Pass == null) || (Pass == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Crear Contraseña"',
            confirmButtonColor: '#2892DB'
        })
    }else {
        $.ajax({
            url: "../Controladores/GuardarUsuario.php",
            dataType: "json",
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: form_data,
            success: function (php_response){
                Respuesta = php_response.msg;
                if(Respuesta == "Ok"){
                    Swal.fire({
                        title: '¡Ya Tienes Cuenta!  😉',
                        text: '¡Usuario Guardado Exitosamente!',
                        icon: 'success',
                        showConfirmButton: false,
                        confirmButtonColor: '#2892DB',
                        timer: 2000
                    }).then(() => {
                        window.location= '../Index.php';
                    })
                }else if(Respuesta == "Ya Existe"){
                    Swal.fire({
                        icon: 'info',
                        title: '¿Otra Vez Tu?  🤔',
                        text: 'Este Usuario Ya Se Encuentra Registrado En El Sistema...',
                        confirmButtonColor: '#2892DB'
                    })
                    console.log(php_response.msg);
                }else if(Respuesta == "Error"){
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error Al Registrar Informacion!  🤨',
                        text: 'Por Favor, Consultar Con El Desarrollador Del Sistema...',
                        confirmButtonColor: '#2892DB'
                    })
                    console.log(php_response.msg);
                }
            },
            error: function (php_response){
            php_response = JSON.stringify(php_response);
            Swal.fire({
                icon: 'error',
                title: '¡Fallo La Comunicacion Con El Servidor!  😵',
                text: 'Por Favor, Consultar Con El Desarrollador Del Sistema...',
                confirmButtonColor: '#2892DB'
            })
            console.log(php_response);
            }
        });
    }
})