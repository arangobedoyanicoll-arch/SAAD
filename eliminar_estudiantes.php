<?php

include("conexion.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM estudiantes WHERE id_estudiante='$id'");

header("Location: estudiantes.php");

?>