<?php

session_start();

// Verificar que haya iniciado sesión como administrador
if (
    !isset($_SESSION["id_usuario"]) ||
    !isset($_SESSION["id_rol"]) ||
    $_SESSION["id_rol"] != 3
) {
    header("Location: ../../login/login.php");
    exit();
}

include("../../php/conexion.php");

$consulta = "SELECT * FROM activo_tecnologico";
$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consulta de activos - Covasg</title>

    <link rel="stylesheet" href="../css/consultausuarios.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="../administrador.php">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="consultaactivos.php">Activos</a>
        <a href="../tickets/consultatickets.php">Tickets</a>
        <a href="../solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="../../php/cerrarsesion.php" class="cerrar-sesion">
            Cerrar sesión
        </a>
    </nav>

</header>

<main>

    <section class="titulo">

        <div class="icono">
            💻
        </div>

        <div>
            <h2>Consulta de activos</h2>

            <p>
                Activos tecnológicos registrados en el sistema.
            </p>
        </div>

    </section>

    <section class="tabla-contenedor">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Código</th>
                    <th>Estado</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                <?php

                while ($activo = mysqli_fetch_array($resultado)) {

                ?>

                    <tr>

                        <td>
                            <?php echo $activo["id_activo"]; ?>
                        </td>

                        <td>
                            <?php echo $activo["tipo_dispositivo"]; ?>
                        </td>

                        <td>
                            <?php echo $activo["marca"]; ?>
                        </td>

                        <td>
                            <?php echo $activo["modelo"]; ?>
                        </td>

                        <td>
                            <?php echo $activo["codigo_inventario"]; ?>
                        </td>

                        <td>
                            <?php echo $activo["estado_actual"]; ?>
                        </td>

                        <td>
                            <?php echo $activo["ubicacion_fisica"]; ?>
                        </td>

                        <td>

                            <a href="asignaractivo.php?id=<?php echo $activo["id_activo"]; ?>">
                                Asignar usuario
                            </a>

                            |

                            <a href="modificaractivo.php?id=<?php echo $activo["id_activo"]; ?>">
                                Modificar
                            </a>

                            |

                            <a href="bajaactivos.php?id=<?php echo $activo["id_activo"]; ?>">
                                Eliminar
                            </a>

                        </td>

                    </tr>

                <?php

                }

                ?>

            </tbody>

        </table>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>