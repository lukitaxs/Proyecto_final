<?php

include("../../php/conexion.php");

$id_activo = $_GET["id"];

$consulta = "SELECT * FROM activo_tecnologico
             WHERE id_activo = '$id_activo'";

$resultado = mysqli_query($conexion, $consulta);

$activo = mysqli_fetch_array($resultado);


/* Consultar marcas */

$consulta_marcas = "SELECT * FROM Marca";
$resultado_marcas = mysqli_query($conexion, $consulta_marcas);


/* Consultar modelos */

$consulta_modelos = "SELECT * FROM Modelo";
$resultado_modelos = mysqli_query($conexion, $consulta_modelos);

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


            <!-- MARCA -->

            <div class="campo">

                <label for="marca">
                    Marca
                </label>

                <select
                    name="marca"
                    id="marca"
                    required
                >

                    <option value="">
                        Seleccione una marca
                    </option>

                    <?php

                    while ($marca = mysqli_fetch_array($resultado_marcas)) {

                    ?>

                        <option
                            value="<?php echo $marca["nombre_marca"]; ?>"

                            <?php

                            if ($activo["marca"] == $marca["nombre_marca"]) {
                                echo "selected";
                            }

                            ?>
                        >

                            <?php echo $marca["nombre_marca"]; ?>

                        </option>

                    <?php

                    }

                    ?>

                </select>

            </div>


            <!-- MODELO -->

            <div class="campo">

                <label for="modelo">
                    Modelo
                </label>

                <select
                    name="modelo"
                    id="modelo"
                    required
                >

                    <option value="">
                        Seleccione un modelo
                    </option>

                    <?php

                    while ($modelo = mysqli_fetch_array($resultado_modelos)) {

                    ?>

                        <option
                            value="<?php echo $modelo["nombre_modelo"]; ?>"

                            <?php

                            if ($activo["modelo"] == $modelo["nombre_modelo"]) {
                                echo "selected";
                            }

                            ?>
                        >

                            <?php echo $modelo["nombre_modelo"]; ?>

                        </option>

                    <?php

                    }

                    ?>

                </select>

            </div>


            <!-- CÓDIGO INVENTARIO -->

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


            <!-- ESTADO -->

            <div class="campo">

                <label for="estado_actual">
                    Estado actual
                </label>

                <select
                    name="estado_actual"
                    id="estado_actual"
                    required
                >

                    <option value="">
                        Seleccione un estado
                    </option>

                    <option
                        value="Disponible"
                        <?php if ($activo["estado_actual"] == "Disponible") echo "selected"; ?>
                    >
                        Disponible
                    </option>

                    <option
                        value="En uso"
                        <?php if ($activo["estado_actual"] == "En uso") echo "selected"; ?>
                    >
                        En uso
                    </option>

                    <option
                        value="En reparación"
                        <?php if ($activo["estado_actual"] == "En reparación") echo "selected"; ?>
                    >
                        En reparación
                    </option>

                    <option
                        value="Fuera de servicio"
                        <?php if ($activo["estado_actual"] == "Fuera de servicio") echo "selected"; ?>
                    >
                        Fuera de servicio
                    </option>

                </select>

            </div>


            <!-- UBICACIÓN -->

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