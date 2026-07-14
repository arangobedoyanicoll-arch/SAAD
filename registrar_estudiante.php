<?php
session_start();

if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$mensaje = "";

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $grado = $_POST['grado'];
    $grupo = $_POST['grupo'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO estudiantes(nombre,apellido,grado,grupo,estado_academico)
            VALUES('$nombre','$apellido','$grado','$grupo','$estado')";

    if(mysqli_query($conn,$sql)){
        $mensaje = "✅ Estudiante registrado correctamente.";
    }else{
        $mensaje = "❌ Error al registrar el estudiante.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Registrar Estudiante</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<header>

<h1>SAAD</h1>

<nav>

<a href="bienvenida.php">🏠 Inicio</a>

<a href="estudiantes.php">🎓 Estudiantes</a>

<a href="logout.php">🚪 Salir</a>

</nav>

</header>

<div class="formulario">

<h2>Registrar Estudiante</h2>

<form method="POST">

<input type="text" name="nombre" placeholder="Nombre" required>

<input type="text" name="apellido" placeholder="Apellido" required>

<input type="number" name="grado" placeholder="Grado" required>

<input type="text" name="grupo" placeholder="Grupo" required>

<select name="estado">

<option>Excelente</option>

<option>Bueno</option>

<option>Regular</option>

<option>Bajo</option>

</select>

<button type="submit" name="guardar">

Guardar Estudiante

</button>

</form>

<br>

<p style="text-align:center;color:green;">

<?php echo $mensaje; ?>

</p>

</div>

</body>

</html>