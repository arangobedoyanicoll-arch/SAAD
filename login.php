<?php
session_start();
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuario
            WHERE correo='$correo'
            AND contrasena='$contrasena'";

    $resultado = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado)>0){

        $_SESSION['correo']=$correo;

        header("Location: bienvenida.php");
        exit();

    }else{

        $mensaje="Correo o contraseña incorrectos.";

    }

}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Iniciar Sesión</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="formulario">

<h2>Iniciar Sesión</h2>

<form method="POST">

<input
type="email"
name="correo"
placeholder="Correo electrónico"
required>

<input
type="password"
name="contrasena"
placeholder="Contraseña"
required>

<button type="submit">

Ingresar

</button>

</form>

<p style="color:red;text-align:center;">
<?php echo $mensaje; ?>
</p>

</div>

</body>

</html>