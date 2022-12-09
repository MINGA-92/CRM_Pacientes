

<?php

require("Conexion.php");
session_start();

$TipoDocu= $_POST['TipoDocu'];
$Identificacion= $_POST['Identificacion'];
$Nombre= $_POST['NombreCompleto'];
$Correo= $_POST['Correo'];
$Pass= $_POST['Pass'];


//Verificacion De Existencia Del Usuario
$ConsultaSQL= "SELECT * FROM dbp_pacientes.tbl_usuarios WHERE USU_DOCUMENTO='". $Identificacion ."' AND USU_ESTADO= 'Activo';";
if ($ResultadoSQL= $ConexionSQL->query($ConsultaSQL)) { 
    $CantidadResultados= $ResultadoSQL->num_rows;
    if($CantidadResultados > 0) {
        $php_response= array("msg" => "Ya Existe");
        echo json_encode($php_response);
        mysqli_close($ConexionSQL);
        exit;
    }else {
        $InsercionSQL= "INSERT INTO dbp_pacientes.tbl_usuarios(USU_TIPO_DOCUMENTO, USU_DOCUMENTO, USU_NOMBRE, USU_EMAIL, USU_PASWORD, USU_ESTADO) VALUES ('". $TipoDocu ."', '". $Identificacion ."', '". $Nombre ."', '". $Correo ."', '". $Pass ."', 'Activo');";
        if ($ResultadoSQL= $ConexionSQL->query($InsercionSQL)) { 
            //inserción correcta
            $php_response= array("msg" => "Ok");
            echo json_encode($php_response);
            mysqli_close($ConexionSQL);
            exit;
        } else {
            //Error en la Insercion
            $php_response= array("msg" => "Error");
            $ErrorConsulta= mysqli_error($ConexionSQL);
            mysqli_close($ConexionSQL);
            echo $ErrorConsulta;
            exit;
        }
    }
}else {
    //Error en la Consulta
    $ErrorConsulta= mysqli_error($ConexionSQL);
    mysqli_close($ConexionSQL);
    echo $ErrorConsulta;
    exit;
}

?>