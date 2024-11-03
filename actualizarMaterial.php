<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $resultado = $conexion->query("SELECT * FROM material WHERE id = $id");
    $material = $resultado->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $materia = $conexion->real_escape_string($_POST['materia']);
    $enlace = $conexion->real_escape_string($_POST['enlace']);

    $conexion->query("UPDATE material SET titulo='$titulo', descripcion='$descripcion', materia='$materia', enlace='$enlace' WHERE id=$id");
    header("Location: materialDidactico.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Material</title>
</head>
<body>
    <h1>Actualizar Material</h1>
    <a href="materialDidactico.php">Volver a Material Didáctico</a>

    <form method="POST" action="actualizarMaterial.php?id=<?php echo $id; ?>">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($material['titulo']); ?>" required><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required><?php echo htmlspecialchars($material['descripcion']); ?></textarea><br>
        
        <label for="materia">Materia:</label>
        <select name="materia" required>
            <option value="matematica" <?php echo ($material['materia'] === 'matematica') ? 'selected' : ''; ?>>Matemática</option>
            <option value="ciencias" <?php echo ($material['materia'] === 'ciencias') ? 'selected' : ''; ?>>Ciencias</option>
            <option value="historia" <?php echo ($material['materia'] === 'historia') ? 'selected' : ''; ?>>Historia</option>
        </select><br>
        
        <label for="enlace">Enlace:</label>
        <input type="url" name="enlace" value="<?php echo htmlspecialchars($material['enlace']); ?>" required><br>
        
        <button type="submit">Actualizar Material</button>
    </form>
</body>
</html>
