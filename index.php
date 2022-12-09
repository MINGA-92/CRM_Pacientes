
<?php
    session_start();
    require("Controladores/Conexion.php");
    if (isset($_SESSION['USU_ID'])) {
        //echo '<script> window.location="Controladores/Direccionamiento.php"; </script>';
    } else {
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: Login :: </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark static-top shadow">
        <div class="container bg-dark">
            <a class="navbar-brand text-white" href="#"><h2 class="text-info">👨🏽‍💻 MingaSoft™ </h2></a>
        </div>
    </nav>

    <div class="text-center bg-dark pricing py-2">
        <h2 style="margin-top: 2%; color: #2892DB;"> 👩🏽‍⚕️ ¡Bienvenidos Al Registro De Pacientes! 👨🏽‍⚕️ </h2>
    </div>
    <section class="pricing py-5 bg-dark">
        <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="row">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="img/draw2.webp" class="img-fluid" alt="Sample image">
                </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form id="frmLlogin" action="Controladores/Login.php" method="post">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <p class="lead fw-normal mb-0 me-3" style="color: #2892DB;">Dirección De Correo Electrónico: </p>
                                <input type="email" id="usuario" name="usuario" class="form-control form-control-lg" placeholder="Introduzca una dirección de correo electrónico válida" />
                            </div>
                
                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <p class="lead fw-normal mb-0 me-3" style="color: #2892DB;" contenteditable= "no" >Contraseña: </p>
                                <input type="password" id="passport" name="passport" class="form-control form-control-lg" placeholder="Introduzca su contraseña" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#!" class="link" >¿Se te olvidó tu contraseña?</a>
                                <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Acceder">
                            </div>
                        </form>
                            
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3" style="color: #ffffff;">Ingresar Con: </p>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>
                            </div>
                            <p class="small fw-bold mt-2 pt-1 mb-0" style="color: #ffffff;">¿No tienes una cuenta? 🤨...
                                <a href="Vistas/CrearUsuario.php" class="link"> Registrate Aqui</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-top: 2%">  
            <iframe id="FrameExample" src="" height="68" width="100%"> </iframe>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark">  
            <section class="pricing py-7">
                <MARQUEE ScrollAmount="11">
                    <h2 href="/" style="color: #2892DB;">📅
                    <?php
                    date_default_timezone_set("America/Bogota");
                    echo date ("l d F Y -⏰ h:i a");
                    ?>
                    </h2>
                </MARQUEE>
            </section>
        </div>
    </section>

    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            MingaSoft™ Copyright © 2022. by Diego Rendón All rights reserved.
        </div>
    
        <!-- Right -->
        <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            </div>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.js"></script>
    <!--<script src="ajax/libscripts.js"></script>
    <script src="ajax/vendorscripts.js"></script>
    <script src="ajax/mainscripts.js"></script>
    <script src="js/Login.js"></script>-->
</body>
</html>