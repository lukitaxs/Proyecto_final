<?php

include("../php/conexion.php");

$consulta = "SELECT solicitud.*, usuario.nombre
             FROM solicitud
             INNER JOIN usuario
             ON solicitud.id_usuario = usuario.id_usuario";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Solicitudes - Covasg</title>

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

        <h2>Solicitudes</h2>

        <p>Consulta las solicitudes registradas en el sistema.</p>

    </div>

    <div class="tabla-contenedor">

        <table>

            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>

            <?php while ($solicitud = mysqli_fetch_array($resultado)) { ?>

                <tr>

                    <td><?php echo $solicitud["id_solicitud"]; ?></td>

                    <td><?php echo $solicitud["nombre"]; ?></td>

                    <td><?php echo $solicitud["titulo"]; ?></td>

                    <td><?php echo $solicitud["tipo"]; ?></td>

                    <td><?php echo $solicitud["prioridad"]; ?></td>

                    <td><?php echo $solicitud["estado"]; ?></td>

                    <td>
                        <a href="detallesolicitud.php?id=<?php echo $solicitud["id_solicitud"]; ?>">
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