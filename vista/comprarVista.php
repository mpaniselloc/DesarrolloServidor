<article class="centrado">
  <h2>Realizar pedido</h2>

  <?php if (!empty($error)): ?>
    <p class="mensaje-error"><?php echo htmlspecialchars($error); ?></p>
  <?php endif; ?>

  <form method="post" action="comprar.php">
    <input type="hidden" name="accion" value="comprar">

    <div class="formulario-conjunto">
      <label for="titulo">Título:</label>
      <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" readonly required>
    </div>

    <div class="formulario-conjunto">
      <label for="isbn">ISBN:</label>
      <input type="text" id="isbn" name="isbn" value="<?php echo htmlspecialchars($isbn); ?>" readonly required>
    </div>

    <div class="formulario-conjunto">
      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha" value="<?php echo htmlspecialchars($fecha); ?>" required>
    </div>

    <div class="formulario-conjunto">
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" value="<?php echo htmlspecialchars($usuario); ?>" readonly>
    </div>

    <div class="formulario-conjunto">
      <button type="submit">Confirmar pedido</button>
    </div>
  </form>

  <p><a href="index.php">Cancelar</a></p>
</article>
