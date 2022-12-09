
<?php
    require("../Controladores/Conexion.php");
    session_start();

    $Passport = $_SESSION['USU_ID'];
    if(isset($Passport)){
    }else {
        echo "<script>window.location='../Controladores/logout.php';</script>";
        exit;
    }
    require("../Controladores/ConsultaPermisos.php");
    require("../Controladores/ListasDesplegables.php");
?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light static-top mb-5 shadow" style="background: #bdbdbd; border: 2px solid #11caf4;">
        <div class="container">
            <a class="navbar-brand" href="#"><h2>🩺 <?php echo $NombreUsuario;?></h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php require("Nav.php");?>
            </div>
        </div>
    </nav>
    <section class="pricing py-7">
        <div class="container col-md-9 col-lg-5 col-xl-7"> 
            <div class="card-header bg-info text-center text-uppercase"><b>Nuevo Paciente</b></div>           
            <div class="card-body bg-light">
                <form id="frmCrearPaciente">
                    <div class="mb-0" style="margin-top: 2%;">
                        <label for="TipoDocu" class="form-label">Tipo De Documento:</label>
                        <select class="form-select" id="TipoDocu" name="TipoDocu">
                            <option disabled selected>Elige Una Opcion</option>
                            <?php echo $ListadoTipoDocumento; ?>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label for="Identificacion" class="form-label" style="margin-top: 2%;">Numero De Identificacion: </label>
                        <input class="form-control" type="number" id="Identificacion" name="Identificacion">
                    </div>
                    <div class="mb-0">
                        <label for="Nombres" class="form-label" style="margin-top: 2%;">Nombres: </label>
                        <input class="form-control" type="text" id="Nombres" name="Nombres">
                    </div>
                    <div class="mb-0">
                        <label for="Apellidos" class="form-label" style="margin-top: 2%;">Apellidos: </label>
                        <input class="form-control" type="text" id="Apellidos" name="Apellidos">
                    </div>
                    <div class="mb-0">
                        <label for="Genero" class="form-label" style="margin-top: 2%;">Genero: </label>
                        <select class="form-select" id="Genero" name="Genero">
                            <option disabled selected>Elige Una Opcion</option>
                            <?php echo $ListadoGenero;?>
                        </select>
                    </div>
                    <div class="mb-0" style="margin-top: 2%;">
                        <label for="Departamento" class="form-label">Departamento:</label>
                        <select class="form-select" id="Departamento" name="Departamento" onchange="ObtenerMunicipio()">
                            <option disabled selected>Elige Una Opcion</option>
                            <?php echo $ListadoDepartamento; ?>
                        </select>
                    </div>
                    <div class="mb-0" style="margin-top: 2%;">
                        <label for="Municipio" class="form-label">Municipio:</label>
                        <select class="form-select" id="Municipio" name="Municipio">
                            <option disabled selected>Elige Una Opcion</option>
                        </select>
                    </div>
                    <div class="mb-2" style="margin-top: 2%;">
                        <button type="button" id="BtnGuardar" class="btn btn-info"> Registrar Paciente </button>
                        <a href="Principal.php" class="btn btn-secondary"> Cancelar Registro</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <input class="form-control" type="text" id="Usuario" name="Usuario" value="<?php echo $NombreUsuario;?>" disabled hidden>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="../ajax/libscripts.js"></script>
    <script src="../ajax/vendorscripts.js"></script>
    <script src="../ajax/mainscripts.js"></script>
    <script src="../js/FuncionesGenerales.js"></script>
    <script src="../js/CrearPaciente.js"></script>
</body>
</html>