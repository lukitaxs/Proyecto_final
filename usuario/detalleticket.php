<?php

include("../php/conexion.php");

$id_ticket = $_GET["id"];

$consulta = "SELECT * FROM ticket WHERE id_ticket = '$id_ticket'";

$resultado = mysqli_query($conexion, $consulta);

$ticket = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detalle del ticket - Covasg</title>

    <link rel="stylesheet" href="cssusuario/estilodetalleticket.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="usuario.php">Inicio</a>
        <a href="ticket.html">Crear ticket</a>
        <a href="misticket.php">Mis tickets</a>
        <a href="crearsolicitud.html">Solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <h2>Detalle del ticket</h2>

        <p>
            Información del problema registrado.
        </p>

    </section>

    <section class="detalle">

        <h3>
            Ticket #<?php echo $ticket["id_ticket"]; ?>
        </h3>

        <p>
            <strong>Título:</strong>
            <?php echo $ticket["titulo"]; ?>
        </p>

        <p>
            <strong>Descripción:</strong>
            <?php echo $ticket["descripcion"]; ?>
        </p>

        <p>
            <strong>Prioridad:</strong>
            <?php echo $ticket["prioridad"]; ?>
        </p>

        <p>
            <strong>Estado:</strong>
            <?php echo $ticket["estado"]; ?>
        </p>

        <p>
            <strong>Fecha de creación:</strong>
            <?php echo $ticket["fecha_creacion"]; ?>
        </p>

        <a href="misticket.php">Volver a Mis tickets</a>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>