<?php

$host = "127.0.0.1:3307";
$usuario = "root";
$contrasena = "";
$basedatos = "saad";

$conn = mysqli_connect($host, $usuario, $contrasena, $basedatos);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>