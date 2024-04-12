<?php require './estilos/templates/cabeza.php';
?>


<title>Crear Rubro</title>
<link rel="stylesheet" href="./estilos/estilo.css">
</head>

<body>
    <div>
        <form method="post">
            <h1> Alta de Rubro: </h1>
            <h2>Descripción del Rubro:</h2>
            <input type="text" name="descripcion" placeholder="Descripción Rubro" size="50" required>
            <br>
            <input type="submit" value="Buscar el Rubro"> <br>
            <?php
            // #region Crear una conexión
            $con = mysqli_connect("localhost", "root", "", "comercio") or die("Error con la conexión");

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $descripcion = $_POST['descripcion'];
                $registro = mysqli_query($con, "SELECT codigo, descripcion FROM rubros WHERE descripcion='$descripcion'") or die(mysqli_error($con));

                if ($reg = mysqli_fetch_array($registro)) {
                    echo 'Ya hay un Rubro con esa descripcion' . '<br>';
                    echo 'El codigo del articulo es:' . $reg['codigo'] . '<br>';
                    echo 'La descripcion del articulo es:' . $reg['descripcion'] . '<br>';
                } else {
                    mysqli_query($con, "INSERT INTO rubros (descripcion) VALUES ('$descripcion')") or die(mysqli_error($con));
                    echo 'El nuevo registro se almacenó en el rubro!';
                }
                mysqli_close($con);
            }
            ?>
            <br>
            <a href="./index.php">Volver al Inicio</a>
        </form>
</body>