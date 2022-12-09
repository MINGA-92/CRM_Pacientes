
$("#BtnActualizar").click(function(){
    let form_data = new FormData();

    var TipoDocu= $("#TipoDocu").val();
    form_data.append('TipoDocu', TipoDocu);
    var Identificacion= $("#Identificacion").val();
    form_data.append('Identificacion', Identificacion);
    var Nombres= $("#Nombres").val().toUpperCase();
    form_data.append('Nombres', Nombres);
    var Apellidos= $("#Apellidos").val().toUpperCase();
    form_data.append('Apellidos', Apellidos);
    var Genero= $("#Genero").val();
    form_data.append('Genero', Genero);
    var Departamento= $("#Departamento").val();
    form_data.append('Departamento', Departamento);
    var Municipio= $("#Municipio").val();
    form_data.append('Municipio', Municipio);
    var Usuario= $("#Usuario").val().toUpperCase();
    form_data.append('Usuario', Usuario);
    var CodigoPaciente= $("#CodigoPaciente").val();
    form_data.append('CodigoPaciente', CodigoPaciente);

    if((Usuario == null) || (Usuario == "") || (CodigoPaciente == null) || (CodigoPaciente == "")){
        Swal.fire({
            icon: 'error',
            title: '☠ Error ☠',
            text: 'No Exite "Usuario y/o Codigo"',
            confirmButtonColor: '#2892DB'
        })
    }else if((TipoDocu == null) || (TipoDocu == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo Tipo De "Documento"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Identificacion == null) || (Identificacion == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Identificacion"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Nombres == null) || (Nombres == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Nombres"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Apellidos == null) || (Apellidos == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Apellidos"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Genero == null) || (Genero == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Genero"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Departamento == null) || (Departamento == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Departamento"',
            confirmButtonColor: '#2892DB'
        })
    }else if((Municipio == null) || (Municipio == "")){
        Swal.fire({
            icon: 'error',
            title: '🤨 Oops...',
            text: 'Se Tiene Que Diligenciar El Campo "Municipio"',
            confirmButtonColor: '#2892DB'
        })
    }else {
        $.ajax({
            url: "../Controladores/ActualizarPaciente.php",
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
                        title: '¡Actualizado!  😏',
                        text: '¡Información Actualizada Exitosamente!',
                        icon: 'success',
                        showConfirmButton: false,
                        confirmButtonColor: '#2892DB',
                        timer: 2000
                    }).then(() => {
                        window.location= 'Principal.php';
                    })
                }else if(Respuesta == "Error"){
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error Al Actualizar Informacion!  🤨',
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