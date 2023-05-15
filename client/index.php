<?php 

// * Indicamos que trabajaremos con sesiones.
session_start();

// * Si la sesion 'usuario' esta seteada, lo mandamos directo a la pagina de inicio (a la logica no a la vista).
if (isset($_SESSION['usuario'])){
    header('Location: php/paginaInicio.php');
}
else{
    // * Caso contrario, lo mandaremos al login de cliente (a la logica no a la vista).
    header('Location: php/loginUser.php');
}