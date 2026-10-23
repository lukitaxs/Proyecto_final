<?php

include("../php/conexion.php");

$consulta = "SELECT ticket.*, usuario.nombre
             FROM ticket
             INNER JOIN usuario
             ON ticket.id_usuario = usuario.id_usuario";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tickets - Covasg</title>

    <link rel="stylesheet" href="css/estilotecnico.css">
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

        <h2 data-traducir="tickets">Tickets</h2>

        <p data-traducir="descripcionListaTickets">
            Consulta los tickets registrados en el sistema.
        </p>

    </div>

    <div class="tabla-contenedor">

        <table>

            <tr>
                <th data-traducir="id">ID</th>
                <th data-traducir="usuario">Usuario</th>
                <th data-traducir="titulo">Título</th>
                <th data-traducir="prioridad">Prioridad</th>
                <th data-traducir="estado">Estado</th>
                <th data-traducir="accion">Acción</th>
            </tr>

            <?php while ($ticket = mysqli_fetch_array($resultado)) { ?>

                <tr>

                    <td><?php echo $ticket["id_ticket"]; ?></td>

                    <td><?php echo $ticket["nombre"]; ?></td>

                    <td><?php echo $ticket["titulo"]; ?></td>

                    <td><?php echo $ticket["prioridad"]; ?></td>

                    <td><?php echo $ticket["estado"]; ?></td>

                    <td>
                        <a href="detalleticket.php?id=<?php echo $ticket["id_ticket"]; ?>" data-traducir="ver">
                            Ver
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </table>

    </div>

</main>

<footer>
    <p data-traducir="pieTecnico">© 2026 Covasg - Sistema de Gestión de Soporte</p>
</footer>

<script src="/Proyecto_final/js/traductor.js"></script>

</body>

</html>
