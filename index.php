<?php
session_start();
include 'db.php';

// Obtener el contenido de la base de datos donde la materia es "matematica"
$resultado = $conexion->query("SELECT * FROM contenido WHERE materia = 'matematica'");

$usuarioLogueado = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contenido Público - Matemática</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <a href="materialDidactico.php">ver material</a>
    <h1>Contenido de Matemática</h1>
    <?php if ($usuarioLogueado): ?>
        <a href="logout.php">Cerrar Sesión</a>
        
    <?php else: ?>
        <a href="login.php">Iniciar Sesión para Administrar Contenido</a>
    <?php endif; ?>
    
    <div class="contenido-lista">
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <div class="contenido-item">
                <h2><?php echo htmlspecialchars($fila['titulo']); ?></h2>
                <p><?php echo htmlspecialchars($fila['contenido']); ?></p>
                <img src="<?php echo htmlspecialchars($fila['img']); ?>" alt="Imagen de <?php echo htmlspecialchars($fila['titulo']); ?>" style="width: 200px; height: auto;">
                
                <?php if ($usuarioLogueado): ?>
                    <!-- Botones para eliminar y actualizar -->
                    <a href="actualizar.php?id=<?php echo $fila['id']; ?>">Actualizar</a>
                    <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este contenido?');">Eliminar</a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
