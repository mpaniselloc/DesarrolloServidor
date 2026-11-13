<article class="centrado">
  <h2>Modificar usuario</h2>

  <?php if (!empty($error)): ?>
    <p class="mensaje-error"><?php echo htmlspecialchars($error); ?></p>
  <?php endif; ?>

  <form method="post" action="gestionClientes.php">
    <input type="hidden" name="accion" value="actualizar">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">

    <div class="formulario-conjunto">
      <label>Nick:</label>
      <p><?php echo htmlspecialchars($usuario['nick_usuario']); ?></p>
    </div>

    <div class="formulario-conjunto">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
    </div>

    <div class="formulario-conjunto">
      <label for="edad">Edad:</label>
      <input type="text" id="edad" name="edad" value="<?php echo htmlspecialchars($edad); ?>" required>
    </div>

    <div class="formulario-conjunto">
      <button type="submit">Guardar cambios</button>
    </div>
  </form>

  <p><a href="gestionClientes.php">Cancelar</a></p>
</article>