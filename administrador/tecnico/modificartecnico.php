<?php

include("../../php/conexion.php");

$id_tecnico = $_GET["id"];

$consulta = "SELECT * FROM tecnico
             WHERE id_tecnico = '$id_tecnico'";

$resultado = mysqli_query($conexion, $consulta);

$tecnico = mysqli_fetch_array($resultado);


$consultaUsuarios = "SELECT * FROM usuario";

$resultadoUsuarios = mysqli_query($conexion, $consultaUsuarios);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modificar técnico - Covasg</title>

    <link rel="stylesheet" href="../css/estilotecnicos.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="../administrador.html">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="../activos/consultaactivos.php">Activos</a>
        <a href="../tickets/consultatickets.php">Tickets</a>
        <a href="../solicitudes/consultasolicitudes.php">Solicitudes</a>
        <a href="consultatecnicos.php">Técnicos</a>
        <a href="../php/cerrarsesion.php" class="cerrar-sesion">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <div>
            <h2>Modificar técnico</h2>
            <p>Modificar los datos del técnico.</p>
        </div>

    </section>

    <section class="formulario-contenedor">

        <form action="../../php/modificar_tecnico.php" method="POST">

            <input type="hidden"
                   name="id_tecnico"
                   value="<?php echo $tecnico["id_tecnico"]; ?>">


            <div class="campo">

                <label>Usuario:</label>

                <select name="id_usuario" required>

                    <?php

                    while ($usuario = mysqli_fetch_array($resultadoUsuarios)) {

                    ?>

                        <option
                            value="<?php echo $usuario["id_usuario"]; ?>"

                            <?php

                            if ($usuario["id_usuario"] == $tecnico["id_usuario"]) {
                                echo "selected";
                            }

                            ?>
                        >

                            <?php echo $usuario["nombre"]; ?>

                        </option>

                    <?php

                    }

                    ?>

                </select>

            </div>


            <div class="campo">

                <label>Rol:</label>

                <select name="rol" required>

                    <option value="Técnico"
                        <?php
                        if ($tecnico["rol"] == "Técnico") {
                            echo "selected";
                        }
                        ?>
                    >
                        Técnico
                    </option>

                    <option value="Técnico de soporte"
                        <?php
                        if ($tecnico["rol"] == "Técnico de soporte") {
                            echo "selected";
                        }
                        ?>
                    >
                        Técnico de soporte
                    </option>

                    <option value="Técnico de mantenimiento"
                        <?php
                        if ($tecnico["rol"] == "Técnico de mantenimiento") {
                            echo "selected";
                        }
                        ?>
                    >
                        Técnico de mantenimiento
                    </option>

                </select>

            </div>


            <div class="campo">

                <label>Área:</label>

                <select name="area" required>

                    <option value="Soporte"
                        <?php
                        if ($tecnico["area"] == "Soporte") {
                            echo "selected";
                        }
                        ?>
                    >
                        Soporte
                    </option>

                    <option value="Hardware"
                        <?php
                        if ($tecnico["area"] == "Hardware") {
                            echo "selected";
                        }
                        ?>
                    >
                        Hardware
                    </option>

                    <option value="Software"
                        <?php
                        if ($tecnico["area"] == "Software") {
                            echo "selected";
                        }
                        ?>
                    >
                        Software
                    </option>

                    <option value="Redes"
                        <?php
                        if ($tecnico["area"] == "Redes") {
                            echo "selected";
                        }
                        ?>
                    >
                        Redes
                    </option>

                </select>

            </div>


            <div class="campo">

                <label>Especialidad:</label>

                <select name="especialidad" required>

                    <option value="Reparación de equipos"
                        <?php
                        if ($tecnico["especialidad"] == "Reparación de equipos") {
                            echo "selected";
                        }
                        ?>
                    >
                        Reparación de equipos
                    </option>

                    <option value="Instalación de software"
                        <?php
                        if ($tecnico["especialidad"] == "Instalación de software") {
                            echo "selected";
                        }
                        ?>
                    >
                        Instalación de software
                    </option>

                    <option value="Redes"
                        <?php
                        if ($tecnico["especialidad"] == "Redes") {
                            echo "selected";
                        }
                        ?>
                    >
                        Redes
                    </option>

                    <option value="Mantenimiento"
                        <?php
                        if ($tecnico["especialidad"] == "Mantenimiento") {
                            echo "selected";
                        }
                        ?>
                    >
                        Mantenimiento
                    </option>

                    <option value="Soporte a usuarios"
                        <?php
                        if ($tecnico["especialidad"] == "Soporte a usuarios") {
                            echo "selected";
                        }
                        ?>
                    >
                        Soporte a usuarios
                    </option>

                </select>

            </div>


            <div class="botones">

                <button type="submit" class="boton guardar">
                    Guardar cambios
                </button>

                <a href="consultatecnicos.php" class="boton cancelar">
                    Cancelar
                </a>

            </div>

        </form>

    </section>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>