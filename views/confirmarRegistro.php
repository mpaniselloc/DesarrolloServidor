<?php
require_once "../models/validarDatos.php";
require_once "../models/usuario.php";

if (comprobarDatosRegistro()) {
  // Instanciamos el usuario con los datos recibidos del POST
  $usuario = new Usuario(
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
    <title>Confirmación de Registro</title>
    <link rel="stylesheet" href="../assets/styles.css">
  </head>

  <body>
    <?php include "header.php"; ?>

    <div class="completo">
      <div class="centrado">
        <h2>CONFIRMACIÓN DE REGISTRO</h2>

        <form method="post">
          <div class="formulario-conjunto">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $usuario->getNombre(); ?>" readonly>
          </div>
          <br>
          <div class="formulario-conjunto">
            <label for="edad">Edad</label>
            <!-- LLamamos al metodo getEdadFormateada que devuelve la edad con su categoria -->
            <input type="text" id="edad" name="edad" value="<?php echo $usuario->getEdadFormateada(); ?>" readonly>
          </div>
          <br>
          <div class="formulario-conjunto">
            <label for="nick">Nick</label>
            <input type="text" id="nick" name="nick" value="<?php echo $usuario->getNick(); ?>" readonly>
          </div>
          <br>
          <div class="formulario-conjunto">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="<?php echo $usuario->getPassword(); ?>" readonly>
          </div>
          <input type="submit" value="Confirmar" formaction="crearRegistro.php">
          <br>
          <input type="submit" value="Cancelar" formaction="NuevoRegistro.php">
        </form>
      </div>
    </div>
  </body>

  </html>
<?php
} else {
  echo "Error: No se han recibido los datos correctamente";
}
?>