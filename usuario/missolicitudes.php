<?php

session_start();

include("../php/conexion.php");

$id_usuario = $_SESSION["id_usuario"];

$consulta = "SELECT * FROM solicitud
             WHERE id_usuario = '$id_usuario'
             ORDER BY fecha_creacion DESC";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis solicitudes - Covasg</title>

    <link rel="stylesheet" href="cssusuario/estilomissolicitudes.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="usuario.php">Inicio</a>
        <a href="ticket.html">Crear ticket</a>
        <a href="misticket.php">Mis tickets</a>
        <a href="crearsolicitud.html">Crear solicitud</a>
        <a href="missolicitudes.php">Mis solicitudes</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>

    </nav>

</header>

<main>

    <section class="titulo">

        <h2>Mis solicitudes</h2>

        <p>
            Consulte las solicitudes de servicio que ha realizado.
        </p>

    </section>

    <section class="tabla">

        <div class="tabla-contenedor">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Solicitud</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>

                </thead>

                <tbody>

                    <?php while ($solicitud = mysqli_fetch_array($resultado)) { ?>

                        <tr>

                            <td>
                                <?php echo $solicitud["id_solicitud"]; ?>
                            </td>

                            <td>
                                <?php echo $solicitud["titulo"]; ?>
                            </td>

                            <td>
                                <?php echo $solicitud["fecha_creacion"]; ?>
                            </td>

                            <td>
                                <?php echo $solicitud["estado"]; ?>
                            </td>

                            <td>
                                <a href="detallesolicitud.php?id=<?php echo $solicitud["id_solicitud"]; ?>"
                                   class="boton-ver">
                                    Ver
                                </a>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>