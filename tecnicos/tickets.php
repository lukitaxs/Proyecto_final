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
        <a href="tecnicos.html">Inicio</a>
        <a href="tickets.php">Tickets</a>
        <a href="solicitudes.php">Solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <div class="bienvenida">

        <h2>Tickets</h2>

        <p>
            Consulta los tickets registrados en el sistema.
        </p>

    </div>

    <div class="tabla-contenedor">

        <table>

            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Título</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>

            <?php while ($ticket = mysqli_fetch_array($resultado)) { ?>

                <tr>

                    <td><?php echo $ticket["id_ticket"]; ?></td>

                    <td><?php echo $ticket["nombre"]; ?></td>

                    <td><?php echo $ticket["titulo"]; ?></td>

                    <td><?php echo $ticket["prioridad"]; ?></td>

                    <td><?php echo $ticket["estado"]; ?></td>

                    <td>
                        <a href="detalleticket.php?id=<?php echo $ticket["id_ticket"]; ?>">
                            Ver
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </table>

    </div>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de Gestión de Soporte</p>
</footer>

</body>

</html>