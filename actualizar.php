<?php
session_start();
include 'db.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Obtener el ID del contenido a actualizar
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $resultado = $conexion->query("SELECT * FROM contenido WHERE id = $id");
    $contenido = $resultado->fetch_assoc();
}

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $contenidoTexto = $conexion->real_escape_string($_POST['contenido']);
    $img = $conexion->real_escape_string($_POST['img']);
    $materia = $conexion->real_escape_string($_POST['materia']);

    // Actualizar el contenido en la base de datos
    $conexion->query("UPDATE contenido SET titulo='$titulo', contenido='$contenidoTexto', img='$img', materia='$materia' WHERE id=$id");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Contenido</title>
</head>
<body>
    <h1>Actualizar Contenido</h1>
    <a href="index.php">Volver al Inicio</a>

    <form method="POST" action="actualizar.php?id=<?php echo $id; ?>">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($contenido['titulo']); ?>" required>
        <br>
        <label for="contenido">Contenido:</label>
        <textarea name="contenido" required><?php echo htmlspecialchars($contenido['contenido']); ?></textarea>
        <br>
        <label for="img">URL de la Imagen:</label>
        <input type="text" name="img" value="<?php echo htmlspecialchars($contenido['img']); ?>" required>
        <br>
        <label for="materia">Materia:</label>
        <select name="materia" required>
            <option value="matematica" <?php echo ($contenido['materia'] === 'matematica') ? 'selected' : ''; ?>>Matemática</option>
            <option value="ciencias" <?php echo ($contenido['materia'] === 'ciencias') ? 'selected' : ''; ?>>Ciencias</option>
            <option value="historia" <?php echo ($contenido['materia'] === 'historia') ? 'selected' : ''; ?>>Historia</option>
        </select>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
