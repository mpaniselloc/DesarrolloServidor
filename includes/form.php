<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registro usuario</title>
</head>
<body>
    

<?php
include 'cabecera.html';
include_once "funciones.php";
list($nombre,$edad,$nick,$contrasena,$contenido) = comprobarVariables();
if ($contenido) {
    ?>
    <section class="completo">
    <article class="centrado">
    <h2>Formulario de Registro</h2>
        <form action="../Altaformulario.php" method="post">
            <div class="formulario-conjunto">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>

            <div class="formulario-conjunto">
                <label for="edad">Edad:</label>
                <input type="text" id="edad" name="edad" value="<?php echo $edad; ?>" required>
            </div>

            <div class="formulario-conjunto">
                <label for="nick">Nick:</label>
                <input type="text" id="Nick" name="nick" value="<?php echo $nick; ?>" required>
            </div>

            <div class="formulario-conjunto">
                <label for="contrasena">Contraseña:</label>
                <input type="text" id="contrasena" name="contrasena" value="<?php echo $contrasena; ?>" required>
            </div>

            <div class="formulario-conjunto">
            <button type="submit">Enviar</button>

            </div>
        </form>
    </article>
</section>
<?php
} else {
 ?>

<section class="completo">
    <article class="centrado">
        <h2>Formulario de Registro</h2>
        <form action="../Altaformulario.php" method="post">
            <div class="formulario-conjunto">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="formulario-conjunto">
                <label for="edad">Edad:</label>
                <input type="text" id="edad" name="edad" required>
            </div>

            <div class="formulario-conjunto">
                <label for="nick">Nick:</label>
                <input type="text" id="nick" name="nick" required>
            </div>

            <div class="formulario-conjunto">
                <label for="contrasena">Contraseña:</label>
                <input type="text" id="contrasena" name="contrasena" required>
            </div>

            <div class="formulario-conjunto">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </article>
</section>
<?php
}
include 'pie.html';
?>

</body>
</html>