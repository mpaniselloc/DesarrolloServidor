<?php
session_start();

// Comprobar si la sesión está iniciada
if (!isset($_SESSION['usuario'])) {
  header("Location: ../index.php");
  exit();
}

// Control de tiempo de la sesión (30 minutos)
$tiempo_maximo = 30 * 60;

if (isset($_SESSION['tiempo']) && (time() - $_SESSION['tiempo'] > $tiempo_maximo)) {
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit();
}

// Actualizar el tiempo de actividad
$_SESSION['tiempo'] = time();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Pagina de inicio al iniciar correctamente la sesion -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuario - LibroSphere</title>
  <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
  <?php
  include "header.php";
  ?>

  <?php if ($_SESSION['usuario'] === 'admin'): ?>
    <main style="padding: 20px 40px;">
      <h1 style="font-size: 36px; font-weight: bold; margin-bottom: 25px;">ERP LibroSphere</h1>
      <div>
        <img src="../assets/ERP.png" alt="ERP LibroSphere" style="max-width: 680px; width: 100%; height: auto;">
      </div>
      <br><br>
      <a href="../index.php">Cerrar sesión</a>
    </main>
  <?php else: ?>
    <main style="padding: 20px 40px;">
      <h1>Bienvenido a LibroSphere</h1>
      <h2>Perfil usuario: <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
      <br>
      <a href="../index.php">Cerrar sesión</a>
    </main>
  <?php endif; ?>
</body>

</html>