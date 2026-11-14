<h2>Gestión de Pedidos</h2>

<?php if (isset($pedidos) && $pedidos): ?>
  <div class="tabla-contenedor">
    <table class="tabla-usuarios">
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>ISBN</th>
          <th>Fecha</th>
          <th>Usuario</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pedidos as $pedido): ?>
          <tr>
            <td><?php echo htmlspecialchars($pedido['id']); ?></td>
            <td><?php echo htmlspecialchars($pedido['titulo']); ?></td>
            <td><?php echo htmlspecialchars($pedido['isbn']); ?></td>
            <td><?php echo htmlspecialchars($pedido['fecha']); ?></td>
            <td><?php echo htmlspecialchars($pedido['usuario']); ?></td>
            <td>
              <div class="acciones">
                <a href="gestionPedidos.php?accion=editar&id=<?php echo htmlspecialchars($pedido['id']); ?>">Modificar</a>
                <form method="post" action="gestionPedidos.php" onsubmit="return confirm('¿Seguro que quieres eliminar este pedido?');">
                  <input type="hidden" name="accion" value="eliminar">
                  <input type="hidden" name="id" value="<?php echo htmlspecialchars($pedido['id']); ?>">
                  <button type="submit">Eliminar</button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <p>No hay pedidos registrados.</p>
<?php endif; ?>

<p><a href="index.php">Volver al panel</a></p>