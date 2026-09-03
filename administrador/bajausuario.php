<?php

include("../php/conexion.php");

$consulta = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Baja de usuario - Covasg</title>

    <link rel="stylesheet" href="css/altausuario.css">
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

            <div class="icono">
                ➖
            </div>

            <div>

                <h2>Baja de usuario</h2>

                <p>
                    Seleccione el usuario que desea eliminar
                    del sistema.
                </p>

            </div>

        </section>

        <?php

        if (isset($_GET["mensaje"])) {

            if ($_GET["mensaje"] == "ok") {

        ?>

                <div class="mensaje correcto">
                    Usuario eliminado correctamente.
                </div>

        <?php

            } elseif ($_GET["mensaje"] == "error") {

        ?>

                <div class="mensaje error">
                    No se pudo eliminar el usuario.
                </div>

        <?php

            } elseif ($_GET["mensaje"] == "noexiste") {

        ?>

                <div class="mensaje error">
                    El usuario no existe.
                </div>

        <?php

            }

        }

        ?>

        <section class="formulario-contenedor">

            <h3>Seleccionar usuario</h3>

            <form action="../php/baja_usuario.php" method="POST">

                <div class="campo">

                    <label for="id_usuario">
                        Usuario
                    </label>

                    <select
                        id="id_usuario"
                        name="id_usuario"
                        required
                    >

                        <option value="">
                            Seleccione un usuario
                        </option>

                        <?php

                        while ($usuario = mysqli_fetch_array($resultado)) {

                        ?>

                            <option value="<?php echo $usuario["id_usuario"]; ?>">

                                <?php
                                echo $usuario["nombre"] .
                                " - " .
                                $usuario["correo"];
                                ?>

                            </option>

                        <?php

                        }

                        ?>

                    </select>

                </div>

                <div class="informacion-rol">

                    <strong>Importante:</strong>

                    <p>
                        Al eliminar un usuario, sus datos dejarán
                        de estar disponibles en el sistema.
                    </p>

                </div>

                <div class="botones">

                    <a
                        href="usuarios.html"
                        class="boton cancelar"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="boton guardar"
                    >
                        Eliminar usuario
                    </button>

                </div>

            </form>

        </section>

    </main>

    <footer>
        <p>© 2026 Covasg - Sistema de soporte informático.</p>
    </footer>

</body>

</html>