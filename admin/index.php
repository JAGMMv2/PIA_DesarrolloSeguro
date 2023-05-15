<?php

// * Indicamos que trabajaremos con sesiones.
session_start();

// * Si la sesion 'admin' esta seteada, lo mandamos directo a la pagina de registro (a la logica no a la vista).
if (isset($_SESSION['admin'])){
    header('Location: php/registerAdmin.php');
}
else{
    // * Caso contrario, lo mandaremos al login de admin (a la logica no a la vista).
    header('Location: php/loginAdmin.php');
}