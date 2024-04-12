<?php require './estilos/templates/cabeza.php'; ?>

<title>Crear Articulo</title>
<link rel="stylesheet" href="./estilos/estilo.css">
</head>

<body>
    <div>
        <form method="post">
            <h1>Alta de articulo:</h1>
            <h2>Descripcion del articulo:</h2>
            <input type="text" name="descripcion" placeholder="Descripcion del articulo" size="50" required value="<?php echo isset($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion']) : ''; ?>">
            <br>
            <input type="submit" value="Buscar el articulo"> <br>
            <?php
            $con = mysqli_connect("localhost", "root", "", "comercio") or die("Error con la conexión");

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $descripcion = $_POST['descripcion'];
                $registro = mysqli_query($con, "SELECT codigo, descripcion, precio, codigorubro FROM articulos WHERE descripcion='$descripcion'") or die(mysqli_error($con));

                if ($reg = mysqli_fetch_array($registro)) {
                    echo 'El articulo ya existe! <br>';
                    echo 'El codigo del articulo es: ' . $reg['codigo'] . '<br>';
                    echo 'La descripcion del articulo es: ' . $reg['descripcion'] . '<br>';
                    echo 'El precio del articulo es: ' . $reg['precio'] . '<br>';
                    echo 'El nombre del rubro es: ' . $reg['codigorubro'] . '<br>';
                } else {
                    echo 'CREAR NUEVO ARTICULO: <br>' . $descripcion;
            ?>
                    <form method="post">
                        <br>
                        <h2>Precio del articulo:</h2>
                        <input type="text" name="precio" placeholder="Precio del articulo" size="50" required>
                        <br>
                        <h2>Rubro del articulo:</h2>
                        <?php
                        $consulta = "SELECT * FROM rubros";
                        $resultado = mysqli_query($con, $consulta);

                        ?>
                        <select name="codigorubro" id="rubros">
                            <option value="">-- Seleccione una opcion --</option>
                            <?php while ($rubros = mysqli_fetch_assoc($resultado)) { ?>
                                <option value="<?php echo $rubros['codigo']; ?>"><?php echo $rubros['descripcion']; ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <input type="submit" value="Crear el articulo"> <br>
                    </form>
            <?php

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                        if (!empty($_POST['precio']) && !empty($_POST['codigorubro'])) {

                            $descripcion = $_POST['descripcion'];
                            $precio = $_POST['precio'];
                            $codigorubro = $_POST['codigorubro'];

                            mysqli_query($con, "INSERT INTO articulos (descripcion, precio, codigorubro) VALUES ('$descripcion', '$precio', '$codigorubro')") or die(mysqli_error($con));

                            header('location: ./index.php');
                        }
                    }
                }
            }
            ?>

            <br>
            <a href="./index.php">Volver al Inicio</a>
        </form>
    </div>
</body>