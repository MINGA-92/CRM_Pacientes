
<?php
    require("../Controladores/Conexion.php");
    session_start();

    $Passport = $_SESSION['USU_ID'];
    if (isset($Passport)) {
    } else {
        echo "<script>window.location='../Controladores/logout.php';</script>";
        exit;
    }
    require("../Controladores/ConsultaPermisos.php");

    $DatosPacientes = array();
    $ConsultaPacientes = "SELECT * FROM dbp_pacientes.tbl_pacientes WHERE PAC_ESTADO= 'Activo' ORDER BY PAC_ID ASC;";
    if ($ResultadoPacientes = $ConexionSQL->query($ConsultaPacientes)) {
        $CantidadResultados = $ResultadoPacientes->num_rows;
        if ($CantidadResultados > 0) {
            while ($FilaResultado = $ResultadoPacientes->fetch_assoc()) {
                array_push($DatosPacientes, array('0' => $FilaResultado['PAC_TIPO_DOCUMENTO'], '1' => $FilaResultado['PAC_DOCUMENTO'], '2' => $FilaResultado['PAC_NOMBRES'], '3' => $FilaResultado['PAC_APELLIDOS'], '4' => $FilaResultado['PAC_GENERO'], '5' => $FilaResultado['PAC_DEPARTAMENTO'], '6' => $FilaResultado['PAC_MUNICIPIO'], '7' => $FilaResultado['PAC_ID']));
            }
        }else{
            // Sin Resultados
            mysqli_close($ConexionSQL);
            echo "<script>window.location='../Controladores/logout.php';</script>";
            exit;
        }
    }else{ 
        // Error en la Consulta
        $ErrorConsulta = mysqli_error($ConexionSQL);
        echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
        mysqli_close($ConexionSQL);
        echo "<script>window.location='../Controladores/logout.php';</script>";
        exit; 
    }   

?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Litado De Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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

    <section class="pricing py-2">
        <div class="container">
            <a class="btn btn-primary" href="../Vistas/CrearPaciente.php"> Nuevo Paciente <i class="fa-solid fa-user-plus"></i></a>
            <div style="margin-top: 2%;"></div>
            <div class="row">
                <table id="TblPaciente" class="table table-bordered table-striped text-center mt-4">
                    <thead class="bg-info text-black">
                        <tr>     
                            <th>Tipo Documento </th>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Genero</th>
                            <th>Departamento</th>
                            <th>Municipio</th>
                            <th class="text-primary">Actualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($i = 0; $i < count($DatosPacientes); $i++) {
                                echo '<tr>';
                                for ($d = 0; $d < count($DatosPacientes[$i]); $d++) {
                                    print_r($d);
                                    if ($d == 7) {
                                        echo '<td style="position: relative;">
                                            <a class="btn btn-outline-info" onclick="EnviarInforPaciente(' . $DatosPacientes[$i][$d] .');"><i class="fas fa-edit"></i></a>
                                        </td>';
                                    } else {
                                        echo '<td class="text-white" style="text-align: center;">' . $DatosPacientes[$i][$d] . '</td>';
                                    }
                                }
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/FuncionesGenerales.js"></script>

</body>
</html>
