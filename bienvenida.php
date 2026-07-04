<?php
session_start();

if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Bienvenido | SAAD</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<header>

<h1>SAAD</h1>

<nav>

<a href="bienvenida.php">Inicio</a>

<a href="usuarios.php">Usuarios</a>

<a href="registro.php">Registrar</a>

<a href="logout.php">Cerrar sesión</a>

</nav>

</header>

<section class="hero">

<div class="card">

<img src="img/logo.png" width="180">

<h2>Bienvenido al Sistema SAAD</h2>

<p>

Sistema de Atención Académica Digital

<br><br>

Has iniciado sesión correctamente.

</p>

<a href="usuarios.php" class="boton">

Administrar Usuarios

</a>

<a href="registro.php" class="boton">

Registrar Usuario

</a>

</div>

</section>

<footer>

Sistema de Atención Académica Digital © 2026

</footer>

</body>

</html>