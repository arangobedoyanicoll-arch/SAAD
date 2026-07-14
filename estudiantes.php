<?php
session_start();

if(!isset($_SESSION['correo'])){
    header("Location:login.php");
    exit();
}

include("conexion.php");

$sql="SELECT * FROM estudiantes";

$resultado=mysqli_query($conn,$sql);

$total=mysqli_num_rows($resultado);

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Estudiantes | SAAD</title>

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


<div class="panel">

<h2>Gestión de Estudiantes</h2>

<p>Total de estudiantes registrados: <b><?php echo $total; ?></b></p>

<br>

<a href="registrar_estudiante.php" class="boton">

➕ Registrar Estudiante

</a>

<br><br>

<div style="margin:20px 0; display:flex; justify-content:space-between; align-items:center;">

    <h2>Lista de Estudiantes</h2>

    <input type="text" id="buscar"
    placeholder="🔍 Buscar estudiante..."
    style="padding:10px; width:300px; border-radius:8px; border:1px solid #ccc;">

</div>

<table class="tabla" id="tablaEstudiantes" width="100%" cellpadding="10">

<thead>

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Apellido</th>

<th>Grado</th>

<th>Grupo</th>

<th>Estado</th>

<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php

while($fila=mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?php echo $fila['id_estudiante']; ?></td>

<td><?php echo $fila['nombre']; ?></td>

<td><?php echo $fila['apellido']; ?></td>

<td><?php echo $fila['grado']; ?></td>

<td><?php echo $fila['grupo']; ?></td>

<td>

<?php

$estado = $fila['estado_academico'];

if($estado=="Excelente"){

echo "<span class='excelente'>$estado</span>";

}elseif($estado=="Bueno"){

echo "<span class='bueno'>$estado</span>";

}elseif($estado=="Regular"){

echo "<span class='regular'>$estado</span>";

}else{

echo "<span class='bajo'>$estado</span>";

}

?>

</td>

<td>

<a class="editar"
href="editar_estudiante.php?id=<?php echo $fila['id_estudiante']; ?>">

✏ Editar

</a>

|

<a class="eliminar"

onclick="return confirm('¿Desea eliminar este estudiante?')"

href="eliminar_estudiante.php?id=<?php echo $fila['id_estudiante']; ?>">

🗑 Eliminar

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<script>

const buscar = document.getElementById("buscar");

buscar.addEventListener("keyup", function(){

let filtro = buscar.value.toLowerCase();

let filas = document.querySelectorAll("#tablaEstudiantes tbody tr");

filas.forEach(function(fila){

let texto = fila.innerText.toLowerCase();

if(texto.includes(filtro)){

fila.style.display="";

}else{

fila.style.display="none";

}

});

});

</script>

</body>

</html>