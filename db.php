<?php
$host = "localhost:3307";
$usuario = "root";
$contrasena = ""; // La contraseña es vacía por defecto en XAMPP
$base_datos = "webeducativo";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
