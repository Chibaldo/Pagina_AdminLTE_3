<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION["id"])) {
    $usuario = new Usuario(); 
    $usuario->actualizarEstado($_SESSION["id"], 0); 
}


session_destroy();


header("Location: " . Conectar::ruta() . "views/login.php");
exit();
