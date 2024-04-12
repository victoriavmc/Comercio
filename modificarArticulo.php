<?php require './estilos/templates/cabeza.php'; ?>

<title>Modificar Articulo</title>
<link rel="stylesheet" href="./estilos/estilo.css">
</head>

<body>
    <div>
        <form method="post">
            <h1>Modificar articulo:</h1>
            <h2>Codigo del articulo:</h2>
            <input type="text" name="codigo" placeholder="Codigo del articulo" size="50" required value="<?php echo isset($_POST['codigo']) ? htmlspecialchars($_POST['codigo']) : ''; ?>">
            <br>
            <input type="submit" value="Buscar el articulo"> <br>
            <?php
            $con = mysqli_connect("localhost", "root", "", "comercio") or die("Error con la conexión");

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $codigo = $_POST['codigo'];
                $registro = mysqli_query($con, "SELECT codigo, descripcion, precio, codigorubro FROM articulos WHERE codigo='$codigo'") or die(mysqli_error($con));

                if ($reg = mysqli_fetch_assoc($registro)) {
                    echo 'Datos actuales del articulo: <br>';
                    echo 'El codigo del articulo es: ' . $reg['codigo'] . '<br>';
                    echo 'La descripcion del articulo es: ' . $reg['descripcion'] . '<br>';
                    echo 'El precio del articulo es: ' . $reg['precio'] . '<br>';
                    echo 'El nombre del rubro es: ' . $reg['codigorubro'] . '<br>';
            ?>
                    <form method="post">
                        <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                        <p>Descripcion del articulo:</p>
                        <input type="text" name="descripcion" placeholder="Descripcion del articulo" size="50" required>
                        <br>
                        <p>Precio del articulo:</p>
                        <input type="text" name="precio" placeholder="Precio del articulo" size="50" required>
                        <br>
                        <p>Rubro del articulo:</p>
                        <select name="codigorubro" id="rubros">
                            <option value="">-- Seleccione una opcion --</option>
                            <?php
                            $consulta = "SELECT * FROM rubros";
                            $resultado = mysqli_query($con, $consulta);
                            while ($rubros = mysqli_fetch_assoc($resultado)) {
                                echo '<option value="' . $rubros['codigo'] . '">' . $rubros['descripcion'] . '</option>';
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Modificar el articulo"> <br>
                    </form>
            <?php
                } else {
                    echo 'No existe el articulo con el codigo:' . $codigo;
                }

                // Procesamiento del formulario de modificación
                if (isset($_POST['descripcion'], $_POST['precio'], $_POST['codigorubro'])) {
                    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
                    $precio = floatval($_POST['precio']);
                    $codigorubro = mysqli_real_escape_string($con, $_POST['codigorubro']);

                    mysqli_query($con, "UPDATE articulos SET descripcion='$descripcion', precio=$precio, codigorubro='$codigorubro' WHERE codigo='$codigo'") or die(mysqli_error($con));
                    echo 'Se ha modificado el articulo del codigo:' . $codigo;
                }
            }
            ?>
            <br>
            <a href="index.php">Volver al inicio</a>
    </div>
</body>