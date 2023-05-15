<?php

require '../../admin/config/config.php';

session_start();

if (!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}

require '../views/resumenGeneralView.php';