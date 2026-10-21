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

$consulta = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Alta de técnico - Covasg</title>

    <link rel="stylesheet" href="../css/estilotecnicos.css">
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
            <h2>Agregar técnico</h2>
            <p>Registrar un nuevo técnico en el sistema.</p>
        </div>

    </section>

    <section class="formulario-contenedor">

        <form action="../../php/alta_tecnico.php" method="POST">

            <div class="campo">

                <label>Usuario:</label>

                <select name="id_usuario" required>

                    <option value="">Seleccione un usuario</option>

                    <?php

                    while ($usuario = mysqli_fetch_array($resultado)) {

                    ?>

                        <option value="<?php echo $usuario["id_usuario"]; ?>">
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

                    <option value="">Seleccione un rol</option>

                    <option value="Técnico">
                        Técnico
                    </option>

                    <option value="Técnico de soporte">
                        Técnico de soporte
                    </option>

                    <option value="Técnico de mantenimiento">
                        Técnico de mantenimiento
                    </option>

                </select>

            </div>

            <div class="campo">

                <label>Área:</label>

                <select name="area" required>

                    <option value="">Seleccione un área</option>

                    <option value="Soporte">
                        Soporte
                    </option>

                    <option value="Hardware">
                        Hardware
                    </option>

                    <option value="Software">
                        Software
                    </option>

                    <option value="Redes">
                        Redes
                    </option>

                </select>

            </div>

            <div class="campo">

                <label>Especialidad:</label>

                <select name="especialidad" required>

                    <option value="">Seleccione una especialidad</option>

                    <option value="Reparación de equipos">
                        Reparación de equipos
                    </option>

                    <option value="Instalación de software">
                        Instalación de software
                    </option>

                    <option value="Redes">
                        Redes
                    </option>

                    <option value="Mantenimiento">
                        Mantenimiento
                    </option>

                    <option value="Soporte a usuarios">
                        Soporte a usuarios
                    </option>

                </select>

            </div>

            <div class="botones">

                <button type="submit" class="boton guardar">
                    Guardar técnico
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