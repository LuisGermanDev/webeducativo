<?php
session_start();

// Credenciales de acceso
$usuario_correcto = "webeducativo";
$contrasena_correcta = "Webeducativo1234$";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Validar credenciales
    if ($usuario === $usuario_correcto && $contrasena === $contrasena_correcta) {
        // Guardar sesión de usuario
        $_SESSION['usuario'] = $usuario;
        header("Location: formulario.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <a href="index.php">Volver a la Página Principal</a>
</body>
</html>
