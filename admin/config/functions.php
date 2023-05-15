<?php

function connectionDB($host, $dbname, $username, $password, $puerto){
    try{
        $conection = new PDO ("sqlsrv:Server=$host,$puerto;Database=$dbname",$username,$password);
        return $conection;
    } catch (PDOException $th){
        return false;
    }
}

function clearAndSanitizeData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function createPasswordSalt(){

    $charAndNumbers = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9',0);
    srand((double)microtime()*1000000);
    $password = '';

    for ($i = 1; $i <= 6; $i++){
        $password .= $charAndNumbers[rand(0, count($charAndNumbers)-1)];
    }
    return $password;
}