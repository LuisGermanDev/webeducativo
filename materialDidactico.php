<?php
session_start();
include 'db.php';

$materiales = $conexion->query("SELECT * FROM material");
$usuarioLogueado = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Material Didáctico</title>
</head>
<body>
    <h1>Material Didáctico</h1>
    <?php if ($usuarioLogueado): ?>
        <a href="formulario2.php">Agregar Nuevo Material</a>
        <a href="logout.php">Cerrar Sesión</a>
    <?php else: ?>
        <a href="login.php">Iniciar Sesión</a>
    <?php endif; ?>
    
    <div class="material-lista">
        <?php while ($fila = $materiales->fetch_assoc()): ?>
            <div class="material-item">
                <h2><?php echo htmlspecialchars($fila['titulo']); ?></h2>
                <p><?php echo htmlspecialchars($fila['descripcion']); ?></p>
                <p><strong>Materia:</strong> <?php echo htmlspecialchars($fila['materia']); ?></p>
                <a href="<?php echo htmlspecialchars($fila['enlace']); ?>" target="_blank">Ver Material</a>
                
                <?php if ($usuarioLogueado): ?>
                    <a href="actualizarMaterial.php?id=<?php echo $fila['id']; ?>">Editar</a>
                    <a href="eliminarMaterial.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este material?');">Eliminar</a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
