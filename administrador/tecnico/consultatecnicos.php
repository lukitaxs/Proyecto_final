<?php

session_start();

if (
    !isset($_SESSION["id_usuario"]) ||
    !isset($_SESSION["id_rol"]) ||
    $_SESSION["id_rol"] != 3
) {
    header("Location: ../../login/login.php");
    exit();
}

include("../../php/conexion.php");

$consulta = "SELECT tecnico.*, usuario.nombre, usuario.estado
             FROM tecnico
             INNER JOIN usuario
             ON tecnico.id_usuario = usuario.id_usuario";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consulta de técnicos - Covasg</title>

    <link rel="stylesheet" href="../css/estilotecnicos.css">
    <link rel="icon" href="../../img/CovasgLogo.png" type="image/png">

</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="../administrador.php">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="../activos/consultaactivos.php">Activos</a>
        <a href="../tickets/consultatickets.php">Tickets</a>
        <a href="../solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="consultatecnicos.php">Técnicos</a>
        <a href="../../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <div>
            <h2>Consulta de técnicos</h2>

            <p>
                Técnicos registrados en el sistema.
            </p>
        </div>

        <a href="altatecnico.php" class="boton">
            Agregar técnico
        </a>

    </section>

    <section class="tabla-contenedor">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Área</th>
                    <th>Especialidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                <?php while ($tecnico = mysqli_fetch_array($resultado)) { ?>

                    <tr>

                        <td>
                            <?php echo $tecnico["id_tecnico"]; ?>
                        </td>

                        <td>
                            <?php echo $tecnico["nombre"]; ?>
                        </td>

                        <td>
                            <?php echo $tecnico["rol"]; ?>
                        </td>

                        <td>
                            <?php echo $tecnico["area"]; ?>
                        </td>

                        <td>
                            <?php echo $tecnico["especialidad"]; ?>
                        </td>

                        <td>
                            <?php echo $tecnico["estado"]; ?>
                        </td>

                        <td>

                            <?php if ($tecnico["estado"] == "Activo") { ?>

                                <a href="modificartecnico.php?id=<?php echo $tecnico["id_tecnico"]; ?>">
                                    Modificar
                                </a>

                                <a href="bajatecnico.php?id=<?php echo $tecnico["id_tecnico"]; ?>">
                                    Dar de baja
                                </a>

                            <?php } else { ?>

                                <form action="../../php/activar_tecnico.php" method="POST">

                                    <input type="hidden" name="id_tecnico" value="<?php echo $tecnico["id_tecnico"]; ?>">

                                    <button type="submit">Activar técnico</button>

                                </form>

                            <?php } ?>

                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>