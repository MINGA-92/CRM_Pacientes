
<?php
    require("Conexion.php");

    //Consulta TipoDocumento 
    $ListadoTipoDocumento = "";
    $ConsultaTipoDocumento = "SELECT REST_DETALLE, REST_DETALLE_2 FROM dbp_pacientes.tbl_restandar WHERE REST_CONSULTA='TipoDocumento' AND REST_ESTADO='Activo';";
    if ($ResultadoTipoDocumento = $ConexionSQL->query($ConsultaTipoDocumento)) {
        $CantidadResultados = $ResultadoTipoDocumento->num_rows;
        if ($CantidadResultados > 0) {
            while ($FilaResultado = $ResultadoTipoDocumento->fetch_assoc()) {
                $ListadoTipoDocumento = $ListadoTipoDocumento . '<option value="' . $FilaResultado['REST_DETALLE'] . '">' . $FilaResultado['REST_DETALLE_2'] . '</option>';
            }
        } else {
            //Sin Resultados
            $ListadoTipoDocumento = $ListadoTipoDocumento . '<option value="Sin Resultados">Sin Resultados </option>';
        }
    } else {
        $ErrorConsulta = mysqli_error($ConexionSQL);
        echo $ErrorConsulta;
    }

    //Consulta Departamento 
    $ListadoDepartamento = "";
    $ConsultaDepartamento = "SELECT DISTINCT REST_DETALLE FROM dbp_pacientes.tbl_restandar WHERE REST_CONSULTA='Ubicacion' AND REST_ESTADO='Activo';";
    if ($ResultadoDepartamento = $ConexionSQL->query($ConsultaDepartamento)) {
        $CantidadResultados = $ResultadoDepartamento->num_rows;
        if ($CantidadResultados > 0) {
            while ($FilaResultado = $ResultadoDepartamento->fetch_assoc()) {
                $ListadoDepartamento = $ListadoDepartamento . '<option value="' . $FilaResultado['REST_DETALLE'] . '">' . $FilaResultado['REST_DETALLE'] . '</option>';
            }
        } else {
            //Sin Resultados
            $ListadoDepartamento = $ListadoDepartamento . '<option value="Sin Resultados">Sin Resultados </option>';
        }
    } else {
        $ErrorConsulta = mysqli_error($ConexionSQL);
        echo $ErrorConsulta;
    }

    //Consulta Genero 
    $ListadoGenero = "";
    $ConsultaGenero = "SELECT REST_DETALLE FROM dbp_pacientes.tbl_restandar WHERE REST_CONSULTA='Genero' AND REST_ESTADO='Activo';";
    if ($ResultadoGenero = $ConexionSQL->query($ConsultaGenero)) {
        $CantidadResultados = $ResultadoGenero->num_rows;
        if ($CantidadResultados > 0) {
            while ($FilaResultado = $ResultadoGenero->fetch_assoc()) {
                $ListadoGenero = $ListadoGenero . '<option value="' . $FilaResultado['REST_DETALLE'] . '">' . $FilaResultado['REST_DETALLE'] . '</option>';
            }
        } else {
            //Sin Resultados
            $ListadoGenero = $ListadoGenero . '<option value="Sin Resultados">Sin Resultados </option>';
        }
    } else {
        $ErrorConsulta = mysqli_error($ConexionSQL);
        echo $ErrorConsulta;
    }

?>