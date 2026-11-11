<section class="completo">
  <article class="centrado">
    <?php if ($estado === 'creado'): ?>
      <h2>Registro Completado</h2>
      <p>El usuario <?php echo htmlspecialchars($nick); ?> ha sido creado correctamente.</p>
      <p><?php echo htmlspecialchars($nombre); ?></p>
      <p><?php echo htmlspecialchars($edad) . " " . $categoriaEdad; ?></p>
      <a href="index.php">Inicio</a>
    <?php elseif ($estado === 'nick_repetido'): ?>
      <h2>Ese nick ya está en uso</h2>
      <p>El nick <?php echo htmlspecialchars($nick); ?> ya existe. Prueba con otro.</p>
      <a href="includes/form.php">Volver al formulario</a>
    <?php else: ?>
      <h1>Error en la recepcion</h1>
      <a href="index.php">Inicio</a>
    <?php endif; ?>
  </article>
</section>