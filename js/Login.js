
$("#frmLlogin").submit(function(e) {
    var usuario = $("#usuario").val();
    var password = $("#passport").val();
    console.log("usuario: ", usuario);
    console.log("passport: ", password);
    e.preventDefault();
    $.ajax({
        url: "Controladores/Login.php",
        type: "POST",
        data: {
            usuario: usuario,
            passport: password
        }
    }).done(function(data) {
        resultado = String(data);
        console.log(data);
        if (resultado == '1') {
            window.location = "Controladores/Direccionamiento.php";
        } else if (resultado == '0') {
            alert("Usuario y/o contraseña incorrectos");
        } else {
            alert('Error en la validacion de los datos');
            console.log(data);
        }
    })
});