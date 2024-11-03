<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $materia = $conexion->real_escape_string($_POST['materia']);
    $enlace = $conexion->real_escape_string($_POST['enlace']);

    $conexion->query("INSERT INTO material (titulo, descripcion, materia, enlace) VALUES ('$titulo', '$descripcion', '$materia', '$enlace')");
    $mensaje = "Material agregado correctamente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Material Didáctico</title>
</head>
<body>
    <h1>Agregar Material Didáctico</h1>
    <a href="logout.php">Cerrar Sesión</a>
    <?php if (isset($mensaje)): ?>
        <p style="color: green;"><?php echo $mensaje; ?></p>
    <?php endif; ?>
    <form method="POST" action="formulario2.php">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea><br>
        
        <label for="materia">Materia:</label>
        <select name="materia" required>
            <option value="matematica">Matemática</option>
            <option value="ciencias">Ciencias</option>
            <option value="historia">Historia</option>
        </select><br>
        
        <label for="enlace">Enlace:</label>
        <input type="url" name="enlace" required><br>
        
        <button type="submit">Agregar Material</button>
    </form>
    <a href="materialDidactico.php">ver material</a>
</body>
</html>
