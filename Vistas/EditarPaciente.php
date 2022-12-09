

<?php
    require("../Controladores/Conexion.php");
    session_start();

    $Passport= $_SESSION['USU_ID'];
    if (isset($Passport)) {
    } else {
        echo "<script>window.location='../Controladores/logout.php';</script>";
        exit;
    }
    if (isset($_POST['Clave'])) {
        $CodigoPaciente= $_POST['Clave'];
    } else {
        echo "<script>window.location='../Principal.php';</script>";
        exit;
    }
    require("../Controladores/ConsultaPermisos.php");
    require("../Controladores/ListasDesplegables.php");

    //Consulta Info Paciente
    $DatosPaciente= array();
    $ConsultaInfo= "SELECT PAC_TIPO_DOCUMENTO, PAC_DOCUMENTO, PAC_NOMBRES, PAC_APELLIDOS, PAC_GENERO, PAC_DEPARTAMENTO, PAC_MUNICIPIO FROM dbp_pacientes.tbl_pacientes WHERE PAC_ID='". $CodigoPaciente ."' AND PAC_ESTADO= 'Activo';";
    if ($ResultadoInfo= $ConexionSQL->query($ConsultaInfo)) {
        $CantidadResultados= $ResultadoInfo->num_rows;
        if ($CantidadResultados > 0) {
            while ($FilaResultado= $ResultadoInfo->fetch_assoc()) {
                $PAC_TIPO_DOCUMENTO= $FilaResultado['PAC_TIPO_DOCUMENTO'];
                $PAC_DOCUMENTO= $FilaResultado['PAC_DOCUMENTO'];
                $PAC_NOMBRES= $FilaResultado['PAC_NOMBRES'];
                $PAC_APELLIDOS= $FilaResultado['PAC_APELLIDOS'];
                $PAC_GENERO= $FilaResultado['PAC_GENERO'];
                $PAC_DEPARTAMENTO= $FilaResultado['PAC_DEPARTAMENTO'];
                $PAC_MUNICIPIO= $FilaResultado['PAC_MUNICIPIO'];
                array_push($DatosPaciente, array("0"=> $PAC_TIPO_DOCUMENTO, "1"=> $PAC_DOCUMENTO, "2"=> $PAC_NOMBRES, "3"=> $PAC_APELLIDOS, "4"=> $PAC_GENERO, "5"=> $PAC_DEPARTAMENTO, "6"=> $PAC_MUNICIPIO));
            }
        } else {
            //Sin Resultados
            $PAC_TIPO_DOCUMENTO= "";
            $PAC_DOCUMENTO= "";
            $PAC_NOMBRES= "";
            $PAC_APELLIDOS= "";
            $PAC_GENERO= "";
            $PAC_DEPARTAMENTO= "";
            $PAC_MUNICIPIO= "";
        }
    } else {
        //Errro en la consulta sql
        $ErrorConsulta= mysqli_error($ConexionSQL);
        mysqli_close($ConexionSQL);
        echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
        echo "<script>window.location='ListadoUsuarios.php';</script>";
        exit;
    }

?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Paciente</title>
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
                <?php require("Nav.php") ?>
            </div>
        </div>
    </nav>
    <section class="pricing py-7">
        <div class="container col-md-9 col-lg-5 col-xl-7"> 
            <div class="card-header bg-info text-center text-uppercase"><b>Actualizar Paciente</b></div>           
            <div class="card-body bg-dark">
                <form id="frmEditarPaciente">
                    <div class="mb-0" style="margin-top: 2%;">
                        <label for="TipoDocu" class="form-label text-info">Tipo De Documento:</label>
                        <select class="form-select" id="TipoDocu" name="TipoDocu">
                            <option selected value="<?php echo $PAC_TIPO_DOCUMENTO;?>"><?php echo $PAC_TIPO_DOCUMENTO;?></option>
                            <?php echo $ListadoTipoDocumento;?>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label for="Identificacion" class="form-label text-info" style="margin-top: 2%;">Numero De Identificacion: </label>
                        <input class="form-control" type="number" id="Identificacion" name="Identificacion" value="<?php echo $PAC_DOCUMENTO;?>">
                    </div>
                    <div class="mb-0">
                        <label for="Nombres" class="form-label text-info" style="margin-top: 2%;">Nombres: </label>
                        <input class="form-control" type="text" id="Nombres" name="Nombres" value="<?php echo $PAC_NOMBRES;?>"/>
                    </div>
                    <div class="mb-0">
                        <label for="Apellidos" class="form-label text-info" style="margin-top: 2%;">Apellidos: </label>
                        <input class="form-control" type="text" id="Apellidos" name="Apellidos" value="<?php echo $PAC_APELLIDOS;?>"/>
                    </div>
                    <div class="mb-0">
                        <label for="Genero" class="form-label text-info" style="margin-top: 2%;">Genero: </label>
                        <select class="form-select" id="Genero" name="Genero">
                            <option selected value="<?php echo $PAC_GENERO;?>"><?php echo $PAC_GENERO;?></option>
                            <?php echo $ListadoGenero;?>
                        </select>
                    </div>
                    <div class="mb-0" style="margin-top: 2%;">
                        <label for="Departamento" class="form-label text-info">Departamento:</label>
                        <select class="form-select" id="Departamento" name="Departamento" onchange="ObtenerMunicipio()">
                            <option selected value="<?php echo $PAC_DEPARTAMENTO;?>"><?php echo $PAC_DEPARTAMENTO;?></option>
                            <?php echo $ListadoDepartamento;?>
                        </select>
                    </div>
                    <div class="mb-0" style="margin-top: 2%;">
                        <label for="Municipio" class="form-label text-info">Municipio:</label>
                        <select class="form-select" id="Municipio" name="Municipio">
                            <option selected value="<?php echo $PAC_MUNICIPIO;?>"><?php echo $PAC_MUNICIPIO;?></option>
                        </select>
                    </div>
                    <div class="mb-2" style="margin-top: 2%;">
                        <button type="button" id="BtnActualizar" class="btn btn-info"> Actualizar Paciente </button>
                        <a href="Principal.php" class="btn btn-secondary"> Cancelar Actualización</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <input class="form-control" type="text" id="Usuario" name="Usuario" value="<?php echo $NombreUsuario;?>" disabled hidden>
    <input class="form-control" type="text" id="CodigoPaciente" name="CodigoPaciente" value="<?php echo $CodigoPaciente;?>" disabled hidden>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="../ajax/libscripts.js"></script>
    <script src="../ajax/vendorscripts.js"></script>
    <script src="../ajax/mainscripts.js"></script>
    <script src="../js/FuncionesGenerales.js"></script>
    <script src="../js/ActualizarPaciente.js"></script>

</body>
</html>