<article class="centrado">
  <h2>Modificar pedido</h2>

  <?php if (!empty($error)): ?>
    <p class="mensaje-error"><?php echo htmlspecialchars($error); ?></p>
  <?php endif; ?>

  <form method="post" action="gestionPedidos.php">
    <input type="hidden" name="accion" value="actualizar">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($pedido['id']); ?>">

    <div class="formulario-conjunto">
      <label>ID del pedido:</label>
      <p><?php echo htmlspecialchars($pedido['id']); ?></p>
    </div>

    <div class="formulario-conjunto">
      <label for="titulo">Título:</label>
      <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" required>
    </div>

    <div class="formulario-conjunto">
      <label for="isbn">ISBN:</label>
      <input type="text" id="isbn" name="isbn" value="<?php echo htmlspecialchars($isbn); ?>" required>
    </div>

    <div class="formulario-conjunto">
      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($fecha); ?>" required>
    </div>

    <div class="formulario-conjunto">
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>" required>
    </div>

    <div class="formulario-conjunto">
      <button type="submit">Guardar cambios</button>
    </div>
  </form>

  <p><a href="gestionPedidos.php">Cancelar</a></p>
</article>