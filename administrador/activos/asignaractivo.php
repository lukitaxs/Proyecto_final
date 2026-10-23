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

$id_activo = $_GET["id"];

$consulta = "SELECT * FROM activo_tecnologico
             WHERE id_activo = '$id_activo'";

$resultado = mysqli_query($conexion, $consulta);
$activo = mysqli_fetch_array($resultado);

$consulta_usuarios = "SELECT * FROM usuario
                      WHERE id_rol = 2";

$resultado_usuarios = mysqli_query($conexion, $consulta_usuarios);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asignar activo - Covasg</title>

    <link rel="stylesheet" href="../css/consultausuarios.css">
</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>
        <a href="../administrador.php">Inicio</a>
        <a href="../usuarios.html">Usuarios</a>
        <a href="consultaactivos.php">Activos</a>
        <a href="../../php/cerrarsesion.php">Cerrar sesión</a>
    </nav>

</header>

<main>

    <section class="titulo">

        <h2>Asignar activo a un técnico</h2>

        <p>Seleccioná el técnico que recibirá el equipo.</p>
    
    </section>

    <?php if ($activo) { ?>

        <section class="tabla-contenedor">

            <p>
                <strong>Activo:</strong>
                <?php echo $activo["tipo_dispositivo"]; ?>
                <?php echo $activo["marca"]; ?>
                <?php echo $activo["modelo"]; ?>
            </p>

            <form action="../../php/guardar_asignacion.php" method="POST">

                <input type="hidden" name="id_activo"
                       value="<?php echo $activo["id_activo"]; ?>">

                <p>
                    <label>Usuario:</label>

                    <select name="id_usuario" required>

                        <option value="">Seleccioná un usuario</option>

                        <?php while ($usuario = mysqli_fetch_array($resultado_usuarios)) { ?>

                            <option value="<?php echo $usuario["id_usuario"]; ?>">
                                <?php echo $usuario["nombre"]; ?>
                            </option>

                        <?php } ?>

                    </select>
                </p>

                 <p>
                    <label>Ubicación física:</label><br>

                    <input type="text" name="ubicacion_fisica"
                        placeholder="Ej: Laboratorio de informática"
                        required>
                </p>

                <p>
                    <label>Observaciones:</label><br>

                    <textarea name="observaciones" rows="3"></textarea>
                </p>

                <button type="submit">Guardar asignación</button>

                <a href="consultaactivos.php">Cancelar</a>

            </form>

        </section>

    <?php } else { ?>

        <p>No se encontró el activo seleccionado.</p>

        <a href="consultaactivos.php">Volver a activos</a>

    <?php } ?>

</main>

<footer>
    <p>© 2026 Covasg - Sistema de soporte informático.</p>
</footer>

</body>

</html>