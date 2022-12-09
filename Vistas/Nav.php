
<?php
    if($NombreUsuario != ''){
        echo '<ul class="navbar-nav ms-auto">
        <li class="nav-item active">
            <a class="nav-link text-black" href="../Index.php">🩹 Inicio </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-black" href="../Vistas/Principal.php">🤕 Listado De Paciente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-black" href="../Vistas/CrearPaciente.php">💉 Registrar Paciente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="../Controladores/Logout.php"> ☠ Cerrar Sesion</a>
        </li>
        </ul>';
    }else{
        echo '<li>
            <a href="../Controladores/Logout.php">
                <span>Cerrar Sesión</span>
            </a>
        </li>';
    }
?>