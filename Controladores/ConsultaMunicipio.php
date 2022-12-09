
<?php

require("Conexion.php");

$ValorDepartamento = $_POST['ValorDepartamento'];
$ListadoMunicipios = "";
$ConsultaMunicipios = "SELECT DISTINCT REST_DETALLE_2 FROM dbp_pacientes.tbl_restandar WHERE REST_CONSULTA='Ubicacion' AND REST_DETALLE='". $ValorDepartamento ."' AND REST_ESTADO='Activo';";
if ($ResultadoMunicipios = $ConexionSQL->query($ConsultaMunicipios)) {
    $CantidadResultados = $ResultadoMunicipios->num_rows;
    if ($CantidadResultados > 0){
        while ($FilaResultado = $ResultadoMunicipios->fetch_assoc()){
            $ListadoMunicipios = $ListadoMunicipios . '<option value="' . $FilaResultado['REST_DETALLE_2'] . '">' . $FilaResultado['REST_DETALLE_2'] . '</option>';
        }
        $php_response = array("msg" => "Ok", "Resultado" => $ListadoMunicipios);
        mysqli_close($ConexionSQL);
        echo json_encode($php_response);
        exit;
    }else{
        //Sin Resultados
        $php_response = array("msg" => "SinResultados");
        mysqli_close($ConexionSQL);
        echo json_encode($php_response);
        exit;
    }
} else {
    mysqli_close($ConexionSQL);
    $Falla = mysqli_error($ConexionSQL);
    $php_response = array("msg" => "Error", "Falla" => $Falla);
    echo json_encode($php_response);
    exit;
}
