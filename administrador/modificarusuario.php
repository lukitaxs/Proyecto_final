<?php

include("../php/conexion.php");

$id_usuario = $_GET["id"];

/* Buscar el usuario */
$consulta = "SELECT * FROM usuario
             WHERE id_usuario = '$id_usuario'";

$resultado = mysqli_query($conexion, $consulta);

$usuario = mysqli_fetch_array($resultado);

/* Buscar los roles */
$consultaRoles = "SELECT * FROM rol";

$resultadoRoles = mysqli_query($conexion, $consultaRoles);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Modificar usuario - Covasg</title>
        <link rel="icon" href="../img/CovasgLogo.png" type="image/png">
    <link rel="stylesheet" href="css/altausuario.css">

</head>

<body>

<header>

    <h1>Covasg</h1>

    <nav>

        <a href="administrador.php">Inicio</a>
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
            ✏️
        </div>

        <div>

            <h2>Modificar usuario</h2>

            <p>
                Modifique los datos del usuario seleccionado.
            </p>

        </div>

    </section>

    <section class="formulario-contenedor">

        <h3>Información del usuario</h3>

        <form action="../php/modificar_usuario.php" method="POST">

            <input
                type="hidden"
                name="id_usuario"
                value="<?php echo $usuario["id_usuario"]; ?>"
            >

            <div class="campos">

                <div class="campo">

                    <label for="nombre">
                        Nombre completo
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        value="<?php echo $usuario["nombre"]; ?>"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="correo">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        value="<?php echo $usuario["correo"]; ?>"
                        required
                    >

                </div>

                <div class="campo">

                    <label for="contrasenia">
                        Nueva contraseña
                    </label>

                    <input
                        type="password"
                        id="contrasenia"
                        name="contrasenia"
                        placeholder="Dejar vacío para mantener la contraseña actual"
                    >

                </div>

                <div class="campo">

                    <label for="id_rol">
                        Rol del usuario
                    </label>

                    <select
                        id="id_rol"
                        name="id_rol"
                        required
                    >

                        <?php while ($rol = mysqli_fetch_array($resultadoRoles)) { ?>

                            <option
                                value="<?php echo $rol["id_rol"]; ?>"

                                <?php

                                if ($rol["id_rol"] == $usuario["id_rol"]) {
                                    echo "selected";
                                }

                                ?>
                            >

                                <?php echo $rol["nombre"]; ?>

                            </option>

                        <?php } ?>

                    </select>

                </div>

            </div>

            <div class="botones">

                <a
                    href="consultausuario.php"
                    class="boton cancelar"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="boton guardar"
                >
                    Guardar cambios
                </button>

            </div>

        </form>

    </section>

</main>

<footer>

    <p>
        © 2026 Covasg - Sistema de soporte informático.
    </p>

</footer>

</body>

</html>