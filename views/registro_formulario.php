<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Registro</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>

<!-- Vista del formulario de alta de usuario.
Recibe del RegistroController: $usuario (objeto Usuario, vacío o con los datos previos) -->

<body>
  <?php include __DIR__ . '/header.php'; ?>

  <div class="completo">
    <div class="centrado">
      <h2>ALTA USUARIO</h2>
      <form action="index.php?accion=confirmar" method="post">
        <div class="formulario-conjunto">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario->getNombre()) ?>" required>
        </div>
        <br>
        <div class="formulario-conjunto">
          <label for="edad">Edad</label>
          <!-- Si la edad es mayor que 0 imprime el valor, si no deja el campo vacío -->
          <input type="text" id="edad" name="edad" value="<?= $usuario->getEdad() > 0 ? $usuario->getEdad() : '' ?>" required>
        </div>
        <br>
        <div class="formulario-conjunto">
          <label for="nick">Nick</label>
          <input type="text" id="nick" name="nick" maxlength="8" value="<?= htmlspecialchars($usuario->getNick()) ?>" required>
        </div>
        <br>
        <div class="formulario-conjunto">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" maxlength="5" value="<?= htmlspecialchars($usuario->getPassword()) ?>" required>
        </div>
        <input type="submit" value="Aceptar">
        <br>
        <input type="submit" value="Volver" formaction="index.php" formnovalidate>
      </form>
    </div>
  </div>
</body>

</html>