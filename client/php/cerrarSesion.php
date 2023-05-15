<?php

// * Cerramos la sesion cuando se deslogee
session_start();
session_destroy();

// * lo regresamos al index para que el index lo autorediriga
header('Location: ../');
die();