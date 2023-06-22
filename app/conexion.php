<?php
// Conexión a la base de datos (usando mysqli y MySQL)
$servidor = 'db';
$usuarioBD = 'root';
$contraseniaBD = 'root';
$nombreBD = 'web';

$conexion = new mysqli($servidor, $usuarioBD, $contraseniaBD, $nombreBD);
?>
