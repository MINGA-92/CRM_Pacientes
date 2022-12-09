
<?php
    require("../Controladores/Conexion.php");
    require("../Controladores/ListasDesplegables.php");
?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litado De Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style type="text/css">
        body{
			background: #bdbdbd;
			border: 2px solid #11caf4;
		}
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark static-top shadow">
        <div class="container bg-dark">
            <a class="navbar-brand text-white" href="#"><h2 class="text-info">👨🏽‍💻 MingaSoft™ </h2></a>
        </div>
    </nav>
    <div class="text-center bg-dark pricing py-2">
        <h2 style="color: #2892DB;"></h2>
    </div>

    <section class="pricing py-7">
        <div class="container col-md-9 col-lg-5 col-xl-7"> 
            <div class="card-header bg-primary text-center text-uppercase" style="margin-top: 2%;"><b>Nuevo Usuario</b></div>           
            <div class="card-body bg-dark">
                <form id="frmCrearUsuario">
                    <div class="mb-0" style="margin-top: 2%;">
                        <label for="TipoDocu" class="form-label text-info">Tipo De Documento:</label>
                        <select class="form-select" id="TipoDocu" name="TipoDocu">
                            <option disabled selected>Elige Una Opcion</option>
                            <?php echo $ListadoTipoDocumento; ?>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label for="Identificacion" class="form-label text-info" style="margin-top: 2%;">Numero De Identificacion: </label>
                        <input class="form-control" type="number" id="Identificacion" name="Identificacion">
                    </div>
                    <div class="mb-0">
                        <label for="NombreCompleto" class="form-label text-info" style="margin-top: 2%;">Nombre Completo: </label>
                        <input class="form-control" type="text" id="NombreCompleto" name="NombreCompleto">
                    </div>
                    <div class="mb-0">
                        <label for="Correo" class="form-label text-info" style="margin-top: 2%;">Correo Electronico: </label>
                        <input class="form-control" type="email" id="Correo" name="Correo">
                    </div>
                    <div class="mb-0">
                        <label for="Pass" class="form-label text-info" style="margin-top: 2%;">Crear Contraseña Para Este Usuario: </label>
                    </div>     
                    <div class="mb-2 col-md-7 col-lg-5 col-xl-9">
                        <input class="form-control form-control-lg" type="password" id="Pass" name="Pass"/>
                        <input type="button" id="BtnVer" class="btn btn-outline-info" onclick="mostrarContrasena()" style="margin-top: 2%;" value="👀"/>
                    </div>
                    <div class="mb-2">
                        <button type="button" id="BtnGuardarUsuario" class="btn btn-primary"> Crear Cuenta </button>
                        <a href="../index.php" class="btn btn-secondary"> Cancelar </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="../ajax/libscripts.js"></script>
    <script src="../ajax/vendorscripts.js"></script>
    <script src="../ajax/mainscripts.js"></script>
    <script src="../js/CrearUsuario.js"></script>
</body>
</html>
