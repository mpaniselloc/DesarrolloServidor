<?php
require_once "services/validarDatos.php";
require_once "models/usuario.php";

// Si se reciben datos por POST (ej. al pulsar "Volver"), creamos el objeto Usuario con esos datos
if (comprobarDatosRegistro()) {
  $usuario = new Usuario(
    $_POST['nombre'],
    (int)$_POST['edad'],
    $_POST['nick'],
    $_POST['password']
  );
} else {
  // Si entra por primera vez, creamos un objeto Usuario vacío, para evitar errores en la impresión de los datos en el formulario
  $usuario = new Usuario("", 0, "", "");
}
?>

<!-- Formulario de creacion para nuevos ususarios -->

<div class="completo">
  <div class="centrado">
    <h2>ALTA USUARIO</h2>
    <form action="sesiones/confirmarRegistro.php" method="post">
      <div class="formulario-conjunto">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario->getNombre(); ?>" required>
      </div>
      <br>
      <div class="formulario-conjunto">
        <label for="edad">Edad</label>
        <!-- Creamos una condicion para evitar ver el numero 0 por defecto al crear el usuario vacio
         Si la edad es mayor que 0 imprimira el valor, en caso contrario imprimira un valor vacio -->
        <input type="text" id="edad" name="edad" value="<?php echo $usuario->getEdad() > 0 ? $usuario->getEdad() : ''; ?>" required>
      </div>
      <br>
      <div class="formulario-conjunto">
        <label for="nick">Nick</label>
        <input type="text" id="nick" name="nick" maxlength="8" value="<?php echo $usuario->getNick(); ?>" required>
      </div>
      <br>
      <div class="formulario-conjunto">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" maxlength="5" value="<?php echo $usuario->getPassword(); ?>" required>
      </div>
      <input type="submit" value="Aceptar">
      <br>
      <input type="submit" value="Volver" formaction="index.php" formnovalidate>
    </form>
  </div>
</div>