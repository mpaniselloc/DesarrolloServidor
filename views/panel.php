<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuario - LibroSphere</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>

<!-- Vista principal al iniciar correctamente la sesion.
  Recibe del PanelController: $usuario, $rol, $horaInicio -->

<body>
  <?php include __DIR__ . '/header.php'; ?>

  <h1>Bienvenido a LibroSphere</h1>
  <h2>Perfil usuario: <?= htmlspecialchars($usuario) ?> (<?= htmlspecialchars($rol) ?>)</h2>
  <p>Sesión iniciada a las <?= $horaInicio ?></p>
  <br>
  <a href="index.php?accion=logout">Cerrar sesión</a>
</body>

</html>