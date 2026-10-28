<?php

include("../php/conexion.php");

$id_ticket = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nuevo_estado = $_POST["estado"];

    if ($nuevo_estado == "Cerrado") {

        $actualizar = "UPDATE ticket
                       SET estado = '$nuevo_estado',
                       fecha_clierre = NOW()
                       WHERE id_ticket = '$id_ticket'";

    } else {

        $actualizar = "UPDATE ticket
                       SET estado = '$nuevo_estado',
                       fecha_clierre = NULL
                       WHERE id_ticket = '$id_ticket'";
    }

    mysqli_query($conexion, $actualizar);
}

$consulta = "SELECT ticket.*, usuario.nombre
             FROM ticket
             INNER JOIN usuario
             ON ticket.id_usuario = usuario.id_usuario
             WHERE ticket.id_ticket = '$id_ticket'";

$resultado = mysqli_query($conexion, $consulta);

$ticket = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title data-traducir="detalleTicket">Detalle del ticket - Covasg</title>

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
        <h2 data-traducir="detalleTicket">Detalle del ticket</h2>
        <p data-traducir="informacionTicket">Información del ticket seleccionado.</p>
    </div>

    <div class="tabla-contenedor">

        <h3>
            <span data-traducir="ticket">Ticket</span>
            #<?php echo $ticket["id_ticket"]; ?>
        </h3>

        <p>
            <strong data-traducir="usuario">Usuario:</strong>
            <?php echo $ticket["nombre"]; ?>
        </p>

        <p>
            <strong data-traducir="titulo">Título:</strong>
            <?php echo $ticket["titulo"]; ?>
        </p>

        <p>
            <strong data-traducir="descripcion">Descripción:</strong>
            <?php echo $ticket["descripcion"]; ?>
        </p>

        <p>
            <strong data-traducir="prioridad">Prioridad:</strong>
            <?php echo $ticket["prioridad"]; ?>
        </p>

        <p>
            <strong data-traducir="estado">Estado:</strong>
            <?php echo $ticket["estado"]; ?>
        </p>

        <p>
            <strong data-traducir="fechaCreacion">Fecha de creación:</strong>
            <?php echo $ticket["fecha_creacion"]; ?>
        </p>

        <p>
            <strong data-traducir="fechaCierre">Fecha de cierre:</strong>
            <?php echo $ticket["fecha_clierre"]; ?>
        </p>

        <br>

        <h3 data-traducir="cambiarEstado">Cambiar estado</h3>

        <form method="POST">

            <label data-traducir="nuevoEstado">Nuevo estado:</label>

            <select name="estado" required>
                <option value="Abierto" data-traducir="abierto">Abierto</option>
                <option value="En proceso" data-traducir="enProceso">En proceso</option>
                <option value="Cerrado" data-traducir="cerrado">Cerrado</option>
            </select>

            <button type="submit" data-traducir="guardarEstado">Guardar estado</button>

        </form>

        <br>

        <a href="tickets.php" data-traducir="volverTickets">Volver a tickets</a>

    </div>

</main>

<footer>
    <p data-traducir="pieTecnico">© 2026 Covasg - Sistema de Gestión de Soporte</p>
</footer>

<script src="/Proyecto_final/js/traductor.js"></script>

</body>

</html>
