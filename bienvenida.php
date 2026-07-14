<?php
session_start();

if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");

$correo = $_SESSION['correo'];

$sqlUsuario = mysqli_query($conn, "SELECT * FROM usuario WHERE correo='$correo'");

$usuario = mysqli_fetch_assoc($sqlUsuario);

$nombreUsuario = $usuario['nombre'];

$totalUsuarios= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM usuario"));

$totalEstudiantes= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM estudiantes"));

$totalCitaciones = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM citaciones"));

$totalPendientes = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM citaciones WHERE estado='Pendiente'")
);
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Panel Principal | SAAD</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>

<div class="sidebar">

<img src="img/logo.png" class="logo">



<a href="bienvenida.php">🏠 Inicio</a>

<a href="usuarios.php">👤 Usuarios</a>

<a href="estudiantes.php">🎓 Estudiantes</a>

<a href="padres.php">👨‍👩‍👧 Padres</a>

<a href="docentes.php">👩‍🏫 Docentes</a>

<a href="citaciones.php">📅 Citaciones</a>

<a href="reportes.php">📊 Reportes</a>

<a href="logout.php">🚪 Cerrar sesión</a>

</div>

<section class="hero contenido">

<div class="panel">

<h2>¡Bienvenido, <?php echo $nombreUsuario; ?>!</h2>

<p>Sistema de Atención Académica Digital</p>
<p>

<?php

date_default_timezone_set("America/Bogota");

echo "Fecha: ".date("d/m/Y");

?>

<br>

<?php

echo "Hora: ".date("h:i A");

?>

</p>
<p>Has iniciado sesión correctamente.</p>

<div class="cards">

    <div class="card-dashboard">

        <h2>👤</h2>
        <h3>Usuarios</h3>
        <p><?php echo $totalUsuarios; ?> registrados</p>
        <a href="usuarios.php" class="boton">Entrar</a>

    </div>

    <div class="card-dashboard">

        <h2>🎓</h2>
        <h3>Estudiantes</h3>
        <h1><?php echo $totalEstudiantes; ?></h1>
        <p>Estudiantes registrados</p>
        <a href="estudiantes.php" class="boton">Administrar</a>

    </div>

    <div class="card-dashboard">

        <h2>➕</h2>
        <h3>Registrar Usuario</h3>
        <p>Crear un nuevo usuario</p>
        <a href="registro.php" class="boton">Registrar</a>

    </div>

    <div class="card-dashboard">

        <h2>📅</h2>
        <h3>Citaciones</h3>
        <h1><?php echo $totalCitaciones; ?></h1>
        <p>Total registradas</p>
        <a href="citaciones.php" class="boton">Administrar</a>

    </div>

    <div class="card-dashboard">

        <h2>⏳</h2>
        <h3>Pendientes</h3>
        <h1><?php echo $totalPendientes; ?></h1>
        <p>Por atender</p>
        <a href="citaciones.php" class="boton">Ver</a>

    </div>

    <div class="card-dashboard">

        <h2>📊</h2>
        <h3>Reportes</h3>
        <p>Generar estadísticas</p>
        <a href="reportes.php" class="boton">Entrar</a>

    </div>

</div>

<div class="dashboard-inferior">

    <div class="panel-lista">

        <h2>📋 Últimos estudiantes</h2>

        <table>

            <tr>
                <th>Nombre</th>
                <th>Grado</th>
            </tr>

            <?php

            $consulta = mysqli_query($conn,"SELECT nombre, grado FROM estudiantes ORDER BY id_estudiante DESC LIMIT 5");

            while($fila=mysqli_fetch_assoc($consulta)){

            ?>

            <tr>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['grado']; ?></td>
            </tr>

            <?php } ?>

        </table>

    </div>

    <div class="panel-acciones">

        <h2>⚡ Accesos rápidos</h2>

        <a href="registrar_estudiante.php" class="boton">➕ Nuevo estudiante</a>

        <a href="padres.php" class="boton">👨‍👩‍👧 Nuevo acudiente</a>

        <a href="registrar_citaciones.php" class="boton">📅 Nueva citación</a>

        <a href="usuarios.php" class="boton">👤 Usuarios</a>

    </div>

</div>

</div>
</section>

<footer>

SAAD 2026 © Todos los derechos reservados

</footer>

</body>

</html>