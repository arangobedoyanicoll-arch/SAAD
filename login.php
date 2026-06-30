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
    <title>Login</title>
</head>
<body>

<h2>Inicio de sesión</h2>

<form method="POST">

    Correo:
    <input type="email" name="correo" required>
    <br><br>

    Contraseña:
    <input type="password" name="contrasena" required>
    <br><br>

    <button type="submit">Ingresar</button>

</form>

<p><?php echo $mensaje; ?></p>

</body>
</html>