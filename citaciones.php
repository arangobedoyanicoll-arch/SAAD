<?php
session_start();

if(!isset($_SESSION['correo'])){
    header("Location: login.php");
    exit();
}

include("conexion.php");

$sql = "SELECT c.*, e.nombre, e.apellido
        FROM citaciones c
        INNER JOIN estudiantes e
        ON c.estudiante_id = e.id_estudiante
        ORDER BY c.fecha ASC";

$resultado = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Citaciones | SAAD</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<header>

<h1>SAAD</h1>

<nav>

<a href="bienvenida.php">🏠 Inicio</a>

<a href="estudiantes.php">🎓 Estudiantes</a>

<a href="citaciones.php">📅 Citaciones</a>

<a href="logout.php">🚪 Salir</a>

</nav>

</header>

<div class="panel">

<h2>Gestión de Citaciones</h2>

<br>

<a href="registrar_citacion.php" class="boton">

➕ Nueva Citación

</a>

<br><br>

<table class="tabla">

<tr>

<th>Estudiante</th>

<th>Fecha</th>

<th>Hora</th>

<th>Motivo</th>

<th>Estado</th>

<th>Acciones</th>

</tr>

<?php

while($fila=mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?php echo $fila['nombre']." ".$fila['apellido']; ?></td>

<td><?php echo $fila['fecha']; ?></td>

<td><?php echo $fila['hora']; ?></td>

<td><?php echo $fila['motivo']; ?></td>

<td><?php echo $fila['estado']; ?></td>

<td>

Editar |

Eliminar

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>