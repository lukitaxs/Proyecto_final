<?php

session_start();

if (!isset($_SESSION["id_usuario"]) || $_SESSION["id_rol"] != 2) {

    header("Location: ../login/login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel Técnico - Covasg</title>

    <link rel="stylesheet" href="css/estilotecnico.css">
    <link rel="icon" href="../img/CovasgLogo.png" type="image/png">

</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="tecnicos.php" data-traducir="inicio">Inicio</a>
        <a href="tickets.php" data-traducir="tickets">Tickets</a>
        <a href="solicitudes.php" data-traducir="solicitudes">Solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion" data-traducir="cerrarSesion">Cerrar sesión</a>

        <select onchange="cambiarIdioma(this.value)">
            <option value="es">Español</option>
            <option value="en">English</option>
        </select>
    </nav>

</header>

<main>

    <div class="bienvenida">

        <h2 data-traducir="panelTecnico">Panel del Técnico</h2>

        <p data-traducir="descripcionPanelTecnico">
            Desde este panel puedes consultar y gestionar
            los tickets y solicitudes del sistema.
        </p>

    </div>

    <div class="tarjetas">

        <a href="tickets.php" class="tarjeta">

            <h3 data-traducir="tickets">Tickets</h3>

            <p data-traducir="descripcionTicketsTecnico">
                Consultar los tickets registrados
                y actualizar su estado.
            </p>

        </a>

        <a href="solicitudes.php" class="tarjeta">

            <h3 data-traducir="solicitudes">Solicitudes</h3>

            <p data-traducir="descripcionSolicitudesTecnico">
                Consultar las solicitudes registradas
                y actualizar su estado.
            </p>

        </a>

    </div>

</main>

<footer>

    <p data-traducir="pieTecnico">© 2026 Covasg - Sistema de Gestión de Soporte</p>

</footer>

<script src="/Proyecto_final/js/traductor.js"></script>

</body>

</html>
