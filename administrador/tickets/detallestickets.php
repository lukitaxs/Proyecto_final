<?php

include("../../php/conexion.php");

$id_ticket = $_GET["id"];

/* Cambiar estado del ticket */
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

/* Buscar información del ticket */
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

    <title>Detalle del ticket - Covasg</title>

    <link rel="stylesheet" href="../css/consultausuarios.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="../administrador.php">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="../activos/consultaactivos.php">Activos</a>
        <a href="consultatickets.php">Tickets</a>
        <a href="../solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="../../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <div class="icono">
            🎫
        </div>

        <div>
            <h2>Detalle del ticket</h2>
            <p>Información del ticket seleccionado.</p>
        </div>

    </section>

    <section class="tabla-contenedor">

        <h3>
            Ticket #<?php echo $ticket["id_ticket"]; ?>
        </h3>

        <p>
            <strong>Usuario:</strong>
            <?php echo $ticket["nombre"]; ?>
        </p>

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

        <p>
            <strong>Fecha de cierre:</strong>
            <?php echo $ticket["fecha_clierre"]; ?>
        </p>

        <br>

        <h3>Cambiar estado</h3>

        <form method="POST">

            <label>Nuevo estado:</label>

            <select name="estado" required>

                <option value="Abierto">
                    Abierto
                </option>

                <option value="En proceso">
                    En proceso
                </option>

                <option value="Cerrado">
                    Cerrado
                </option>

            </select>

            <button type="submit">
                Guardar estado
            </button>

        </form>

        <br>

        <a href="consultatickets.php">
            Volver a tickets
        </a>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>