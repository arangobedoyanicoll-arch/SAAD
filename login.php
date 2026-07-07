<?php
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuario 
            WHERE correo='$correo' 
            AND contrasena='$contrasena'";

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $mensaje = "Inicio de sesión correcto";
    } else {
        $mensaje = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-container">

    <img src="img/logo.png" alt="Logo SAAD" class="logo">

    <h2>Inicio de sesión</h2>

    <form method="POST">

        <input type="email" name="correo" placeholder="Correo electrónico" required>

        <input type="password" name="contrasena" placeholder="Contraseña" required>

        <button type="submit">Ingresar</button>

    </form>

    <p><?php echo $mensaje; ?></p>

</div>

</body>
</html>