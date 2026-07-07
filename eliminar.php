<?php

include("conexion.php");

$id=$_GET['id'];

$sql="DELETE FROM usuario
WHERE id_usuario=$id";

mysqli_query($conn,$sql);

header("Location: usuarios.php");

?>