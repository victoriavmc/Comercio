<?php require './estilos/templates/cabeza.php'; ?>

<title>Borrar Articulo</title>
<link rel="stylesheet" href="./estilos/estilo.css">
</head>

<body>
    <div>
        <form method="post">
            <h1>Borrar de articulo:</h1>
            <h2>Codigo del articulo:</h2>
            <input type="text" name="codigo" placeholder="Codigo del articulo" size="50" required>
            <br>
            <input type="submit" value="Buscar el articulo"> <br>
            <?php
            $con = mysqli_connect("localhost", "root", "", "comercio") or die("Error con la conexión");

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $codigo = $_POST['codigo'];
                $registro = mysqli_query($con, "SELECT codigo, descripcion, precio, codigorubro FROM articulos WHERE codigo='$codigo'") or die(mysqli_error($con));

                if ($reg = mysqli_fetch_array($registro)) {
                    mysqli_query($con, "delete from articulos where codigo=$codigo") or
                        die(mysqli_error($con));
                    echo 'Se eliminó el articulo con el codigo:' . $reg['codigo'];
                } else {
                    echo 'No existe el articulo con el codigo:' . $codigo;
                }
            }
            ?>
            <br>
            <a href="./index.php">Volver al Inicio</a>
        </form>
    </div>
</body>