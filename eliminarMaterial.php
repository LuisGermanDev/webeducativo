<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conexion->query("DELETE FROM material WHERE id = $id");
}

header("Location: materialDidactico.php");
exit;
?>
