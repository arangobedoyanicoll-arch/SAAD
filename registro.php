<?php
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    // Verificar si el correo ya existe
    $consulta = "SELECT * FROM usuario WHERE correo='$correo'";
    $resultado = mysqli_query($conn, $consulta);

    if(mysqli_num_rows($resultado) > 0){

        $mensaje = "❌ El correo ya está registrado.";

    } else {

        $sql = "INSERT INTO usuario(nombre, correo, contrasena, rol)
                VALUES ('$nombre', '$correo', '$contrasena', '$rol')";

        if(mysqli_query($conn, $sql)){
            $mensaje = "✅ Usuario registrado correctamente.";
        } else {
            $mensaje = "❌ Error al registrar el usuario.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
</head>
<body>

<div class="login-container">

    <img src="img/logo.png" class="logo">

    <h2>Registro de Usuarios</h2>

    <form method="POST">

        <input type="text" name="nombre" placeholder="Nombre completo" required>

        <input type="email" name="correo" placeholder="Correo electrónico" required>

        <input type="password" name="contrasena" placeholder="Contraseña" required>

        <select name="rol" required>
    <option value="" selected disabled>Selecciona un rol</option>
    <option value="Padre">👨‍👩‍👧 Padre</option>
    <option value="Docente">👩‍🏫 Docente</option>
    <option value="Administrador">🛡️ Administrador</option>
</select>

        <button type="submit">Registrarse</button>

    </form>

    <p><?php echo $mensaje; ?></p>

</div>

</body>
</html>