<?php
// Incluimos la función de validación y el Modelo Usuario
include "../services/validarDatos.php";
include "../models/usuario.php";

// Llamaos a la funcion donde comprobamos los datos
if (comprobarDatosRegistro()) {

  // Crreacion del objeto usuario
  $nuevoUsuario = new Usuario(
    $_POST['nombre'],
    (int)$_POST['edad'],
    $_POST['nick'],
    $_POST['password']
  );
?>
  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Completado</title>
    <link rel="stylesheet" href="../assets/styles.css">
  </head>

  <body>
    <?php include "../components/layout/header.php"; ?>

    <div class="completo">
      <div class="centrado">
        <h2>¡REGISTRO COMPLETADO!</h2>
        <!-- Para capturar los datos utilizamos los getters de la clase Usuario-->
        <p align="center">El usuario <b><?php echo $nuevoUsuario->getNick(); ?></b> ha sido creado correctamente.</p>
        <br>
        <p align="center"><b>Nombre:</b> <?php echo $nuevoUsuario->getNombre(); ?></p>
        <p align="center"><b>Edad:</b> <?php echo $nuevoUsuario->getEdadConEmoji(); ?></p>
        <br>
        <input type="button" value="Volver a inicio" onclick="location.href='../index.php';">
      </div>
    </div>
  </body>

  </html>
<?php
} else {
  echo '<h1>Los datos no se han registrado</h1>';
}
?>