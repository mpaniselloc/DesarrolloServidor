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
  <link rel="stylesheet" href="../assets/styles.css?v=<?php echo time(); ?>">
</head>

<body>
  <?php
  include "header.php";
  ?>
  <!-- Si el ususario es admin, le mostraremos esta parte de la vista -->
  <?php if ($_SESSION['usuario'] === 'admin'): ?>
    <main style="padding: 20px 40px;">
      <h1 style="font-size: 36px; font-weight: bold; margin-bottom: 25px;">ERP LibroSphere</h1>
      <div>
        <img src="../assets/ERP.png" alt="ERP LibroSphere" style="max-width: 680px; width: 100%; height: auto;">
      </div>
      <br><br>
      <a href="../index.php">Cerrar sesión</a>
    </main>


    <!-- Si el usuario no es admin, en este caso user, le mostraremos esto -->

  <?php else: ?>
    <?php
    // LLamamos a la funcion listaLibros que esta en el controlador librosController
    require_once "../controllers/librosController.php";
    $controller = new librosController();
    $catalogo = $controller->listaLibros();
    ?>

    <div style="text-align: right; width: 600px; margin: 10px auto;">
      <a href="../index.php">Cerrar sesión</a>
    </div>


    <!-- Recorremos el catalago y lo mostramos -->
    <?php foreach ($catalogo->libro as $libro): ?>
      <div class="libro">
        <img src="../assets/img/<?php echo $libro->portada; ?>" width="120" height="180" alt="Portada">

        <div class="libro-datos">
          <p><b>Titulo:</b> <?php echo $libro->titulo; ?></p>
          <br>
          <p><b>Autor:</b> <?php echo $libro->autor; ?></p>
          <br>
          <p><b>Categoría:</b> <?php echo $libro->categoria; ?></p>


          <!-- Creamos la condicion de que si en el xml la promocion es si se muestre el descuento -->
          <?php if ($libro->promocion == "si"): ?>
            <br>
            <p class="promocion">Promoción -30%</p>
          <?php endif; ?>
        </div>

        <button class="comprar-btn">COMPRAR</button>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</body>

</html>