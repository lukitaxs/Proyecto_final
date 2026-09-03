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
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="tecnicos.php">Inicio</a>
        <a href="tickets.php">Tickets</a>
        <a href="solicitudes.php">Solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <div class="bienvenida">

        <h2>Panel del Técnico</h2>

        <p>
            Desde este panel puedes consultar y gestionar
            los tickets y solicitudes del sistema.
        </p>

    </div>


    <div class="tarjetas">

        <a href="tickets.php" class="tarjeta">

            <h3>Tickets</h3>

            <p>
                Consultar los tickets registrados
                y actualizar su estado.
            </p>

        </a>


        <a href="solicitudes.php" class="tarjeta">

            <h3>Solicitudes</h3>

            <p>
                Consultar las solicitudes registradas
                y actualizar su estado.
            </p>

        </a>

    </div>

</main>


<footer>

    <p>© 2026 Covasg - Sistema de Gestión de Soporte</p>

</footer>

</body>

</html>