<?php

include("../../php/conexion.php");

$consulta = "SELECT * FROM activo_tecnologico";
$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Baja de activo - Covasg</title>

    <link rel="stylesheet" href="../css/altausuario.css">
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
        <a href="../../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <div class="icono">
            🗑️
        </div>

        <div>
            <h2>Baja de activo tecnológico</h2>

            <p>
                Seleccione el activo que desea eliminar del sistema.
            </p>
        </div>

    </section>

    <?php

    if (isset($_GET["mensaje"])) {

        if ($_GET["mensaje"] == "ok") {
    ?>

            <div class="mensaje correcto">
                Activo eliminado correctamente.
            </div>

    <?php

        } elseif ($_GET["mensaje"] == "error") {

    ?>

            <div class="mensaje error">
                No se pudo eliminar el activo.
            </div>

    <?php

        }

    }

    ?>

    <section class="formulario-contenedor">

        <h3>Seleccionar activo</h3>

        <form action="../../php/baja_activos.php" method="POST">

            <div class="campo">

                <label for="id_activo">
                    Activo
                </label>

                <select name="id_activo" id="id_activo" required>

                    <option value="">
                        Seleccione un activo
                    </option>

                    <?php

                    while ($activo = mysqli_fetch_array($resultado)) {

                    ?>

                        <option value="<?php echo $activo["id_activo"]; ?>">

                            <?php
                            echo $activo["marca"] . " " .
                                 $activo["modelo"] . " - " .
                                 $activo["codigo_inventario"];
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
                    El activo seleccionado será eliminado del sistema.
                </p>

            </div>

            <div class="botones">

                <a href="consultaactivos.php" class="boton cancelar">
                    Cancelar
                </a>

                <button type="submit" class="boton guardar">
                    Eliminar activo
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