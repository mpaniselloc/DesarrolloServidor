<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceso - LibroSphere</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>

<!-- Vista del formulario de inicio de sesion -->

<body>
  <?php include __DIR__ . '/header.php'; ?>

  <div class="completo">
    <div class="centrado">
      <h2>ACCESO</h2>
      <form action="index.php?accion=login" method="post">
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
          <a href="index.php?accion=registro">Nuevo usuario</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
