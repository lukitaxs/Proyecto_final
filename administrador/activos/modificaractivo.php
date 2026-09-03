<?php

include("../../php/conexion.php");

$id_activo = $_GET["id"];

$consulta = "SELECT * FROM activo_tecnologico
             WHERE id_activo = '$id_activo'";

$resultado = mysqli_query($conexion, $consulta);

$activo = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modificar activo - Covasg</title>

    <link rel="stylesheet" href="../css/estilomodificaractivo.css">
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
            ✏️
        </div>

        <div>
            <h2>Modificar activo</h2>

            <p>
                Modifique los datos del activo seleccionado.
            </p>
        </div>

    </section>

    <section class="formulario-contenedor">

        <h3>Información del activo</h3>

        <form action="../../php/modificar_activo.php" method="POST">

            <input
                type="hidden"
                name="id_activo"
                value="<?php echo $activo["id_activo"]; ?>"
            >

            <div class="campo">

                <label for="tipo_dispositivo">
                    Tipo de dispositivo
                </label>

                <input
                    type="text"
                    id="tipo_dispositivo"
                    name="tipo_dispositivo"
                    value="<?php echo $activo["tipo_dispositivo"]; ?>"
                    required
                >

            </div>

            <div class="campo">

                <label for="marca">
                    Marca
                </label>

                <input
                    type="text"
                    id="marca"
                    name="marca"
                    value="<?php echo $activo["marca"]; ?>"
                    required
                >

            </div>

            <div class="campo">

                <label for="modelo">
                    Modelo
                </label>

                <input
                    type="text"
                    id="modelo"
                    name="modelo"
                    value="<?php echo $activo["modelo"]; ?>"
                    required
                >

            </div>

            <div class="campo">

                <label for="codigo_inventario">
                    Código de inventario
                </label>

                <input
                    type="text"
                    id="codigo_inventario"
                    name="codigo_inventario"
                    value="<?php echo $activo["codigo_inventario"]; ?>"
                    required
                >

            </div>

            <div class="campo">

                <label for="estado_actual">
                    Estado actual
                </label>

                <input
                    type="text"
                    id="estado_actual"
                    name="estado_actual"
                    value="<?php echo $activo["estado_actual"]; ?>"
                    required
                >

            </div>

            <div class="campo">

                <label for="ubicacion_fisica">
                    Ubicación física
                </label>

                <input
                    type="text"
                    id="ubicacion_fisica"
                    name="ubicacion_fisica"
                    value="<?php echo $activo["ubicacion_fisica"]; ?>"
                    required
                >

            </div>

            <div class="botones">

                <a href="consultaactivos.php" class="boton cancelar">
                    Cancelar
                </a>

                <button type="submit" class="boton guardar">
                    Guardar cambios
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