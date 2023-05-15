<?php

// * Igual definimos que trabajamos con sesiones, por que es un login.
session_start();
$errores = '';

require '../../admin/config/functions.php';
require '../../admin/config/config.php';

// * Si ya existe una sesion lo mandamos al index de cliente.
if (isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}else{

    // ! Verificamos que el formulario haya sido enviado por el metodo POST, si no no hara nada.
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        // * Limpiamos y asiganmos las variables a utilizar.
        $usuario = clearAndSanitizeData(strtolower($_POST['usuario']));
        $password = $_POST['password'];
        
        // ! Este try sirve para evitar que muestre errores detallados del servidor o de la logica de la aplicacion
        try{

            // * Creamos una variable para acceder y tener conexion a la base de datos.
            $conexion = connectionDB($db_server['host'], $db_server['dbname'], $db_server['user'], $db_server['pass'], $db_server['port']);

            // * Si la conexion fue exitosa realizara la validacion del login.
            if ($conexion){

                // * Verificamos si existe el usuario, si existe traemos su 'salt'.
                $queryBringSalt = $conexion->prepare('SELECT TOP 1 USUARIO, SALT FROM AccessUsers WHERE USUARIO=:usuario');
                $queryBringSalt->execute(array(':usuario' => $usuario));
                $resultBring = $queryBringSalt->fetch();

                // * Si regresa con resultados (en otras palabras, si existe el usuario).
                if ($resultBring){

                    /// * Conseguimos el salto, lo agregamos a su contraseña y la hasheamos.
                    $password .= $resultBring['SALT'];
                    $password = hash('sha512', $password);

                    // * Ya por ultimo verificamos si hay una coincidencia en la bd con el usuario y contraseña proporcionados.
                    $queryLogin = $conexion->prepare('SELECT TOP 1 USUARIO, SALT FROM AccessUsers WHERE USUARIO=:usuario AND PASS=:pass');
                    $queryLogin->execute(array(':usuario' => $usuario, ':pass' => $password));
                    $resultLogin = $queryLogin->fetch();
                    
                    // * Si el login fue exitoso, lo mandamos ahora si a la pagina de inicio y a su vez establecemos la sesion de usuario.
                    if ($resultLogin){
                        $_SESSION['usuario'] = $usuario;
                        header('Location: paginaInicio.php');
                    }
                    else{
                        // * Si no, indicamos que los datos son incorrectos.
                        $errores .= 'Datos incorrectos, intentalo de nuevo';
                    }

                }
                else{
                    // * Si no existe el usuario, le decimos que los datos son incorrectos.
                    $errores .= 'Datos incorrectos, intentalo de nuevo';
                }
            }
            else{

                // * Caso contrario, mandamos al cliente a la vista de error.
                // header('Location: ../views/errorView.html');
                echo 'error de conexion';
            }

        }
        catch (Exception $e){
            
            // ! Si llega haber algun error mandamos al cliente a la vista de error.
            // header('Location: ../views/errorView.html');
            echo 'error general';
        }
    }
}

// * Esto es para poder mostrar el contenido visual.
require '../views/loginUserView.php';