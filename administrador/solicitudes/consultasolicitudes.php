<?php

session_start();

// Verificar que haya iniciado sesión como administrador
if (!isset($_SESSION["id_usuario"]) || !isset($_SESSION["id_rol"]) || $_SESSION["id_rol"] != 3) {
    header("Location: ../../login/login.php");
    exit();
}

include("../../php/conexion.php");

$consulta = "SELECT solicitud.*, usuario.nombre
             FROM solicitud
             INNER JOIN usuario
             ON solicitud.id_usuario = usuario.id_usuario
             ORDER BY solicitud.fecha_creacion DESC";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Solicitudes - Covasg</title>

    <link rel="stylesheet" href="../css/consultausuarios.css">
</head>

<body>

<header>

    <h1>Covasg - Administrador</h1>

    <nav>
        <a href="../administrador.php">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="../activos/consultaactivos.php">Activos</a>
        <a href="../tickets/consultatickets.php">Tickets</a>
        <a href="consultasolicitudes.php">Solicitudes</a>
        <a href="../../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <h2>Solicitudes</h2>

        <p>
            Consulte las solicitudes realizadas por los usuarios.
        </p>

    </section>

    <section class="tabla">

        <div class="tabla-contenedor">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Título</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Fecha</th>
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
                                <?php echo $solicitud["nombre"]; ?>
                            </td>

                            <td>
                                <?php echo $solicitud["titulo"]; ?>
                            </td>

                            <td>
                                <?php echo $solicitud["prioridad"]; ?>
                            </td>

                            <td>
                                <?php echo $solicitud["estado"]; ?>
                            </td>

                            <td>
                                <?php echo $solicitud["fecha_creacion"]; ?>
                            </td>

                            <td>
                                <a href="detallessolicitudes.php?id=<?php echo $solicitud["id_solicitud"]; ?>">
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