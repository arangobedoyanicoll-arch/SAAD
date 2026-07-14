<?php
session_start();

if(!isset($_SESSION['correo'])){
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_GET['id'];

$sql = mysqli_query($conn,"SELECT * FROM estudiantes WHERE id_estudiante='$id'");

$estudiante = mysqli_fetch_assoc($sql);

if(isset($_POST['actualizar'])){

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $grado=$_POST['grado'];
    $grupo=$_POST['grupo'];
    $estado=$_POST['estado'];

    mysqli_query($conn,"UPDATE estudiantes SET
    nombre='$nombre',
    apellido='$apellido',
    grado='$grado',
    grupo='$grupo',
    estado_academico='$estado'
    WHERE id_estudiante='$id'");

    header("Location: estudiantes.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Editar Estudiante</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="formulario">

<h2>Editar Estudiante</h2>

<form method="POST">

<input type="text" name="nombre" value="<?php echo $estudiante['nombre']; ?>" required>

<input type="text" name="apellido" value="<?php echo $estudiante['apellido']; ?>" required>

<input type="number" name="grado" value="<?php echo $estudiante['grado']; ?>" required>

<input type="text" name="grupo" value="<?php echo $estudiante['grupo']; ?>" required>

<select name="estado">

<option <?php if($estudiante['estado_academico']=="Excelente") echo "selected"; ?>>Excelente</option>

<option <?php if($estudiante['estado_academico']=="Bueno") echo "selected"; ?>>Bueno</option>

<option <?php if($estudiante['estado_academico']=="Regular") echo "selected"; ?>>Regular</option>

<option <?php if($estudiante['estado_academico']=="Bajo") echo "selected"; ?>>Bajo</option>

</select>

<button name="actualizar">

Actualizar

</button>

</form>

</div>

</body>

</html>