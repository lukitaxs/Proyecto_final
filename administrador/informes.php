<?php

include("../php/conexion.php");

$consulta = "SELECT COUNT(*) AS total FROM usuario";
$resultado = mysqli_query($conexion, $consulta);
$usuarios = mysqli_fetch_array($resultado);

$consulta = "SELECT COUNT(*) AS total FROM tecnico";
$resultado = mysqli_query($conexion, $consulta);
$tecnicos = mysqli_fetch_array($resultado);

$consulta = "SELECT COUNT(*) AS total FROM activo_tecnologico";
$resultado = mysqli_query($conexion, $consulta);
$activos = mysqli_fetch_array($resultado);

$consulta = "SELECT COUNT(*) AS total FROM ticket";
$resultado = mysqli_query($conexion, $consulta);
$tickets = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Informes - Covasg</title>
    <link rel="stylesheet" href="css/estiloinformes.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="administrador.php">Inicio</a>
        <a href="usuarios.html">Usuarios</a>
        <a href="activos/consultaactivos.php">Activos</a>
        <a href="tickets/consultatickets.php">Tickets</a>
        <a href="solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="tecnico/consultatecnicos.php">Técnicos</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <div class="titulo">
        <h2>Informes</h2>
        <p>Resumen general del sistema.</p>
    </div>

    <div class="informes">

        <div class="tarjeta">
            <h3>Usuarios</h3>
            <p><?php echo $usuarios["total"]; ?></p>
        </div>

        <div class="tarjeta">
            <h3>Técnicos</h3>
            <p><?php echo $tecnicos["total"]; ?></p>
        </div>

        <div class="tarjeta">
            <h3>Activos</h3>
            <p><?php echo $activos["total"]; ?></p>
        </div>

        <div class="tarjeta">
            <h3>Tickets</h3>
            <p><?php echo $tickets["total"]; ?></p>
        </div>

    </div>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de Gestión de Soporte</p>
</footer>

</body>
</html>