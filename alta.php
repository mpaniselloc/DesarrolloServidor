<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/styles.css">
    <title>Document</title>
</head>

<body>


    <?php
    include "includes/cabecera.html";
    require_once "controlador/usuarioControlador.php";
    $controlador = new usuarioControlador();
    $controlador->alta();
    include "includes/pie.html";
    ?>

</body>

</html>