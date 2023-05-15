<?php

require '../../admin/config/functions.php';
require '../../admin/config/config.php';

// error_reporting(0);
header('Content-type: application/json; charset=utf-8');

$sucursal = clearAndSanitizeData($_POST['sucursal']);
$fecha1 = clearAndSanitizeData($_POST['fecha1']);
$fecha2 = clearAndSanitizeData($_POST['fecha2']);
$estatus = clearAndSanitizeData($_POST['estatus']);
$table = clearAndSanitizeData($_POST['table']);

// $sucursal = clearAndSanitizeData($_GET['sucursal']);
// $fecha1 = clearAndSanitizeData($_GET['fecha1']);
// $fecha2 = clearAndSanitizeData($_GET['fecha2']);
// $estatus = clearAndSanitizeData($_GET['estatus']);
// $table = clearAndSanitizeData($_GET['table']);

function validarDatos($fecha1, $fecha2){
    if ($fecha1 == ''){
        return false;
    }
    else if ($fecha2 == ''){
        return false;
    }
    else{
        return true;
    }
}

if (validarDatos($fecha1, $fecha2)){

    $respuesta = [];

    try {

        $conexion = connectionDB($db_serverFNG['host'], $db_serverFNG['dbname'], $db_serverFNG['user'], $db_serverFNG['pass'], $db_serverFNG['port']);

        if ($conexion) {

            if ($table == 'resumenGeneral'){
            
                $statement = $conexion->prepare("select * from llamarDatos(:sucursal,:fecha1,:fecha2,:estatus)");
                $statement->execute(array(':sucursal' => $sucursal, ':fecha1' => $fecha1, ':fecha2' => $fecha2, ':estatus' => $estatus));
                $result = $statement->fetchAll();
            }
            else if ($table == 'bitacoras'){

                $statement = $conexion->prepare("select * from llamarDatos2(:sucursal,:fecha1,:fecha2,:estatus)");
                $statement->execute(array(':sucursal' => $sucursal, ':fecha1' => $fecha1, ':fecha2' => $fecha2, ':estatus' => $estatus));
                $result = $statement->fetchAll();
            }
            else if ($table == 'antiguedades'){

                $statement = $conexion->prepare("select * from llamarDatos3(:sucursal,:fecha1,:fecha2)");
                $statement->execute(array(':sucursal' => $sucursal, ':fecha1' => $fecha1, ':fecha2' => $fecha2));
                $result = $statement->fetchAll();
                
            }else if ($table == 'prestamos'){

                $statement = $conexion->prepare("select * from llamarDatos4(:sucursal,:fecha1,:fecha2)");
                $statement->execute(array(':sucursal' => $sucursal, ':fecha1' => $fecha1, ':fecha2' => $fecha2));
                $result = $statement->fetchAll();
                
            }else if ($table == 'resumen'){

                $statement = $conexion->prepare("select * from llamarDatos5R(:sucursal,:fecha1,:fecha2)");
                $statement->execute(array(':sucursal' => $sucursal, ':fecha1' => $fecha1, ':fecha2' => $fecha2));
                $result = $statement->fetchAll();
                
            }else if ($table == 'desglozado'){

                $statement = $conexion->prepare("select * from llamarDatos5D(:sucursal,:fecha1,:fecha2)");
                $statement->execute(array(':sucursal' => $sucursal, ':fecha1' => $fecha1, ':fecha2' => $fecha2));
                $result = $statement->fetchAll();
            }
        
            if (!$result){
                $respuesta = ['error' => 'resultados'];
            }
            else{
                foreach ($result as $info){
                    array_push($respuesta, $info);
                }
            }
        }
        else{
            $respuesta = ['error' => 'en la conexion'];
        }

    } catch (Exception $e) {
        $respuesta = ['error' => 'en la expecion', 'mensaje' => $e->getMessage()];
    }
}
else{
    $respuesta = ['error' => 'en las fechas'];
}

echo json_encode($respuesta);