
//Función para consultar Lista Municipios
function ObtenerMunicipio(){
    let Departamento = document.getElementById('Departamento');
    let ValorDepartamento = Departamento.value;
    console.log(ValorDepartamento);
    if (ValorDepartamento != ""){
        let form_data = new FormData();
            form_data.append('ValorDepartamento', ValorDepartamento);
        $.ajax({
            url: "../Controladores/ConsultaMunicipio.php",
            type: "POST",
            dataType: "json",
            cache: false,
            processData: false,
            contentType: false,
            data: form_data,
            success: function(php_response) {
                Respuesta = php_response.msg;
                if (Respuesta == "Ok") {
                    $("#Municipio").text("");
                    $("#Municipio").text("<option>Seleccionar una opcion</option>");
                    $("#Municipio").append(php_response.Resultado);
                } else if (Respuesta == "SinResultados") {
                    alert("¡No Se Encontraron Municipios, Consultar Con El Desarrollador Del Sistema!");
                } else if (Respuesta == "Error") {
                    alert("¡Se Genero Una Falla!");
                    console.log("Error en el sistema");
                    console.log(php_response.Falla);
                }
            },
            error: function(php_response) {
                php_response = JSON.stringify(php_response);
                alert("¡Error en la comunicacion con el servidor!");
                console.log(php_response);
            }
        })
    }
}


//Función para enviar datos paciente
function EnviarInforPaciente(Clave) {
    var form = document.createElement('form');
    form.style.visibility = 'hidden';
    form.method = 'POST';
    form.action = 'EditarPaciente.php';
    var input = document.createElement('input');
    input.name = 'Clave';
    input.value = Clave;
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
}
