<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Incluir conexión a la base de datos
include 'db.php';

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $img = $_POST['img'];
    $materia = $_POST['materia'];

    // Insertar contenido en la base de datos
    $conexion->query("INSERT INTO contenido (titulo, contenido, img, materia) VALUES ('$titulo', '$contenido', '$img', '$materia')");
    $mensaje = "Contenido agregado correctamente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contenido</title>
</head>
<body>
    <h1>Agregar Contenido</h1>
    <a href="logout.php">Cerrar Sesión</a>
    <?php if (isset($mensaje)): ?>
        <p style="color: green;"><?php echo $mensaje; ?></p>
    <?php endif; ?>
    <form method="POST" action="formulario.php">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        <br>
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" required></textarea>
        <br>
        <label for="img">URL de la Imagen:</label>
        <input type="text" name="img" required>
        <br>
        <label for="materia">Materia:</label>
        <select name="materia" required>
            <option value="matematica">Matemática</option>
            <option value="ciencias">Ciencias</option>
            <option value="historia">Historia</option>
            <!-- Agrega más opciones según tus necesidades -->
        </select>
        <br>
        <button type="submit">Agregar</button>
    </form>
    <a href="index.php">ver contenidos </a>
    <a href="formulario2.php">agregar contenido</a>
</body>
</html>
