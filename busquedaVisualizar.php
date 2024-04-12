<?php require './estilos/templates/cabeza.php';
// #region Crear una conexión
$con = mysqli_connect("localhost", "root", "", "comercio") or die("Error con la conexión");

$registros = mysqli_query($con, "SELECT codigo, descripcion, precio, codigorubro FROM articulos") or die(mysqli_error($con));

echo '<table class="tablalistado">';
echo '<tr><th>Código</th><th>Descripción</th><th>Precio</th><th>Código de Rubro</th></tr>';

while ($row = mysqli_fetch_array($registros)) {
    echo '<tr>';
    echo '<td>' . $row['codigo'] . '</td>';
    echo '<td>' . $row['descripcion'] . '</td>';
    echo '<td>' . $row['precio'] . '</td>';
    echo '<td>' . $row['codigorubro'] . '</td>';
    echo '</tr>';
}
?>

<title>Productos del inventario</title>
<link rel="stylesheet" href="./estilos/estilo.css">
</head>

<body>
    <h1>Listado de productos <br> de Articulos.</h1>
    <table class="tablalistado">
        <div>
            <form method="post">
                <h2> Buscar el articulo: </h2>
                <h3>Codigo del Producto:</h3>
                <input type="text" name="codigo" placeholder="Codigo" size="50" required>
                <br>
                <input type="submit" value="Buscar el Producto"> <br>
                <?php

                if ($_SERVER["REQUEST_METHOD"] === 'POST') {
                    $codigo = mysqli_real_escape_string($con, $_POST['codigo']);
                    $registro = mysqli_query($con, "SELECT codigo, descripcion, precio, codigorubro FROM articulos WHERE codigo='$codigo'") or die(mysqli_error($con));

                    if ($reg = mysqli_fetch_array($registro)) {
                        echo 'El codigo del articulo es:' . $reg['codigo'] . '<br>';
                        echo 'La descripcion del articulo es:' . $reg['descripcion'] . '<br>';
                        echo 'El precio del articulo es:' . $reg['precio'] . '<br>';
                        echo 'El nombre del rubro es:' . $reg['codigorubro'] . '<br>';
                    } else {
                        echo 'No existe un artículo con dicho código' . '<br>';
                    }
                }

                echo '</table>';
                mysqli_close($con);
                ?>
            </form>
        </div>
        <a href="./index.php">Volver al menú</a>
</body>

</html>