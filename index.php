<?php require './estilos/templates/cabeza.php'; ?>

<title>Actividad N° 1</title>
<link rel="stylesheet" href="./estilos/estilo.css">

</head>

<body>
    <div class='contenedorFondo'>
        <div class='cuadroTexto'>
            <div class='cuadroLogo'>
                <img src="./estilos/Imagenes/trade.png" alt="logo">
            </div>
            <br>
            <div class="contenedorTexto">
                <button onclick="window.location.href='./agregarRubro.php'">
                    <img src="./estilos/Imagenes/boton1.png" alt="Agregar Rubros">
                </button>

                <button onclick="window.location.href='./agregarArticulo.php'">
                    <img src="./estilos/Imagenes/boton2.png" alt="Agregar Articulos">
                </button>

                <button onclick="window.location.href='./busquedaVisualizar.php'">
                    <img src="./estilos/Imagenes/boton3.png" alt="Ver Articulos">
                </button>

                <button onclick="window.location.href='./borrarArticulo.php'">
                    <img src="./estilos/Imagenes/boton4.png" alt="Borrar Articulos">
                </button>

                <button onclick="window.location.href='./modificarArticulo.php'">
                    <img src="./estilos/Imagenes/boton5.png" alt="Modificar Articulos">
                </button>
            </div>
        </div>
    </div>

    <footer>
        <img src="./estilos/Imagenes/SNA&VVMC.jpg" alt="">
        <p>VictoriaVMC </p>
    </footer>
</body>

</html>