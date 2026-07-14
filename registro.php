<?php
include("conexion.php");

$mensaje="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
$rol=$_POST['rol'];

$consulta="SELECT * FROM usuario WHERE correo='$correo'";

$resultado=mysqli_query($conn,$consulta);

if(mysqli_num_rows($resultado)>0){

$mensaje="El correo ya está registrado.";

}else{

$sql="INSERT INTO usuario(nombre,correo,contrasena,rol)

VALUES('$nombre','$correo','$contrasena','$rol')";

if(mysqli_query($conn,$sql)){

$mensaje="Usuario registrado correctamente.";

}else{

$mensaje="Error al registrar.";

}

}

}
?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Registro</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="formulario">

<h2>Registro de Usuario</h2>

<form method="POST">

<input
type="text"
name="nombre"
placeholder="Nombre completo"
required>

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

<select name="rol">

<option>Padre</option>

<option>Docente</option>

<option>Coordinador</option>

<option>Rector</option>

</select>

<button type="submit">

Registrar

</button>

</form>

<p style="color:green;text-align:center;">
<?php echo $mensaje; ?>
</p>

</div>

</body>

</html>