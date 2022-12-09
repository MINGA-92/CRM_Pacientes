
<?php

require("Conexion.php");
session_start();

$TipoDocu = $_POST['TipoDocu'];
$Identificacion = $_POST['Identificacion'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$Genero = $_POST['Genero'];
$Departamento = $_POST['Departamento'];
$Municipio = $_POST['Municipio'];
$Usuario = $_POST['Usuario'];


//Verificacion De Existencia Del Paciente
$ConsultaSQL = "SELECT * FROM dbp_pacientes.tbl_pacientes WHERE PAC_DOCUMENTO='". $Identificacion ."' AND PAC_ESTADO= 'Activo';";
if ($ResultadoSQL = $ConexionSQL->query($ConsultaSQL)) { 
    $CantidadResultados = $ResultadoSQL->num_rows;
    if($CantidadResultados > 0) {
        $php_response = array("msg" => "Ya Existe");
        echo json_encode($php_response);
        mysqli_close($ConexionSQL);
        exit;
    }else {
        $InsercionSQL = "INSERT INTO dbp_pacientes.tbl_pacientes(PAC_TIPO_DOCUMENTO, PAC_DOCUMENTO, PAC_NOMBRES, PAC_APELLIDOS, PAC_GENERO, PAC_DEPARTAMENTO, PAC_MUNICIPIO, PAC_REGISTRADO_POR, PAC_ESTADO) VALUES ('". $TipoDocu ."', '". $Identificacion ."', '". $Nombres ."', '". $Apellidos ."', '". $Genero ."', '". $Departamento ."', '". $Municipio ."', '". $Usuario ."', 'Activo');";
        if ($ResultadoSQL = $ConexionSQL->query($InsercionSQL)) { 
            //inserción correcta
            $php_response = array("msg" => "Ok");
            echo json_encode($php_response);
            mysqli_close($ConexionSQL);
            exit;
        } else {
            //Error en la Insercion
            $php_response = array("msg" => "Error");
            $ErrorConsulta = mysqli_error($ConexionSQL);
            mysqli_close($ConexionSQL);
            echo $ErrorConsulta;
            exit;
        }
    }
}

?>