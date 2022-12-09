
<?php
    require("Conexion.php");
    session_start();

    if (isset($_SESSION['USU_ID'])) { 
        $Passport= $_SESSION['USU_ID'];
        print_r($Passport);
    } else {
        echo "<script>window.location='Logout.php';</script>";
        exit;
    }

    $RolUsario = null;
    $ConsultaSQL = "SELECT USU_NOMBRE FROM dbp_pacientes.tbl_usuarios WHERE USU_ID= '".$Passport."' AND USU_ESTADO= 'Activo';";
    //print_r($ConsultaSQL);
    if ($ResultadoSQL = $ConexionSQL->query($ConsultaSQL)) {
        $CantidadResultados = $ResultadoSQL->num_rows;
        if ($CantidadResultados > 0) {
            while ($FilaResultado = $ResultadoSQL->fetch_assoc()) {
                $NombreUsuario = $FilaResultado['USU_NOMBRE'];
                break;
            }
            mysqli_free_result($ResultadoSQL);
            mysqli_close($ConexionSQL);
        } else {
            // Sin Resultados
            mysqli_close($ConexionSQL);
        }
    } else {
        // Error en la Consulta
        $ErrorConsulta = mysqli_error($ConexionSQL);
        mysqli_close($ConexionSQL);
    }


    if($NombreUsuario != ""){
        echo $NombreUsuario;
        echo '<script>window.location="../Vistas/Principal.php"</script>';  
    }else{
        echo $NombreUsuario;
        echo '<script>window.location="Logout.php"</script>';
    }

?>