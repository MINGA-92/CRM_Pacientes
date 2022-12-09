
<?php

require("Conexion.php");
session_start();

$CodigoPaciente = $_POST['CodigoPaciente'];
$TipoDocu = $_POST['TipoDocu'];
$Identificacion = $_POST['Identificacion'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$Genero = $_POST['Genero'];
$Departamento = $_POST['Departamento'];
$Municipio = $_POST['Municipio'];
$Usuario = $_POST['Usuario'];


$ActualizarSQL = "UPDATE dbp_pacientes.tbl_pacientes SET PAC_TIPO_DOCUMENTO= '". $TipoDocu ."', PAC_DOCUMENTO= '". $Identificacion ."', PAC_NOMBRES= '". $Nombres ."', PAC_APELLIDOS= '". $Apellidos ."', PAC_GENERO= '". $Genero ."', PAC_DEPARTAMENTO= '". $Departamento ."', PAC_MUNICIPIO='". $Municipio ."', PAC_REGISTRADO_POR= '". $Usuario ."' WHERE PAC_ID= '". $CodigoPaciente ."' AND PAC_ESTADO= 'Activo';";

if ($ResultadoSQL = $ConexionSQL->query($ActualizarSQL)) {
    //Actualización correcta
    $php_response = array("msg" => "Ok");
    mysqli_close($ConexionSQL);
    echo json_encode($php_response);
    exit;  
}else {
    //Error en la Actualización
    mysqli_close($ConexionSQL);
    $Falla = mysqli_error($ConexionSQL);
    $php_response = array("msg" => "Error", "Falla" => $Falla);
    echo json_encode($php_response);
    exit;
}

?>