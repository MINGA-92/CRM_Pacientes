
<?php
    require("Conexion.php");
    session_start();

    $ConsultaUsuario = "SELECT USU_DOCUMENTO, USU_NOMBRE FROM dbp_pacientes.tbl_usuarios WHERE USU_ID='". $Passport ."' AND USU_ESTADO= 'Activo' ORDER BY USU_ID DESC;";
    if ($ResultadoUsuario = $ConexionSQL->query($ConsultaUsuario)) {
        $CantidadResultados = $ResultadoUsuario->num_rows;
        if ($CantidadResultados > 0) {
            while ($FilaResultado = $ResultadoUsuario->fetch_assoc()) {
                $DocumentoUsuario = $FilaResultado['USU_DOCUMENTO'];
                $NombreUsuario = $FilaResultado['USU_NOMBRE'];
            }
        }else{
            // Sin Resultados
            mysqli_close($ConexionSQL);
            echo "<script>window.location='logout.php';</script>";
            exit;
        }
    }else{ 
        // Error en la Consulta
        $ErrorConsulta = mysqli_error($ConexionSQL);
        echo '<script>alert("Error Falla -> ' . $ErrorConsulta . '");</script>';
        mysqli_close($ConexionSQL);
        echo "<script>window.location='logout.php';</script>";
        exit; 
    }
?>