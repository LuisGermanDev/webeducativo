<?php
session_start();
include 'db.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Obtener el ID del contenido a eliminar
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Eliminar el contenido de la base de datos
    $conexion->query("DELETE FROM contenido WHERE id = $id");
}

header("Location: index.php");
exit;
?>
