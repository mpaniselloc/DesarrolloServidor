<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmación de Registro</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>

<!-- Vista de confirmación de los datos del nuevo usuario.
     Recibe del RegistroController: $usuario (objeto Usuario) -->

<body>
  <?php include __DIR__ . '/header.php'; ?>

  <div class="completo">
    <div class="centrado">
      <h2>CONFIRMACIÓN DE REGISTRO</h2>

      <form method="post">
        <div class="formulario-conjunto">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario->getNombre()) ?>" readonly>
        </div>
        <br>
        <div class="formulario-conjunto">
          <label for="edad">Edad</label>
          <!-- getEdadFormateada devuelve la edad con su categoría -->
          <input type="text" id="edad" name="edad" value="<?= htmlspecialchars($usuario->getEdadFormateada()) ?>" readonly>
        </div>
        <br>
        <div class="formulario-conjunto">
          <label for="nick">Nick</label>
          <input type="text" id="nick" name="nick" value="<?= htmlspecialchars($usuario->getNick()) ?>" readonly>
        </div>
        <br>
        <div class="formulario-conjunto">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" value="<?= htmlspecialchars($usuario->getPassword()) ?>" readonly>
        </div>
        <input type="submit" value="Confirmar" formaction="index.php?accion=crear">
        <br>
        <input type="submit" value="Cancelar" formaction="index.php?accion=registro">
      </form>
    </div>
  </div>
</body>

</html>
