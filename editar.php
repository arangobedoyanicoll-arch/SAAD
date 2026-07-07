<?php

include("conexion.php");

$id=$_GET['id'];

if(isset($_POST['actualizar']))
{

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
$rol=$_POST['rol'];

$sql="UPDATE usuario SET

nombre='$nombre',
correo='$correo',
contrasena='$contrasena',
rol='$rol'

WHERE id_usuario=$id";

mysqli_query($conn,$sql);

header("Location: usuarios.php");

}

$sql="SELECT * FROM usuario WHERE id_usuario=$id";

$resultado=mysqli_query($conn,$sql);

$fila=mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>

<html>

<head>

<title>Editar</title>

</head>

<body>

<h2>Editar Usuario</h2>

<form method="POST">

Nombre

<input
type="text"
name="nombre"
value="<?php echo $fila['nombre'];?>">

<br><br>

Correo

<input
type="email"
name="correo"
value="<?php echo $fila['correo'];?>">

<br><br>

Contraseña

<input
type="text"
name="contrasena"
value="<?php echo $fila['contrasena'];?>">

<br><br>

Rol

<select name="rol">

<option><?php echo $fila['rol'];?></option>

<option>Docente</option>

<option>Padre</option>

<option>Coordinador</option>

</select>

<br><br>

<input
type="submit"
name="actualizar"
value="Actualizar">

</form>

</body>

</html>