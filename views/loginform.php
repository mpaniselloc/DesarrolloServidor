<!-- Formulario de inicio de sesion como admin -->
<div class="completo">
  <div class="centrado">
    <h2>ACCESO</h2>
    <form action="controllers/validarlogin.php" method="post">
      <div class="formulario-login">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" required>
      </div>
      <br>
      <div class="formulario-login">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
      </div>
      <br>
      <input type="submit" value="Enviar">
      <br><br>
      <div class="formulario-login">
        <a href="views/NuevoRegistro.php">Nuevo usuario</a>
      </div>
    </form>
  </div>
</div>