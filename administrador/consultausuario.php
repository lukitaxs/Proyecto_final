<?php

include("../php/conexion.php");

$consulta = "SELECT usuario.id_usuario,
                    usuario.nombre,
                    usuario.correo,
                    rol.nombre AS rol
             FROM usuario
             INNER JOIN rol
             ON usuario.id_rol = rol.id_rol";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consultar usuarios - Covasg</title>

    <link rel="stylesheet" href="css/consultausuarios.css">
</head>

<body>

    <header>

        <h1>Covasg</h1>

        <nav>
            <a href="administrador.html">Inicio</a>
            <a href="usuarios.html">Usuarios</a>
            <a href="activos/consultaactivos.php">Activos</a>
            <a href="tickets/consultatickets.php">Tickets</a>
            <a href="solicitudes/consultasolicitudes.php">Solicitudes</a>
            <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
        </nav>

    </header>

    <main>

        <section class="titulo">

            <div>

                <h2>Consulta de usuarios</h2>

                <p>
                    Usuarios registrados en el sistema.
                </p>

            </div>

        </section>

        <section class="tabla-contenedor">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    while ($usuario = mysqli_fetch_array($resultado)) {

                    ?>

                        <tr>

                            <td>
                                <?php echo $usuario["id_usuario"]; ?>
                            </td>

                            <td>
                                <?php echo $usuario["nombre"]; ?>
                            </td>

                            <td>
                                <?php echo $usuario["correo"]; ?>
                            </td>

                            <td>
                                <?php echo $usuario["rol"]; ?>
                            </td>

                            <td>

                                <a href="modificarusuario.php?id=<?php echo $usuario["id_usuario"]; ?>">
                                    Modificar
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