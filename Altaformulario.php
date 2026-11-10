<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/styles.css">
    <title>Verificación Usuario</title>
</head>
<body>
    
<?php
include_once "includes/funciones.php";
list($nombre,$edad,$nick,$contrasena,$contenido) = comprobarVariables();
$categoriaEdad = categoriaEdad($edad);

if ($contenido) :
?>
    <section class="completo">
    <article class="centrado">
        <h2>Confirmar Registro</h2>
        <form action="alta.php" method="post">
            <div class="formulario-conjunto">
                <label for="nombre">Nombre: <?php echo $nombre; ?></label>
                <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>

            <div class="formulario-conjunto">
                <label for="edad">edad: <?php echo $edad ." (" . $categoriaEdad . " )"; ?></label>
                <input type="hidden" id="edad" name="edad" value="<?php echo $edad; ?>" required>
            </div>

            <div class="formulario-conjunto">
                <label for="nick">nick: <?php echo $nick; ?></label>
                <input type="hidden" id="nick" name="nick" value="<?php echo $nick;?>" required>
            </div>

            <div class="formulario-conjunto">
                <label for="contrasena">contrasena:<?php echo $contrasena; ?></label>
                <input type="hidden" id="contrasena" name="contrasena" value="<?php echo $contrasena; ?>" required>
            </div>

            <div class="formulario-conjunto">
                <button type="submit">Confirmar Datos</button>
</div>
                <div class="formulario-conjunto">
                <button type="submit" formaction="includes/form.php">Corregir Datos</button>

            </div>
        </form>
    </article>
</section>
<?php
 else:
    echo "<h1>Error en la recepcion </h1>";
 endif;
include 'includes/pie.html';
?>
</body>
</html>