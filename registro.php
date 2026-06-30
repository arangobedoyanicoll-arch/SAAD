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
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
</head>
<body>

<h2>Registro de Usuarios</h2>

<form method="POST">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Correo:</label><br>
    <input type="email" name="correo" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="contrasena" required><br><br>

    <label>Rol:</label><br>
    <select name="rol" required>
        <option value="Padre">Padre</option>
        <option value="Administrador">Docente</option>
        <option value="Administrador">Cordinador</option>
         <option value="Administrador">Rector</option>
    </select><br><br>

    <button type="submit">Registrar</button>

</form>

<br>

<?php
if($mensaje != ""){
    echo "<h3>$mensaje</h3>";
}
?>

</body>
</html>