<?php

session_start();
$errores= '';
$confirmacion = false;

require '../config/functions.php';
require '../config/config.php';

if (!isset($_SESSION['admin'])){
    header('Location: ../index.php');
} 


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // * Recibimos los valores por el metodo POST, los 'limpiamos' y los asignamos
    $usuario = clearAndSanitizeData(strtolower($_POST['usuario']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['password-confirm'];

    // * Verificamos que no esten incompletos los campos
    if (empty($usuario) or empty($password) or empty($confirmPassword)){
        $errores .= 'Por favor rellenar todos los campos';
    } else {
        
        $conexion = connectionDB($db_server['host'], $db_server['dbname'], $db_server['user'], $db_server['pass'], $db_server['port']);

        // * Si la conexion es true...
        if ($conexion){
            
            try{

                // * Verificamos si el usuario existe...
                $queryExistUser = $conexion->prepare('SELECT TOP 1 USUARIO FROM AccessUsers WHERE USUARIO=:usuario');
                $queryExistUser->execute(array(':usuario' => $usuario));
                $result = $queryExistUser->fetch();
                
                if ($result){
                    $errores .= 'El nombre de usuario ya existe';
                } else {
                    
                    $salt = createPasswordSalt();
                    $password .= $salt;
                    $confirmPassword .= $salt;

                    // * Hasheamos las contraseñas para asegurarlas
                    $password = hash('sha512', $password);
                    $confirmPassword = hash('sha512', $confirmPassword);

                    if ($password != $confirmPassword){
                        $errores .= 'Las contraseñas no son iguales';
                    }
                    else{

                        if (isset($_POST['checkbox-admin']) && $_POST['checkbox-admin'] == 'on'){

                            $userRoll = 'admin';

                            $queryAddUser = $conexion->prepare('INSERT INTO AccessUsers (USUARIO, SALT, PASS, ROL) VALUES (:usuario, :salt, :pass, :roll)');
                            $queryAddUser->execute(array(':usuario' => $usuario,':salt' => $salt, ':pass' => $password, ':roll' => $userRoll));
                            
                            $confirmacion = true;
                        }
                        else{

                            $queryAddUser = $conexion->prepare('INSERT INTO AccessUsers (USUARIO, SALT, PASS) VALUES (:usuario, :salt, :pass)');
                            $queryAddUser->execute(array(':usuario' => $usuario,':salt' => $salt, ':pass' => $password));
                            
                            $confirmacion = true;
                        }
                    }
                }

            }catch (Exception $th){
                // echo "Error: " . $th->getMessage();
                header('Location: ../views/errorView.html');
            }
        }
        else{
            // echo "conexion fallida";
            header('Location: ../views/errorView.html');
        }
    }
}

require '../views/registerAdminView.php';