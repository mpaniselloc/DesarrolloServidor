<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Completado</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>

<!-- Vista de registro completado.
     Recibe del RegistroController: $usuario (objeto Usuario) -->

<body>
  <?php include __DIR__ . '/header.php'; ?>

  <div class="completo">
    <div class="centrado">
      <h2>¡REGISTRO COMPLETADO!</h2>
      <!-- Para mostrar los datos utilizamos los getters de la clase Usuario -->
      <p align="center">El usuario <b><?= htmlspecialchars($usuario->getNick()) ?></b> ha sido creado correctamente.</p>
      <br>
      <p align="center"><b>Nombre:</b> <?= htmlspecialchars($usuario->getNombre()) ?></p>
      <p align="center"><b>Edad:</b> <?= $usuario->getEdadConEmoji() ?></p>
      <br>
      <input type="button" value="Volver a inicio" onclick="location.href='index.php';">
    </div>
  </div>
</body>

</html>
