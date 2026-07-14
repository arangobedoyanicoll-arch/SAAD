<?php

session_start();

if(!isset($_SESSION['correo'])){
    header("Location: login.php");
    exit();
}

include("conexion.php");

$mensaje="";

$estudiantes=mysqli_query($conn,"SELECT * FROM estudiantes ORDER BY nombre");

if(isset($_POST['guardar'])){

$estudiante=$_POST['estudiante'];

$fecha=$_POST['fecha'];

$hora=$_POST['hora'];

$motivo=$_POST['motivo'];

$estado=$_POST['estado'];

$sql="INSERT INTO citaciones(estudiante_id,fecha,hora,motivo,estado)

VALUES('$estudiante','$fecha','$hora','$motivo','$estado')";

if(mysqli_query($conn,$sql)){

header("Location: citaciones.php");

exit();

}else{

$mensaje="Error al guardar.";

}

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Nueva Citación</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="formulario">

<h2>Nueva Citación</h2>

<form method="POST">

<select name="estudiante" required>

<option value="">Seleccione un estudiante</option>

<?php

while($e=mysqli_fetch_assoc($estudiantes)){

?>

<option value="<?php echo $e['id_estudiante']; ?>">

<?php echo $e['nombre']." ".$e['apellido']; ?>

</option>

<?php } ?>

</select>

<input type="date" name="fecha" required>

<input type="time" name="hora" required>

<textarea
name="motivo"
placeholder="Motivo de la citación"
required
style="width:100%;height:120px;padding:10px;border-radius:8px;"></textarea>

<br><br>

<select name="estado">

<option>Pendiente</option>

<option>Atendida</option>

<option>Cancelada</option>

</select>

<br><br>

<button name="guardar">

Guardar Citación

</button>

</form>

</div>

</body>

</html>