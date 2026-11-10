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
include_once "includes/funciones.php";
list($nombre,$edad,$nick,$contrasena,$contenido) = comprobarVariables();
$categoriaEdad = categoriaEdad($edad);
$icono = imagenEdad($edad);
if ($contenido) :
    ?>
<section class="completo">
    <article class="centrado">
        <h2>Registro Completado</h2>
        <p>El usuario <?php echo $nick; ?> ha sido creado correctamente.</p>
        <p><?php echo $nombre; ?></p>
        <p><?php echo $edad . " ". $categoriaEdad . " ". $icono; ?></p>
        <a href="index.php">Inicio</a>
</article>
</section>
<?php
 else :
    echo "<h1>Error en la recepcion </h1>";
endif;
include "includes/pie.html";
?>

</body>
</html>