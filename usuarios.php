<?php
include("conexion.php");

$sql = "SELECT * FROM usuario";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Usuarios - SAAD</title>
<link rel="stylesheet" href="css/estilos.css">

<style>

table{
    width:90%;
    margin:auto;
    border-collapse:collapse;
    background:white;
    box-shadow:0px 0px 10px rgba(0,0,0,.2);
}

th{
    background:#0F1F3D;
    color:white;
    padding:15px;
}

td{
    padding:12px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

h1{
    text-align:center;
    color:#0F1F3D;
    margin-top:30px;
}

.boton{
    background:#0F1F3D;
    color:white;
    padding:8px 15px;
    border-radius:6px;
    text-decoration:none;
}

.boton2{
    background:#d9534f;
    color:white;
    padding:8px 15px;
    border-radius:6px;
    text-decoration:none;
}

.logo{
    display:block;
    margin:auto;
    width:180px;
    margin-top:20px;
}

</style>

</head>

<body>

<img src="img/logo.png" class="logo">

<h1>Sistema de Atención Académica Digital</h1>

<h2 style="text-align:center;">Lista de Usuarios</h2>

<table>

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Correo</th>

<th>Rol</th>

<th>Editar</th>

<th>Eliminar</th>

</tr>

<?php

while($fila=mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?php echo $fila['id_usuario']; ?></td>

<td><?php echo $fila['nombre']; ?></td>

<td><?php echo $fila['correo']; ?></td>

<td><?php echo $fila['rol']; ?></td>

<td>

<a class="boton" href="editar.php?id=<?php echo $fila['id_usuario']; ?>">

Editar

</a>

</td>

<td>

<a class="boton2"

onclick="return confirm('¿Desea eliminar este usuario?')"

href="eliminar.php?id=<?php echo $fila['id_usuario']; ?>">

Eliminar

</a>

</td>

</tr>

<?php

}

?>

</table>

<br>

<center>

<a class="boton" href="bienvenida.php">

Volver

</a>

</center>

</body>

</html>